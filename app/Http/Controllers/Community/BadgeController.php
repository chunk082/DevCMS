<?php

namespace App\Http\Controllers\Community;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class BadgeController extends Controller
{
    public function show()
    {
        $badges = DB::table('badge_definitions')
            ->select('id', 'code', 'name')
            ->orderByDesc('id')
            ->where('code','not like', 'ACH_%')
            ->limit(16)
            ->get();

        return $badges;
    }
}
