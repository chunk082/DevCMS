<?php

namespace App\Http\Controllers\Community;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Http\Resources\NewsResource;
use App\Models\Comments;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $latestArticle = News::with('user')
                             ->latest('created_at')
                             ->first();
                             

       return view('welcome', compact('latestArticle'));
    }

    public function dashboard()
    {
        $articles = News::with('user')->latest()->get();
        return view('dashboard', compact('articles'));
    }

    public function community()
    {
        $articles = News::with('user')->latest()->get();
        return view('community', compact('articles'));
    }

     public function AllArticles()
    {
        $articles = News::with('user')->latest()->get();
        return view('articles', compact('articles'));
    }

     public function getArticleInfo($id, $name)
    {
         // Fetch the article by ID
        $article = News::findOrFail($id);

        // Return the view with the article
        return view('articles.show', compact('article'));
    }

    public function getArticles()
    {
        // This method returns the articles data directly
        return News::with('user')->latest()->get();
    }

    public function GetRecents($id = null, $name = null)
    {
        // Fetch the latest 5 articles
        $articles = News::with('user')->latest()->take(5)->get();

        if ($id) {
            // Fetch the specific article by ID
            $article = News::with(['user', 'comments.user'])->findOrFail($id);
            $recentComments = Comments::where('news_id', $id)->latest()->take(2)->get();
            $allComments = Comments::where('news_id', $id)->latest()->get();
            return view('articles.show', compact('article', 'articles', 'recentComments', 'allComments'));
        } else {
            return view('articles.show', compact('articles'));
        }
    }

    public function storeComment(Request $request)
    {
        $request->validate([
            'comment' => 'required',
            'news_id' => 'required|exists:cms_articles,id',
        ]);

        Comments::create([
            'comment' => $request->input('comment'),
            'news_id' => $request->input('news_id'),
            'user_id' => auth()->id(),
            'created_at' => now(), // Add created_at manually
        ]);

        return redirect()->back()->with('success', 'Comment posted successfully.');
    }
}
