<?php

namespace App\Http\Controllers\Home;

use Illuminate\Support\Facades\Cache;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function onlineUsersCount()
    {
        $onlineUsersCount = User::where('online', '1')->count();

        return $onlineUsersCount;
    }


public function onlinePlayers()
{
    $onlineUsers = User::where('online', '1')
    ->get()
    ->map(function ($user) {
        if (!empty($user->last_login) && is_numeric($user->last_login) && (int) $user->last_login > 0) {
            $user->online_since = Carbon::createFromTimestamp((int) $user->last_login)
                ->timezone('America/New_York');
        } else {
            $user->online_since = null;
        }
        return $user;
    });

    $totalUsers = User::count();

    return view('players', compact('onlineUsers', 'totalUsers'));
}

}