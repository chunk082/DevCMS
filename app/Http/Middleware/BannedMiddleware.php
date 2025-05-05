<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Ban;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\HttpFoundation\Response;

class BannedMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        $ips = Ban::where('type', 'ip')
            ->where('ip', $request->ip())
            ->count();

        $accounts = Ban::where('user_id', $request->user()->id ?? null)
            ->count();

        if ($ips > 0 || $accounts > 0) {
            return Redirect::route('banned');
        }

        return $next($request);
    }
}
