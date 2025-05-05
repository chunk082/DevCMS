<?php

namespace App\Http\Controllers\Housekeeping\Hotel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // Import for using raw queries or DB facade

class PrivateChatlogsController extends Controller
{
    public function getPrivateChats(Request $request)
    {
        // Get the search query from the request
        $search = $request->input('search');

        // Query to get chat logs, joining with the users table to search by username
        $chatLogs = DB::table('chatlogs_private')
            ->leftJoin('users', 'chatlogs_private.user_from_id', '=', 'users.id')
            ->select('chatlogs_private.*', 'users.username')
            ->when($search, function ($query, $search) {
                return $query->where('users.username', 'like', '%' . $search . '%')
                             ->orWhere('chatlogs_private.user_from_id', 'like', '%' . $search . '%');
            })
            ->orderBy('chatlogs_private.timestamp', 'desc')
            ->paginate(20);

        logHousekeepingActivity("User: " . auth()->user()->username . " has viewed private chatlogs");
        // Pass the data and search term to the view
        return view('housekeeping.hotel.privatechatlogs', ['chatLogs' => $chatLogs, 'search' => $search]);
    }
}