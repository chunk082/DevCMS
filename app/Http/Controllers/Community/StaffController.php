<?php

namespace App\Http\Controllers\Community;

use App\Models\User;
use App\Models\WebsiteSetting;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

class StaffController extends Controller
{
    /**
     * Retrieve the staff view.
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\View
     */
    public function index(Request $request)
{
    $websiteSetting = WebsiteSetting::first();

    $users = User::where('rank', '>=', config('habbo.default.min_rank'))
                ->with('permissions')
                ->orderBy('rank', 'DESC')
                ->get();

    return view('staff', [
        'users' => $users,
        'websiteSetting' => $websiteSetting, // ✅ Pass this to the view
    ]);
}
}