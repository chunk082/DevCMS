<?php

namespace App\Http\Controllers\Housekeeping;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Ban;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $userCount = User::count(); // Get the count of all users
        $onlineUsers = User::where('online', '1')->count(); // Get the count of online users
        $bannedUsers = Ban::count(); // Get the count of the banned users
        $activeRooms = DB::table('rooms')->where('users', '>', '0')->count(); // Get the count of active rooms
        $itemsInCatalog = DB::table('catalog_items')->count(); // Uncomment and modify if needed
        $websiteticket = DB::table('site_support_tickets')->count(); // Count of website tickets
        $totalRooms = DB::table('rooms')->count(); // Count of all rooms
        $totalArticles = DB::table('cms_articles')->count(); // Get all count of articles

        return view('housekeeping.dashboard', compact('userCount', 'onlineUsers', 'bannedUsers', 'activeRooms', 'itemsInCatalog', 'websiteticket', 'totalRooms', 'totalArticles'));
    }
}