<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class RegisteredUserController extends Controller
{
    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'signup_name' => ['required', 'string', 'max:255'],
            'signup_phone' => ['required', 'string', 'max:30'],
            'signup_email' => ['required', 'string', 'email', 'max:255', Rule::unique(User::class, 'email')],
            'signup_password' => ['required', 'string', 'min:8', 'confirmed'],
            'terms' => ['accepted'],
        ], [], [
            'signup_name' => 'full name',
            'signup_phone' => 'phone number',
            'signup_email' => 'email address',
            'signup_password' => 'password',
        ]);

        $user = User::create([
            'name' => $validated['signup_name'],
            'phone' => $validated['signup_phone'],
            'email' => $validated['signup_email'],
            'password' => Hash::make($validated['signup_password']),
        ]);

        event(new Registered($user));

        Auth::login($user);
        $request->session()->regenerate();

        return response()->json([
            'message' => 'Account created successfully.',
            'redirect' => route('dashboard.index'),
        ]);
    }
}
