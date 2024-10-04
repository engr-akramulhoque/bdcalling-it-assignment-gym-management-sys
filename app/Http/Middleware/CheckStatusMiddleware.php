<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckStatusMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if the user is authenticated and their account is active (status is true)
        if (Auth::check() && (bool) $request->user()->status === true) {
            return $next($request);
        }

        Auth::logout();
        return redirect()->route('login')->withErrors('Your account has been deactivated.');
    }
}
