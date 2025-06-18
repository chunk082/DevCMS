<?php

namespace App\Http\Controllers\Community;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\StaffApplication;
use App\Http\Controllers\Controller;

class StaffApplicationController extends Controller
{

public function create()
    {
        return view('staffapp'); // Ensure you have the correct view path
    }

public function store(Request $request)
{
    \Log::info('📥 Staff Application Attempt:', [
        'user_id' => Auth::id(),
        'data' => $request->all()
    ]);

    $request->validate([
        'username' => 'required|string|max:50',
        'discord_username' => 'required|string|max:50',
        'age' => 'required|integer|min:13',
        'country' => 'required|string|max:50',
        'reason_for_joining' => 'required|string',
        'new_ideas' => 'required|string',
        'availability_per_day' => 'required|string|max:255',
        'additional_info' => 'nullable|string',
    ]);

    // Explicitly assign each field, including user_id
    StaffApplication::create([
        'user_id' => Auth::id(), // Add the authenticated user's ID
        'username' => $request->username,
        'discord_username' => $request->discord_username,
        'age' => $request->age,
        'country' => $request->country,
        'reason_for_joining' => $request->reason_for_joining,
        'new_ideas' => $request->new_ideas,
        'availability_per_day' => $request->availability_per_day,
        'additional_info' => $request->additional_info,
    ]);

    return redirect()->back()->with('success', 'Your application has been submitted successfully!');
}

}
