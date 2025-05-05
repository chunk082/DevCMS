<?php

namespace App\Http\Controllers\Housekeeping\Hotel;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Services\RconService;

class HotelAlertRCONController extends Controller
{
    protected $rconService;

    public function __construct(RconService $rconService)
    {
        $this->rconService = $rconService;
    }

    public function show()
    {
        logHousekeepingActivity("User: " . Auth::user()->username . " has viewed RCON Hotel Alert.");
        return view('housekeeping.hotel.hotel-alert'); 
    }

    public function sendHotelAlert(Request $request)
{
    // Validate the input
    $request->validate([
        'message' => 'required|string|max:255',
    ]);

    // Get the message from the request
    $message = $request->input('message');

    // Send the alert using RconService
    $response = $this->rconService->alertHotel($message);

    // Log the RCON action (only if successful)
    if ($response) {
        logHousekeepingActivity("User: " . Auth::user()->username . " sent a Hotel Alert: \"" . $message . "\"");
        return back()->with('success', 'Hotel alert sent successfully!');
    } else {
        logHousekeepingActivity("User: " . Auth::user()->username . " attempted to send a Hotel Alert but it failed. Message: \"" . $message . "\"");
        return back()->with('error', 'Failed to send hotel alert.');
    }
}

}
