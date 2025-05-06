<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\WebsiteSetting;

class CheckMaintenanceMode
{
    public function handle(Request $request, Closure $next)
    {
        // Use key/value accessor
        $maintenanceMode = WebsiteSetting::isMaintenanceModeEnabled();

        // Allow access to /maintenance if active
        if ($request->is('maintenance')) {
            if (!$maintenanceMode) {
                return redirect('/');
            }

            return $next($request);
        }

        // Allow housekeeping routes regardless of mode
        if ($request->is('housekeeping') || $request->is('housekeeping/*')) {
            return $next($request);
        }

        // Redirect all other users if maintenance mode is enabled
        if ($maintenanceMode && (!Auth::check() || !Auth::user()->isStaff())) {
            return redirect('/maintenance');
        }

        return $next($request);
    }
}
