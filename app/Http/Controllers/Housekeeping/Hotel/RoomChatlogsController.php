<?php

namespace App\Http\Controllers\Housekeeping\Hotel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // Import for using raw queries or DB facade

class RoomChatlogsController extends Controller
{
    public function getRoomChats(Request $request)
    {
        // Get the search query from the request
        $search = $request->input('search');

        $chatLogs = DB::table('chatlogs_room')
    ->leftJoin('users', 'chatlogs_room.user_from_id', '=', 'users.id')
    ->leftJoin('rooms', 'chatlogs_room.room_id', '=', 'rooms.id')
    ->select(
        'chatlogs_room.*',
        'users.username',
        'rooms.name as room_name',
        'rooms.id as room_id'
    )
    ->when($search, function ($query, $search) {
        return $query->where('users.username', 'like', '%' . $search . '%')
                     ->orWhere('chatlogs_room.room_id', 'like', '%' . $search . '%')
                     ->orWhere('rooms.name', 'like', '%' . $search . '%');
    })
    ->orderBy('chatlogs_room.timestamp', 'desc')
    ->paginate(20);


            logHousekeepingActivity("User: " . auth()->user()->username . " has viewed roomchatlogs chatlogs");
        // Pass the data and search term to the view
        return view('housekeeping.hotel.roomchatlogs', ['chatLogs' => $chatLogs, 'search' => $search]);
    }
}
