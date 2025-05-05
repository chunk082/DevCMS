<?php

namespace App\Http\Controllers\Housekeeping\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ArticleCommentsController extends Controller
{
    public function index()
{
    $comments = DB::table('article_comments')
        ->join('cms_articles', 'article_comments.news_id', '=', 'cms_articles.id') // Corrected table name reference
        ->join('users', 'article_comments.user_id', '=', 'users.id')
        ->select(
            'article_comments.id',
            'cms_articles.title as article_title', // Corrected alias for article title
            'users.username as commenter_name',
            'article_comments.comment',
            'article_comments.created_at'
        )
        ->orderBy('article_comments.created_at', 'desc')
        ->get();

    logHousekeepingActivity("User: " . Auth::user()->username . " has view the Article Comment page.");

    return view('housekeeping.articles.comments', compact('comments'));
}

    public function destroy($id)
{
    DB::table('article_comments')->where('id', $id)->delete();

    logHousekeepingActivity("User: " . Auth::user()->username . " has deleted a comment.");
    
    return redirect()->route('housekeeping.articles.comments')->with('success', 'Comment deleted successfully.');
}

}
