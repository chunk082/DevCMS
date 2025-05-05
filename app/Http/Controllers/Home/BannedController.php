<?php

namespace App\Http\Controllers\Home;

use App\Models\Ban;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class BannedController extends Controller
{
    public function __invoke(Request $request)
    {
        // Fetch the ban reason for the authenticated user
        $ban = Ban::where('user_id', Auth::id())->first();
        
        // If the user is banned by IP, also check the IP ban
        if (!$ban) {
            $ban = Ban::where('ip', $request->ip())->first();
        }
        
        // If no ban found, redirect to home or another page
        if (!$ban) {
            return redirect()->route('home');
        }

        return view('banned', [
            'ban_reason' => $ban->ban_reason,
            'ban_expire' => $ban->ban_expire, // Assuming you also want to show the expiration date
        ]);
    }
}