<?php

namespace App\Http\Controllers\Housekeeping\Website;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class CreateArticlesController extends Controller
{

   public function create(Request $request)
{
    $images = File::files(public_path('img/webpromo'));
    $username = Auth::guard('housekeeping')->user()->username;

    // Log only real user visits
    if (!$request->ajax() && str_contains($request->header('Accept'), 'text/html')) {
        logHousekeepingActivity("User: {$username} has viewed the Create Article Page");
    }

    return view('housekeeping.articles.create', compact('images', 'username'));
}

    public function store(Request $request)
{
    // Log incoming request
    \Log::info('Incoming Request:', $request->all());

    $request->validate([
        'title' => 'required|string',
        'content' => 'required|string',
        'image' => 'required|string',
        'desc' => 'required|string',
        'published_by' => 'required|string',
    ]);

    // Log validation success
    \Log::info('Validation passed.');

    // Retrieve authenticated user ID
    $userId = Auth::id();
    \Log::info('Authenticated User ID:', ['user_id' => $userId]);

    if (is_null($userId)) {
        return redirect()->route('housekeeping.login')->with('error', 'Failed to retrieve authenticated user.');
    }

    // Attempt to store the data
    $article = News::create([
        'user_id' => $userId,
        'title' => $request->title,
        'content' => $request->content,
        'img' => 'img/webpromo/' . $request->image,
        'desc' => $request->desc,
        'published_by' => $request->published_by,
    ]);

    \Log::info('Article stored:', $article->toArray());

    logHousekeepingActivity("User: " . Auth::user()->username . " has Created an Article. ");

    return redirect()->route('housekeeping.articles.create')
        ->with('success', 'News article created successfully.');
}


    public function index()
    {
        $news = News::all();
        return view('housekeeping.articles.index', compact('news'));
    }

    public function show($id)
    {
        $news = News::findOrFail($id);
        return view('housekeeping.articles.show', compact('news'));
    }
}