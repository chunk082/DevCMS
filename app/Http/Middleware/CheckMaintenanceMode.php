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
        // Retrieve the maintenance mode status from the database
        $maintenanceMode = WebsiteSetting::first()->maintenance_mode;

        // If the current route is /maintenance
        if ($request->is('maintenance')) {
            // Redirect to / if maintenance mode is disabled
            if ($maintenanceMode === 'false') {
                return redirect('/');
            }

            // Allow access to the maintenance page
            return $next($request);
        }

        // Allow access to housekeeping routes during maintenance mode
        if ($request->is('housekeeping') || $request->is('housekeeping/*')) {
            return $next($request);
        }

        // Redirect non-staff users to /maintenance if maintenance mode is enabled
        if ($maintenanceMode === 'true' && (!Auth::check() || !Auth::user()->isStaff())) {
            return redirect('/maintenance');
        }

        // Proceed to the requested page
        return $next($request);
    }
}