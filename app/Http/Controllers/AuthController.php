<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rules\Password;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();

            $user = auth()->user();

            // Send login notification email
            try {
                Mail::send('emails.login_notification', ['user' => $user], function ($message) use ($user) {
                    $message->to($user->email)
                        ->subject('Login Notification - FINANIC');
                });
            } catch (\Exception $e) {
                \Log::error('Failed to send login email: ' . $e->getMessage());
            }

            // Admin goes to admin dashboard
            if ($user->role === 'admin') {
                return redirect()->route('admin.dashboard');
            }

            // Check if user has services assigned
            if ($user->services()->wherePivot('status', 'active')->count() === 0) {
                return redirect()->route('dashboard.index'); // They will select services from dashboard
            }

            return redirect()->route('dashboard.index');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users',
            'phone' => 'nullable|string|max:20',
            'role' => 'required|in:trader,corporate,client',
            'business_name' => 'nullable|string|max:255',
            'password' => ['required', 'confirmed', Password::min(8)],
            'terms' => 'required|accepted',
            'service' => 'nullable|string',
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'] ?? null,
            'role' => $validated['role'],
            'business_name' => $validated['business_name'] ?? null,
            'business_type' => $validated['role'] === 'trader' ? 'trader' : ($validated['role'] === 'corporate' ? 'corporate' : 'individual'),
            'password' => Hash::make($validated['password']),
        ]);

        Auth::login($user);

        // Auto-assign service if provided
        $hasService = false;
        if (!empty($validated['service'])) {
            $service = \App\Models\Service::where('slug', $validated['service'])->where('is_active', true)->first();
            if ($service) {
                $user->services()->attach($service->id, [
                    'assigned_at' => now(),
                    'status' => 'active',
                ]);
                $hasService = true;

                // Create welcome notification
                \App\Models\Notification::create([
                    'user_id' => $user->id,
                    'title' => 'Welcome to FINANIC!',
                    'message' => 'Thank you for choosing ' . $service->name . '. Our team will contact you shortly.',
                    'type' => 'welcome',
                    'service_id' => $service->id,
                ]);
            }
        }

        // Send welcome email
        try {
            Mail::to($user->email)->send(new \App\Mail\WelcomeEmail($user));
        } catch (\Exception $e) {
            \Log::error('Failed to send welcome email: ' . $e->getMessage());
        }

        // Redirect to payment if service was assigned, otherwise to dashboard
        if ($hasService) {
            return redirect()->route('dashboard.payments');
        }

        return redirect()->route('dashboard.index');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home');
    }

    public function showForgotPasswordForm()
    {
        return view('auth.forgot-password');
    }

    public function sendResetLink(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $status = \Illuminate\Support\Facades\Password::sendResetLink(
            $request->only('email')
        );

        return $status === \Illuminate\Support\Facades\Password::RESET_LINK_SENT
            ? back()->with('status', __($status))
            : back()->withErrors(['email' => __($status)]);
    }

    public function showResetForm(Request $request, $token = null)
    {
        return view('auth.reset-password')->with(
            ['token' => $token, 'email' => $request->email]
        );
    }

    public function reset(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => ['required', 'confirmed', Password::min(8)],
        ]);

        $status = \Illuminate\Support\Facades\Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->save();
            }
        );

        return $status === \Illuminate\Support\Facades\Password::PASSWORD_RESET
            ? redirect()->route('login')->with('status', __($status))
            : back()->withErrors(['email' => [__($status)]]);
    }
}
