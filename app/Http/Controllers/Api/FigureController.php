<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\User; // Adjust this according to your User model namespace
use App\Http\Controllers\Controller;


class FigureController extends Controller
{
    public function getFigure($username)
{
    $user = User::where('username', $username)->first();

    if (!$user) {
        return response()->json(['error' => 'User not found'], 404);
    }

    return response()->json(['figure' => $user->look]);
}

}
