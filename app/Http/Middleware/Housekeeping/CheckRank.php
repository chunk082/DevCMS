<?php

namespace App\Http\Middleware\Housekeeping;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class CheckRank
{
    public function handle($request, Closure $next, $rank)
    {
        if (Auth::guard('housekeeping')->check()) {
            $user = Auth::guard('housekeeping')->user();
            Log::info('User Rank:', ['user_id' => $user->id, 'rank' => $user->rank]);

            if ($user->rank >= $rank) {
                return $next($request);
            }
        }

        Log::warning('Unauthorized Access Attempt:', ['user_id' => Auth::id(), 'required_rank' => $rank]);
        abort(403, 'This action is unauthorized.');
    }
}