<?php

namespace App\Http\Controllers\Community;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Controller;

class CommunityCameraWebController extends Controller
{
    public function show()
{
    $$photos = DB::table('camera_web')
    ->join('users', 'camera_web.user_id', '=', 'users.id')
    ->select(
        'camera_web.id',
        'camera_web.url',
        'camera_web.timestamp',
        'camera_web.likes_count',
        'camera_web.liked_by',
        'users.username',
        'users.look'
    )
    ->orderBy('camera_web.timestamp', 'desc')
    ->get()
    ->map(function ($photo) {
        $likedBy = json_decode($photo->liked_by ?? '[]');
        $photo->liked_by_user = in_array(Auth::id(), $likedBy); // Add liked state
        return $photo;
    });
    
    return $photos; // Return the data for use in other controllers
}

    public function toggleLike(Request $request, $photoId)
{
    \Log::info('Toggle Like Request', ['user_id' => Auth::id(), 'photo_id' => $photoId]);

    $photo = DB::table('camera_web')->where('id', $photoId)->first();

    if (!$photo) {
        \Log::error('Photo not found', ['photo_id' => $photoId]);
        return response()->json(['error' => 'Photo not found'], 404);
    }

    $likedBy = json_decode($photo->liked_by ?? '[]');
    $userId = Auth::id();

    if (in_array($userId, $likedBy)) {
        $likedBy = array_filter($likedBy, function ($id) use ($userId) {
            return $id != $userId;
        });
        $likesCount = max($photo->likes_count - 1, 0);
        $status = 'unliked';
    } else {
        $likedBy[] = $userId;
        $likesCount = $photo->likes_count + 1;
        $status = 'liked';
    }

    DB::table('camera_web')->where('id', $photoId)->update([
        'liked_by' => json_encode(array_values($likedBy)),
        'likes_count' => $likesCount,
    ]);

    \Log::info('Photo liked/unliked', [
        'photo_id' => $photoId,
        'likes_count' => $likesCount,
        'status' => $status,
    ]);

    return response()->json(['status' => $status, 'likes_count' => $likesCount]);
}


}
