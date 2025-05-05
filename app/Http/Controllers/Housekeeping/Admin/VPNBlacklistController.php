<?php

namespace App\Http\Controllers\Housekeeping\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class VPNBlacklistController extends Controller
{
    public function index()
    {
        $blacklist = DB::table('website_blacklist')->get();
        logHousekeepingActivity("User: " . Auth::user()->username . " has view the blacklist page");
        return view('housekeeping.admin.blacklist', compact('blacklist'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'ip_address' => 'required|ip',
            'reason' => 'nullable|string'
        ]);

        DB::table('website_blacklist')->insert([
            'ip_address' => $request->ip_address,
            'reason' => $request->reason,
            'created_at' => now()
        ]);

        logHousekeepingActivity("User: " . Auth::user()->username . " has Blacklisted ".$request->ip_address);
        return redirect()->back()->with('success', 'IP added to blacklist.');
    }

    public function destroy($id)
    {
        DB::table('website_blacklist')->where('id', $id)->delete();
        logHousekeepingActivity("User: " . Auth::user()->username . " has deleted a blacklisted IP");
        return redirect()->back()->with('success', 'IP removed from blacklist.');
    }
}
