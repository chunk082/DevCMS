@extends('layouts.app')

@section('title')
    {{ config('app.name') }} - Online Players
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-8 col-md-6 col-12">
            <h5 class="silver">
                Online Players 
                <span class="float-right">{{ $onlineUsers->count() }} of {{ $totalUsers }} users</span>
            </h5>
            <div class="row">

                @forelse ($onlineUsers as $user)
                    <div class="col-lg-4">
                        <div class="card" style="margin-bottom: 0.75rem;">
                            <div class="card-body">
                                <div class="row align-items-center position-relative">
                                    <div class="position-absolute" style="right: 10px; top: -16px;">
                                        <small class="text-muted">
                                            <span>Nitro</span>
                                        </small>
                                    </div>
                                    <div class="col-4">
                                        <div>
                                            <img src="https://imager.habboon.pw/?figure={{ $user->look }}&direction=3&head_direction=2&gesture=sml&headonly=1" alt="{{ $user->username }}" loading="lazy">
                                        </div>
                                    </div>
                                    <div class="col text-left text-truncate">
                                        <span class="d-block">{{ $user->username }}</span>
                                        <span class="text-muted">@if($user->online_since)
    {{ $user->online_since->diffForHumans() }}
@else
    Never
@endif
</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <p>No users online.</p>
                @endforelse
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-12">
            <h5 class="silver">About this page</h5>
            <div class="card">
                <div class="card-body">
                    <p>This is just a simple overview page showing the current online users.</p>
                    <p>
                        This page is 
                        <span class="font-weight-bold">cached for 10 minutes</span>
                        , sometimes the numbers won't add up correctly (web header, this page and the in-game :about command), this is because they're all cached at different intervals.
                    </p>
                    <p class="font-weight-bold mb-0">FYI: We don't display users who are hiding their online status in the user grid.</p>
                </div>
            </div>
        </div>
    </div>
@endsection
