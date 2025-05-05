<?php

namespace App\Http\Controllers\Housekeeping\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ClientWhitelistController extends Controller
{
    // Show all whitelisted IPs
    public function index()
{
    $whitelist = DB::table('client_whitelist')->get();
    logHousekeepingActivity("User: " . Auth::user()->username . " has view the White List pages.");
    return view('housekeeping.admin.whitelist', compact('whitelist'));
}

    // Store a new IP in the whitelist
   public function store(Request $request)
{
    $request->validate([
        'ip_address' => 'required|ip|unique:client_whitelist,ip_address',
        'reason' => 'nullable|string|max:255'
    ]);

    try {
        DB::table('client_whitelist')->insert([
            'ip_address' => $request->ip_address,
            'reason' => $request->reason,
            'created_at' => now(), // If timestamps are required
        ]);

        logHousekeepingActivity("User: " . Auth::user()->username . " has added IP Address to White List.");

        return redirect()->back()->with('success', 'IP successfully whitelisted.');
    } catch (\Exception $e) {
        // Log the error for debugging
        Log::error('Error inserting into client_whitelist: ' . $e->getMessage());

        return redirect()->back()->with('error', 'Failed to add IP. Please try again.');
    }
}


public function destroy($id)
{
    $deleted = DB::table('client_whitelist')->where('id', $id)->delete();

    logHousekeepingActivity("User: " . Auth::user()->username . " has deleted IP Address from White List pages.");

    if ($deleted) {
        return redirect()->route('housekeeping.admin.whitelist')->with('success', 'IP removed from whitelist.');
    } else {
        return redirect()->route('housekeeping.admin.whitelist')->with('error', 'Failed to remove IP. It may not exist.');
    }
}
}
