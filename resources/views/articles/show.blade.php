@extends('layouts.app')

@section('title', config('app.name') . ' - ' . $article->title)

@section('content')
    <div class="row articles-page">
        <div class="col-lg-3 col-12 d-none d-lg-block">
            <div>
                <h5 class="silver">Recently Published</h5>
                <div>
                   @if(isset($articles))
                    @forelse ($articles as $recentArticle)
                        <a href="{{ route('articles.show', ['id' => $recentArticle->id, 'name' => \Illuminate\Support\Str::slug($recentArticle->title)]) }}" class="other" style="background-position: center; background-image: url('{{ asset('/' . $recentArticle->img) }}');">
                            {{ $recentArticle->title }}
                        </a>
                    @empty
                        <p>No recent articles found.</p>
                    @endforelse
                @else
                    <p>No articles available.</p>
                @endif
                </div>
            </div>
        </div>

        <div class="col-lg-6 col-12">
            @if(isset($article))
                <div class="card" id="article">
                    <div class="card-body">
                        <div id="header" class="mb-3" style="background-position: center; background-image: url('{{ asset('/' . $article->img) }}');">
                            <div class="avatar" style="background: url(https://imager.habboon.pw/?figure={{ $article->user->look }}&size=m&direction=2&head_direction=2&gesture=sml&action=wav);"></div>
                            <h6>
                                {{ $article->title }}
                                <br/>
                                <span>
                                    Posted by 
                                    <a href="#" class="text-white font-weight-bold">{{ $article->user->name }}</a>
                                    on the 
                                    <a href="#" class="text-white font-weight-bold">{{ $article->created_at->timezone('-04:00')->diffForHumans() }}</a>
                                </span>
                            </h6>
                        </div>
                        <div class="content">
                            {!! $article->content !!}
                        </div>
                    </div>
                </div>
            @endif

            @if(isset($article))
    @if(\Carbon\Carbon::parse($article->created_at)->addWeek()->isFuture())
        <div class="card">
            <div class="card-body">
                <h5 class="silver">Post a comment...</h5>
                <form action="{{ route('comments.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="comment" class="sr-only">Comment</label>
                        <textarea name="comment" rows="3" id="comment" class="form-control"></textarea>
                    </div>
                    <div class="form-group" style="margin-bottom: 0;">
                        <button class="btn btn-primary btn-block">Post</button>
                    </div>
                    <input type="hidden" name="news_id" value="{{ $article->id }}">
                </form>
            </div>
        </div>
    @endif

    <div class="card mb-0" id="comments">
        <div class="card-body">
            <h5 class="silver">Comments ({{ $allComments->count() }})</h5>
            @if($allComments->count() > 0)
                @foreach($allComments as $comment)
                    @php
                        $colors = ['dark-blue', 'aqua', 'blue', 'orange'];
                        $randomColor = $colors[array_rand($colors)];
                    @endphp
                    <div class="card">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-3">
                                    <div class="avatar {{ $randomColor }}">
                                        <img src="https://imager.habboon.pw/?figure={{ $comment->user->look }}&size=m&direction=2&head_direction=2&gesture=sml&headonly=1" data-toggle="tooltip" data-placement="top" title="{{ $comment->user->name }}" alt="{{ $comment->user->name }}" loading="lazy">
                                    </div>
                                </div>
                                <div class="col-9">
                                    <p class="mb-0">
                                        <a href="#">{{ $comment->user->name }}</a>
                                        <small class="float-right text-muted">{{ $comment->created_at->diffForHumans() }}</small>
                                    </p>
                                    <p class="text mb-0">{{ $comment->comment }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <p>No comments yet. Be the first to comment!</p>
            @endif
        </div>
    </div>
@endif
        </div>

        <div class="col-lg-3 col-12 mt-4 mt-lg-0">
            <h5 class="silver">
                Latest Comments 
                <span class="float-right">
                    <i class="fas fa-comments"></i>
                     {{ isset($recentComments) ? $recentComments->count() : 0 }}
                </span>
            </h5>
            <div id="latest-comments">
                @if(isset($recentComments) && $recentComments->count() > 0)
                    @foreach($recentComments as $comment)
                        <div class="card comment">
                            <div class="card-body">
                                <div class="comment-avatar">
                                    <img src="https://imager.habboon.pw/?figure={{ $comment->user->look }}&size=m&direction=2&head_direction=2&gesture=sml&headonly=1" data-toggle="tooltip" data-placement="top" title="{{ $comment->user->name }}" loading="lazy">
                                </div>
                                <p>{{ Str::limit($comment->comment, 50) }}</p>
                            </div>
                        </div>
                    @endforeach
                @else
                    <p>No recent comments available.</p>
                @endif
                <a href="#comments" class="read-more d-none d-lg-block">Read more comments &raquo;</a>
            </div>
        </div>
    </div>
@endsection
