<?php

namespace App\Http\Controllers\Housekeeping\Website;

use App\Http\Controllers\Controller;
use App\Models\SiteSupportTicket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SiteSupportController extends Controller
{
    // Fetch all support tickets with optional filtering by status
   public function index(Request $request)
{
    $query = SiteSupportTicket::with('user');

    // Filter by status if requested
    if ($request->has('status') && $request->status) {
        $query->where('status', $request->status);
    }

    $tickets = $query->paginate(10);
    logHousekeepingActivity("User: " . Auth::user()->username . " has view the ticket page.");
    return view('housekeeping.support.siteticket', compact('tickets'));
}


    // Show details for a specific ticket
    public function show($id)
    {
        $ticket = SiteSupportTicket::findOrFail($id);

        $responses = $ticket->respond_messages ? json_decode($ticket->respond_messages, true) : [];

        return view('housekeeping.support.show', compact('ticket'));
    }

    // Handle a ticket (mark as Open and add a reply)
    public function open(Request $request)
    {
        $request->validate([
            'ticket_id' => 'required|exists:site_support_tickets,id', // Ensure the ticket exists
        ]);

        $ticket = SiteSupportTicket::findOrFail($request->ticket_id);

        // Update the ticket to 'Open' status
        $ticket->update([
            'status' => 'Open',
            'handled_by' => Auth::user()->username, // Assign the ticket to the staff member
        ]);

        return redirect()->route('housekeeping.support.siteticket')->with('success', 'Ticket marked as Open.');
    }

    // Close a ticket
    public function close(Request $request)
    {
        $request->validate([
            'ticket_id' => 'required|exists:site_support_tickets,id', // Ensure the ticket exists
        ]);

        $ticket = SiteSupportTicket::findOrFail($request->ticket_id);

        // Update the ticket to 'Closed' status
        $ticket->update([
            'status' => 'Closed',
        ]);

        return redirect()->route('housekeeping.support.siteticket')->with('success', 'Ticket marked as Closed.');
    }

public function reply(Request $request, $id)
{

    $request->validate([
        'response_message' => 'required|string|max:2000',
    ]);

    // Retrieve the ticket
    $ticket = SiteSupportTicket::findOrFail($id);

    // Add the response
    $responses = $ticket->respond_messages ?? [];
    $responses[] = [
        'username' => Auth::user()->username,
        'timestamp' => now(),
        'message' => $request->response_message,
    ];
    $ticket->respond_messages = $responses;

    if ($request->has('status')) {
        $ticket->status = $request->status;
    }

    // Update the handled_by field
    $ticket->handled_by = Auth::user()->username;

    $ticket->save();

    logHousekeepingActivity("User: " . Auth::user()->username . " has replied to ticket ID #" . $ticket->id);

    return redirect()->route('housekeeping.support.siteticket')
        ->with('success', 'Response added successfully and ticket status updated.');

}

}
