<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfUnauthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
{
    // Ensure session is available before checking authentication
    if (!session()->has('login_web_1') && !Auth::check()) {
        return redirect()->route('home'); // Prevent false unauthenticated redirects
    }

    return $next($request);
}

}
