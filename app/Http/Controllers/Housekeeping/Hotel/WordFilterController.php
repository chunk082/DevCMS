<?php

namespace App\Http\Controllers\Housekeeping\Hotel;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Services\RconService;

class WordFilterController extends Controller
{
    protected $rconService;

    public function __construct(RconService $rconService)
    {
        $this->rconService = $rconService;
    }

    // Fetch and display all filtered words
    public function index()
    {
        $wordFilters = DB::table('wordfilter')
            ->select('key', 'replacement', 'hide', 'report', 'mute')
            ->get();

            logHousekeepingActivity("User: " . Auth::user()->username . " has viewed Word Filter Page.");
        return view('housekeeping.hotel.wordfilter', compact('wordFilters'));
    }

    // Add a new word to the filter and update RCON
    public function store(Request $request)
{
    // Validate input
    $request->validate([
        'key' => 'required|string|unique:wordfilter,key|max:255',
        'replacement' => 'required|string|max:255',
        'hide' => 'required|in:0,1', // Accepts only '0' or '1'
        'report' => 'required|in:0,1', // Accepts only '0' or '1'
        'mute' => 'required|integer|min:0', // Accepts a positive integer or 0 for no mute
    ]);

    // Insert the new word into the wordfilter table
    DB::table('wordfilter')->insert([
        'key' => $request->input('key'),
        'replacement' => $request->input('replacement'),
        'hide' => $request->input('hide'),
        'report' => $request->input('report'),
        'mute' => $request->input('mute'),
        'created_at' => now(),
        'updated_at' => now(),
    ]);

    logHousekeepingActivity("User: " . Auth::user()->username . " has created wordfilter."
);
    // Update the RCON word filter
    $this->rconService->updateWordFilter();

    return redirect()->back()->with('success', 'Word filter added successfully and RCON has been updated.');
    }

    public function destroy($key)
    {
    // Find the word filter by its ID and delete it
    $deleted = DB::table('wordfilter')->where('key', $key)->delete();

    if ($deleted) {
        // Update the RCON word filter after deletion
        $this->rconService->updateWordFilter();

        logHousekeepingActivity("User: " . Auth::user()->username . " has deleted a wordfilter.");
        return redirect()->back()->with('success', 'Word filter deleted successfully and RCON has been updated.');
    }

    return redirect()->back()->withErrors(['Word filter not found.']);
    }
}
