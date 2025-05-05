@extends('layouts.app')

@section('title')
    {{ config('app.name') }} - GOTW Leaderboard
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-8 col-12">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body" style="padding: 1.25rem 1.25rem 1rem 1.25rem">
                            <h5 class="silver" style="margin-bottom: 8px;">GOTW Leaderboard</h5>
                            <div class="row no-gutters">
                                @foreach ($users as $user)
                                    @php
                                        $class = '';
                                        if ($user->gotw_points > 0) {
                                            if ($loop->iteration == 1) {
                                                $class = 'gold';
                                            } elseif ($loop->iteration == 2) {
                                                $class = 'silver';
                                            } elseif ($loop->iteration == 3) {
                                                $class = 'bronze';
                                            }
                                        }
                                    @endphp
                                    <div class="col-lg-6 col-12 mb-2">
                                        <div class="staff-block {{ $class }}" style="width: 108%; margin-bottom: -7px; position: relative; left: 50%; transform: translateX(-50%);">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-2 text-center">
                                                    <img src="https://imager.habboon.pw/?figure={{ $user->look }}&direction=3&head_direction=3&gesture=eyb&headonly=1" class="avatar offline" alt="{{ $user->username }}">
                                                </div>
                                                <div class="col-10">
                                                    <strong>{{ $user->username }}</strong>
                                                    <br/>
                                                    <span>
                                                        <strong>{{ $user->gotw_points }}</strong>
                                                        Points
                                                    </span>
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
        </div>
        <div class="col-lg-4 col-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="silver">GOTW Rules</h5>
                    <p>GOTW, or Gamer of the Week is all about celebrating the top events players from the past seven days. 🏆 For every hotel alerted event you win, you'll earn both GOTW points and diamonds! 💎 So put your gaming skills to the test and aim for the top!</p>
                    <p>Curious about the rules? No problem! Click the link below & you'll find all the information you need to become a GOTW pro.</p>
                    <p class="mb-0">Get ready to shine as the next Gamer of the Week! 🚀</p>
                    <div class="mt-3">
                        <a href="https://www.habboon.pw/help/gotw-rules" class="btn btn-primary">GOTW Rules &raquo;</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
