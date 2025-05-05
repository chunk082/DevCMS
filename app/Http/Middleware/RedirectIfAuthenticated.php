<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    public function handle($request, Closure $next, ...$guards)
    {
        // Check if the user is authenticated
        if (Auth::check()) {
            // Redirect to '/me' for authenticated users
            return redirect('/me');
        }

        return $next($request);
    }
}