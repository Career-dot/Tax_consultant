<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthenticatedSessionController extends Controller
{
    public function store(Request $request): JsonResponse
    {
        $credentials = $request->validate([
            'signin_email' => ['required', 'string', 'email'],
            'signin_password' => ['required', 'string'],
        ], [], [
            'signin_email' => 'email address',
            'signin_password' => 'password',
        ]);

        if (! Auth::attempt([
            'email' => $credentials['signin_email'],
            'password' => $credentials['signin_password'],
        ], $request->boolean('remember_me'))) {
            throw ValidationException::withMessages([
                'signin_email' => 'These credentials do not match our records.',
            ]);
        }

        $request->session()->regenerate();

        return response()->json([
            'message' => 'Signed in successfully.',
            'redirect' => route('dashboard.index'),
        ]);
    }

    public function destroy(Request $request): \Illuminate\Http\RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home');
    }
}
