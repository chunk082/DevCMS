<?php

namespace App\Http\Controllers\Community;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SiteSupportTicket; // Ensure this matches your model
use Illuminate\Support\Facades\Auth;

class SupportController extends Controller
{
    // Show all tickets for the logged-in user
    public function index()
    {
        $tickets = SiteSupportTicket::where('user_id', Auth::id())->orderBy('created_at', 'desc')->get();
        return view('tickets.index', compact('tickets')); // Ensure the correct view path
    }

    // Show the form to create a new ticket
    public function create()
    {
        return view('tickets.create'); // Ensure the correct view exists
    }

    public function show($id)
{
    $ticket = SiteSupportTicket::with(['handledBy'])->findOrFail($id);

    return view('tickets.show', compact('ticket'));
}

    public function respond(Request $request, $id)
{
    $request->validate([
        'reply_message' => 'required|string|max:2000', // Limit reply length as needed
    ]);

    $ticket = SiteSupportTicket::findOrFail($id);

    // Add the reply
    $ticket->addReply($request->input('reply_message'));

    return redirect()->back()->with('success', 'Reply added successfully!');
}

    // Handle storing a new ticket
    public function store(Request $request)
    {
        $request->validate([
            'ticket_type' => 'required|string',
            'message'     => 'required|string|max:2000',
        ]);

        // Create the new ticket
        SiteSupportTicket::create([
            'ticket_type' => $request->ticket_type,
            'message'     => $request->message,
            'user_id'     => Auth::id(),
            'status'      => 'Queued', // Set default status
        ]);

        return redirect()->route('tickets.index')->with('success', 'Ticket submitted successfully!');
    }

    public function replyToTicket(Request $request, $id)
{
    // Validate the request
    $request->validate([
        'response_message' => 'required|string|max:2000', // Adjust max length if needed
    ]);

    // Fetch the ticket by its ID
    $ticket = SiteSupportTicket::findOrFail($id);

    // Retrieve the current responses or initialize an empty array
    $responses = $ticket->respond_messages ?? [];

    // Append the new response
    $responses[] = [
        'username' => Auth::user()->username,
        'timestamp' => now(),
        'message' => $request->response_message,
    ];

    // Update the ticket's respond_messages column
    $ticket->respond_messages = $responses;
    $ticket->save();

    // Redirect back with a success message
    return redirect()->back()->with('success', 'Your response has been added.');
}
}
