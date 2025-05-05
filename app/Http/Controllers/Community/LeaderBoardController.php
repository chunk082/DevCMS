<?php

namespace App\Http\Controllers\Community;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;
use App\Models\Community;
use App\Models\User;

use App\Http\Controllers\Controller;

class LeaderBoardController extends Controller
{
    public function GOTW()
{
    // Fetch users with rank below 5, ordered by GOTW points in descending order
    $users = User::where('rank', '<', 5)
        ->orderBy('gotw_points', 'desc')
        ->where('gotw_points', '>', '1')
        ->get();

    // Pass the data to the view
    return view('gotw', compact('users'));
}

    public function MostStuff()
{
    // Fetch top chatters from article_comments table
    $topChatters = Community::withCount('articleComments')
        ->orderBy('article_comments_count', 'desc')
        ->where('users.rank', '<', 5)
        ->havingRaw('article_comments_count > 0') // Exclude users with 0 article comment
        ->take(10)
        ->get();

    // Fetch users with the most badges
    $mostBadges = Community::select('users.id', 'users.username', 'users.look', DB::raw('COUNT(users_badges.user_id) as badges_count'))
        ->leftJoin('users_badges', 'users.id', '=', 'users_badges.user_id')
        ->where('users.rank', '<', 5)
        ->groupBy('users.id', 'users.username', 'users.look')
        ->orderBy('badges_count', 'desc')
        ->havingRaw('badges_count > 0') // Exclude users with 0 badges
        ->take(10)
        ->get();

    // Fetch users with the most respects (from users_settings table)
    $mostRespected = Community::select('users.id', 'users.username', 'users.look', 'users_settings.respects_received as respects_count')
        ->join('users_settings', 'users.id', '=', 'users_settings.user_id')
        ->where('users.rank', '<', 5)
        ->groupBy('users.id', 'users.username', 'users.look', 'users_settings.respects_received')
        ->orderBy('respects_count', 'desc')
        ->havingRaw('respects_count > 0') // Exclude users with 0 respects
        ->take(10)
        ->get();

   $mostActive = Community::select(
        'users.id',
        'users.username',
        'users.look',
        DB::raw('FLOOR(users_settings.online_time / 86400) as days_online') // Convert seconds to days
    )
    ->join('users_settings', 'users.id', '=', 'users_settings.user_id')
    ->where('users.rank', '<', 5)
    ->groupBy('users.id', 'users.username', 'users.look', 'users_settings.online_time')
    ->orderBy('days_online', 'desc')
    ->havingRaw('days_online > 0') // Exclude users with 0 badges
    ->take(10)
    ->get();



    // Pass the data to a view
    return view('leaderboards', compact('topChatters', 'mostBadges', 'mostRespected', 'mostActive'));
}

     /* Snowflake Leaderboard */

     public function showSnowFlakes()
    {
        // Current Snowflake Holdings
        $currentHoldings = DB::table('users_currency')
            ->join('users', 'users_currency.user_id', '=', 'users.id')
            ->where('users_currency.type', 104) // Snowflakes
            ->orderBy('users_currency.amount', 'desc')
            ->select('users.username', 'users.look', 'users_currency.amount as snowflakes')
            ->limit(15)
            ->get();

        $allTimeEarnings = DB::table('users_currency')
            ->join('users', 'users_currency.user_id', '=', 'users.id')
            ->join('logs_shop_purchases', 'users_currency.user_id', '=', 'logs_shop_purchases.user_id')
            ->where('users_currency.type', 104) // Snowflakes
            ->where('logs_shop_purchases.points_type', 104) // Snowflakes
            ->select(
                'users.username',
                'users.look',
                DB::raw('users_currency.amount + SUM(logs_shop_purchases.cost_points) as earnings') // Balance + spent
                )
            ->groupBy('users_currency.user_id', 'users.username', 'users.look', 'users_currency.amount')
            ->orderBy('earnings', 'desc') // Order by calculated earnings
            ->limit(15)
            ->get();

        // Top Snowflake Spenders
        $topSpenders = Cache::remember('top_spenders', 600, function () {
        return DB::table('logs_shop_purchases')
        ->join('users', 'logs_shop_purchases.user_id', '=', 'users.id')
        ->where('logs_shop_purchases.points_type', 104)
        ->select('users.username', 'users.look', DB::raw('SUM(logs_shop_purchases.cost_points) as total_spent'))
        ->groupBy('logs_shop_purchases.user_id', 'users.username', 'users.look')
        ->orderBy('total_spent', 'desc')
        ->limit(15)
        ->get();
    });

        return view('snowflake', compact('currentHoldings', 'allTimeEarnings', 'topSpenders'));
    }
}
