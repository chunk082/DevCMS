<?php

namespace App\Http\Controllers\Housekeeping\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News; // Assuming your model is named Article

class ManageArticlesController extends Controller
{
    public function index()
    {
        $articles = News::latest()->paginate(10);
        return view('housekeeping.articles.manage', compact('articles'));
    }

    public function edit($id)
    {
        $article = News::find($id);
        if (!$article) {
            return redirect()->route('housekeeping.articles.manage')->with('error', 'Article not found.');
        }

        return view('housekeeping.articles.edit', compact('article'));
    }

   public function update(Request $request, $id)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'desc' => 'required|string|max:500',
        'content' => 'required|string',
    ]);

    // Fetch the correct model using `News`
    $news = News::findOrFail($id);

    $news->update([
        'title' => $request->title,
        'desc' => $request->desc,
        'content' => $request->content,
    ]);

    return redirect()->route('housekeeping.articles.manage')->with('success', 'Article updated successfully.');
}


    public function destroy($id)
    {
        $article = News::find($id);
        if (!$article) {
            return redirect()->route('housekeeping.articles.manage')->with('error', 'Article not found.');
        }

        $article->delete();
        return redirect()->route('housekeeping.articles.manage')->with('success', 'Article deleted successfully.');
    }
}