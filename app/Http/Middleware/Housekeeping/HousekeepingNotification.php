<?php 

namespace App\Http\Middleware\Housekeeping;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Models\SiteSupportTicket;

class HousekeepingNotification
{
    public function handle(Request $request, Closure $next)
    {
        // Count open tickets
        $openTickets = SiteSupportTicket::where('status', 'Queued')->count();

        // Share it with all Housekeeping views
        View::share('openTicketCount', $openTickets);

        return $next($request);
    }
}
