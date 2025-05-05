@extends('layouts.app')

@section('title')
    {{ config('app.name') }} - Snowflake Leaderboard
@endsection

@section('content')
    <div class="row">
        <!-- Current Snowflake Holdings -->
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body" style="padding: 1.25rem 1.25rem 1rem 1.25rem">
                    <h5 class="silver" style="margin-bottom: 8px;">Current Snowflake Holdings</h5>
                    <div class="row no-gutters">
                        @foreach($currentHoldings as $user)
                            <div class="col-12">
                                <div class="staff-block">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col-3 text-center">
                                            <img src="https://imager.habboon.pw/?figure={{ $user->look }}&size=m&direction=2&head_direction=2&gesture=sml&headonly=1" class="avatar" alt="{{ $user->username }}">
                                        </div>
                                        <div class="col-9">
                                            <strong>{{ $user->username }}</strong><br/>
                                            <span><strong>{{ number_format($user->snowflakes) }}</strong> Snowflakes</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <!-- All-Time Snowflake Earnings -->
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body" style="padding: 1.25rem 1.25rem 1rem 1.25rem">
                    <h5 class="silver" style="margin-bottom: 8px;">All-Time Snowflake Earnings</h5>
                    <div class="row no-gutters">
                        @foreach($allTimeEarnings as $user)
                            <div class="col-12">
                                <div class="staff-block">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col-3 text-center">
                                            <img src="https://imager.habboon.pw/?figure={{ $user->look }}&size=m&direction=2&head_direction=2&gesture=sml&headonly=1" class="avatar" alt="{{ $user->username }}">
                                        </div>
                                        <div class="col-9">
                                            <strong>{{ $user->username }}</strong><br/>
                                            <span><strong>{{ number_format($user->earnings) }}</strong> Accumulated</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <!-- Top Snowflake Spenders -->
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body" style="padding: 1.25rem 1.25rem 1rem 1.25rem">
                    <h5 class="silver" style="margin-bottom: 8px;">Top Snowflake Spenders</h5>
                    <div class="row no-gutters">
                        @foreach($topSpenders as $user)
                            <div class="col-12">
                                <div class="staff-block">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col-3 text-center">
                                            <img src="https://imager.habboon.pw/?figure={{ $user->look }}&size=m&direction=2&head_direction=2&gesture=sml&headonly=1" class="avatar" alt="{{ $user->username }}">
                                        </div>
                                        <div class="col-9">
                                            <strong>{{ $user->username }}</strong><br/>
                                            <span><strong>{{ number_format($user->total_spent) }}</strong> Spent</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
