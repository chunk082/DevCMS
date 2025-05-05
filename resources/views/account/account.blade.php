@extends('layouts.app')

@section('title')
    {{ config('app.name') }} - My Preferences
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-3 col-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="silver">Account Settings</h5>
                    <ul class="nav nav-pills" id="account-navigation">
                        <li class="nav-item">
                            <a href="{{ route('account.account') }}" class="nav-link active">Preferences</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('account.email') }}" class="nav-link ">Email</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('account.password') }}" class="nav-link">Password</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('account.discord') }}" class="nav-link">Discord</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-lg-6 col-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="silver">Preferences</h5>
                    <form action="{{ route('account.account.update') }}" method="post">
                        @csrf
                        <div>
                            <span class="d-block font-weight-bold">Friend Requests</span>
                            <p class="mt-2">You can disable & enable the ability for other users to send you friend requests in-game.</p>
                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="block_friendrequests" id="friend-requests-enabled" value="0" 
                                    {{ $settings->block_friendrequests == 0 ? 'checked' : '' }}>
                                    <label class="form-check-label" for="friend-requests-enabled">
                                        Enabled
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="block_friendrequests" id="friend-requests-disabled" value="1" 
                                    {{ $settings->block_friendrequests == 1 ? 'checked' : '' }}>
                                    <label class="form-check-label" for="friend-requests-disabled">
                                        Disabled
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div>
                            <span class="d-block font-weight-bold">In-Game Following / Stalking</span>
                            <p class="mt-2">You can disable &amp; enable the ability for other users to follow you in-game.</p>

                            <div class="form-group">
                                <div class="form-check">
                <input class="form-check-input" type="radio" name="block_following" id="following-enabled" value="0" {{ $settings->block_following == 0 ? 'checked' : '' }}>
            <label class="form-check-label" for="following-enabled">Enabled</label>
                </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="block_following" id="following-disabled" value="1" {{ $settings->block_following == 1 ? 'checked' : '' }}>
        <label class="form-check-label" for="following-disabled"> Disabled</label>
                </div>
                    </div>
                        </div>

                        <div>
                            <span class="d-block font-weight-bold">Room Invites Ignored</span>
                            <p class="mt-2">By default you will receive room invites from your friends.</p>

                            <div class="form-group">
    <div class="form-check">
        <input class="form-check-input" type="radio" name="block_roominvites" id="room-invites-enabled" value="0" 
        {{ $settings->block_roominvites == 0 ? 'checked' : '' }}>
        <label class="form-check-label" for="room-invites-enabled">
            Listening
        </label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="block_roominvites" id="room-invites-disabled" value="1" 
        {{ $settings->block_roominvites == 1 ? 'checked' : '' }}>
        <label class="form-check-label" for="room-invites-disabled">
            Ignored
        </label>
    </div>
</div>
                        </div>

                        <div class="form-group mb-0">
                            <button class="btn btn-success btn-block">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection