@extends('layouts.app')

@section('title')
    {{ config('app.name') }} - Community
@endsection

@section('content')
        <div class="row">
            <div class="col-lg-9 col-12">
                <h5 class="silver">
                    Latest Articles 
                    <span class="float-right"><svg
        xmlns="http://www.w3.org/2000/svg"
        viewBox="0 0 512 512"
        width="1em"
        height="1em"
        fill="currentColor"
        class=""
        >
    <path d="M96 96c0-35.3 28.7-64 64-64h288c35.3 0 64 28.7 64 64v320c0 35.3-28.7 64-64 64H80c-44.2 0-80-35.8-80-80V128c0-17.7 14.3-32 32-32s32 14.3 32 32v272c0 8.8 7.2 16 16 16s16-7.2 16-16V96zm64 24v80c0 13.3 10.7 24 24 24h112c13.3 0 24-10.7 24-24v-80c0-13.3-10.7-24-24-24H184c-13.3 0-24 10.7-24 24zm208-8c0 8.8 7.2 16 16 16h48c8.8 0 16-7.2 16-16s-7.2-16-16-16h-48c-8.8 0-16 7.2-16 16zm0 96c0 8.8 7.2 16 16 16h48c8.8 0 16-7.2 16-16s-7.2-16-16-16h-48c-8.8 0-16 7.2-16 16zm-208 96c0 8.8 7.2 16 16 16h256c8.8 0 16-7.2 16-16s-7.2-16-16-16H176c-8.8 0-16 7.2-16 16zm0 96c0 8.8 7.2 16 16 16h256c8.8 0 16-7.2 16-16s-7.2-16-16-16H176c-8.8 0-16 7.2-16 16z"/>
</svg></span>
                </h5>
                <div id="articles-strip">
    <div class="row">
        @forelse ($articles as $article)
        <div class="col-xl-4 col-lg-6 col-md-6 col-12">
    <a href="{{ route('articles.show', ['id' => $article->id, 'name' => \Illuminate\Support\Str::slug($article->title)]) }}">
        <div class="card">
            <div class="card-body" style="background-image: url('{{ asset('/' . $article->img) }}');">
                <div class="avatar">
                    <img src="https://imager.habboon.pw/?figure={{ $article->user->look }}&size=m&direction=2&head_direction=2&gesture=sml&headonly=1" data-toggle="tooltip" data-placement="top" data-title="{{ $article->user->name }}">
                </div>
            </div>
            <div class="card-footer">
                <h6>
                    <a href="{{ route('articles.show', ['id' => $article->id, 'name' => \Illuminate\Support\Str::slug($article->title)]) }}">{{ $article->title }}</a>
                </h6>
                <p>{{ $article->desc }}</p>
                <div class="info">
                    <div class="initial">
                        <span class="username">{{ $article->published_by }}</span>
                        <span class="published">
                            <i class="fas fa-clock"></i>
                            {{ $article->created_at->timezone('-04:00')->diffForHumans() }}
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </a>
</div>
        @empty
        <div class="col-12">
            <p>No articles found.</p>
        </div>
        @endforelse
    </div>
</div>
                <h5 class="silver">
                    Latest Photos 
                   <span class="float-right"><svg
        xmlns="http://www.w3.org/2000/svg"
        viewBox="0 0 512 512"
        width="1em"
        height="1em"
        fill="currentColor"
        class=""
        >
    <path d="M149.1 64.8 138.7 96H64c-35.3 0-64 28.7-64 64v256c0 35.3 28.7 64 64 64h384c35.3 0 64-28.7 64-64V160c0-35.3-28.7-64-64-64h-74.7l-10.4-31.2C356.4 45.2 338.1 32 317.4 32H194.6c-20.7 0-39 13.2-45.5 32.8zM256 192a96 96 0 1 1 0 192 96 96 0 1 1 0-192z"/>
</svg></span>
                </h5>
                <div class="row" id="latest-photos">
                    <div class="col-12">
                        <div class="camera-carousel owl-carousel">
                            
     @php $displayedPhotos = []; @endphp
    @foreach($photos as $photo)
        @if(!in_array($photo->url, $displayedPhotos))
            <div class="item">
                <img src="{{ asset($photo->url) }}" class="img-fluid" alt="{{ $photo->username }}'s Photo" style="border-radius: 5px 5px 0 0;">
                <div class="info blue">
                    <div class="row align-items-center">
                        <div class="col-4">
                            <div class="me">
                                <img src="https://imager.habboon.pw/?figure={{ $photo->look }}&direction=3&head_direction=3&gesture=sml&headonly=1" alt="{{ $photo->username }}">
                            </div>
                        </div>
                        <div class="col-8">
                            <p>
                                <a href="#">{{ $photo->username }}</a>
                                <br/>
                                <span style="color: #fff;">{{ \Carbon\Carbon::parse($photo->timestamp)->format('d/m/y') }}</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            @php $displayedPhotos[] = $photo->url; @endphp
        @endif
    @endforeach

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-12">
                <h5 class="silver">
                    Latest Badges 
                    <span class="float-right"><svg
        xmlns="http://www.w3.org/2000/svg"
        viewBox="0 0 512 512"
        width="1em"
        height="1em"
        fill="currentColor"
        class=""
        >
    <path d="M340.9 51.1C324.8 20.7 292.8 0 256 0s-68.8 20.7-84.9 51.1C138.2 41 101 49 75 75s-34 63.3-23.9 96.1C20.7 187.2 0 219.2 0 256s20.7 68.8 51.1 84.9C41 373.8 49 411 75 437s63.3 34 96.1 23.9c16.1 30.4 48.1 51.1 84.9 51.1s68.8-20.7 84.9-51.1C373.8 471 411 463 437 437s34-63.3 23.9-96.1c30.4-16.1 51.1-48.1 51.1-84.9s-20.7-68.8-51.1-84.9C471 138.2 463 101 437 75s-63.3-34-96.1-23.9z"/>
</svg></span>
                </h5>
                <div id="sidebar-badges" class="card">
    <div class="card-body">
        @foreach ($latestBadges as $badge)
            <a href="#"
               class="badge-item"
               data-bs-toggle="tooltip"
               data-bs-placement="top"
               title="{{ $badge->name }}">
                <img src="https://assets.devcms.online/swf/c_images/album1584/{{ $badge->code }}.gif"
                     alt="{{ $badge->code }}"
                     width="48"
                     height="48">
            </a>
        @endforeach
    </div>
</div>

            </div>
        </div>
@endsection
