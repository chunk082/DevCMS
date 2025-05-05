<?php

namespace App\Http\Middleware\Housekeeping;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HousekeepingPermissions
{
    public function handle(Request $request, Closure $next, $permission)
    {
        $user = Auth::user();

        // Get required rank from housekeeping_permissions table
        $requiredRank = DB::table('housekeeping_permissions')
            ->where('permission', $permission)
            ->value('min_rank');

         // Check if user has the required rank
        if (!$requiredRank || $user->rank < $requiredRank) {
            return redirect()->back()->with('error', 'You do not have permission to perform this action.');
        }

        return $next($request);
    }
}
