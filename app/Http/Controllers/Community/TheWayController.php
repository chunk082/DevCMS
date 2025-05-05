<?php

namespace App\Http\Controllers\Community;

use App\Models\User;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

class TheWayController extends Controller
{
    /**
     * Retrieve the Staff Member on The Way view.
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\View
     */
    public function index(Request $request)
    {
        $users = User::where('rank', '>=', config('habbo.default.min_rank'))
                    //->whereNotIn('username', ['Glee', 'Admin'])
                    ->with('permissions')
                    ->orderBy('rank', 'DESC')
                    ->get();

        return view('theway', [
            'users' => $users,
        ]);
    }
    
    public function gotwrules(Request $request)
    {
        $users = User::where('rank', '>=', config('habbo.default.min_rank'))
                    //->whereNotIn('username', ['Glee', 'Admin'])
                    ->with('permissions')
                    ->orderBy('rank', 'DESC')
                    ->get();

        return view('help.gotwrules', [
            'users' => $users,
        ]);
    }
}