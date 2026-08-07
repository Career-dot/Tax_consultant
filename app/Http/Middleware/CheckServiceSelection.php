<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckServiceSelection
{
    public function handle(Request $request, Closure $next): Response
    {
        $user = auth()->user();

        if (!$user) {
            return redirect()->route('login');
        }

        // Admin bypass
        if ($user->role === 'admin') {
            return $next($request);
        }

        // Check if user has any active services
        if ($user->services()->wherePivot('status', 'active')->count() === 0) {
            // Allow access to service selection page only
            if ($request->routeIs('portal.select-services') || $request->routeIs('portal.store-services')) {
                return $next($request);
            }
            return redirect()->route('portal.select-services');
        }

        return $next($request);
    }
}
