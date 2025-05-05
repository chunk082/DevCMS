<?php

namespace App\Http\Controllers\Community;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Community;
use App\Models\Comments;
use App\Models\UserBadges;
use App\Models\UsersSetting;

use DB;
use App\Http\Controllers\Controller;

class CommunityController extends Controller
{
  public function index()
    {
        $newsController = new NewsController();
        $badgeController = new BadgeController();

        // Get the latest article from NewsController
        $articles = $newsController->getArticles();

        // Get the random badges from BadgeController
        $latestBadges = $badgeController->show();

         // Fetch photos for the community page (similar to the gallery method)
        $photos = DB::table('camera_web')
        ->join('users', 'camera_web.user_id', '=', 'users.id')
        ->select('camera_web.*', 'users.username', 'users.look')
        ->orderBy('camera_web.timestamp', 'desc')
        ->limit(12) // Fetch only the latest 12 photos
        ->get()
        ->map(function ($photo) {
            $likedBy = json_decode($photo->liked_by ?? '[]');
            $photo->liked_by_user = in_array(Auth::id(), $likedBy);
            return $photo;
        });


        return view('community', compact('articles', 'latestBadges', 'photos'));
    }

    public function gallery(Request $request)
{
    $perPage = 12; // Number of photos per page
    $page = $request->input('page', 1);

    // Paginate photos
    $photos = DB::table('camera_web')
        ->join('users', 'camera_web.user_id', '=', 'users.id')
        ->select(
            'camera_web.*',
            'users.username',
            'users.look'
        )
        ->orderBy('camera_web.timestamp', 'desc')
        ->offset(($page - 1) * $perPage)
        ->limit($perPage)
        ->get()
        ->map(function ($photo) {
            $likedBy = json_decode($photo->liked_by ?? '[]'); // Decode liked_by field
            $photo->liked_by_user = in_array(Auth::id(), $likedBy); // Check if the user has liked this photo
            return $photo; // Add the property
        });

    // Statistics for the logged-in user
    $photoCount = DB::table('camera_web')->where('user_id', Auth::id())->count();
    $likedCount = DB::table('camera_web')
        ->where('liked_by', 'LIKE', '%' . Auth::id() . '%')
        ->count();
    $totalLikes = DB::table('camera_web')->sum('likes_count');

    if ($request->ajax()) {
        return response()->json(['data' => $photos]);
    }

    return view('gallery', compact('photos', 'photoCount', 'likedCount', 'totalLikes'));
}
  }
