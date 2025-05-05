@extends('layouts.app')

@section('title')
    {{ config('app.name') }} - Leaderboards
@endsection

@section('content')
    <div class="row">
        <!-- Top Chatters -->
        <div class="col-lg-3 col-md-6 col-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="silver">
                        Top Chatters 
                        <span class="float-right">
                            <i class="fas fa-users"></i>
                        </span>
                    </h5>
                    <table class="leaderboard-table" width="100%">
                        @foreach($topChatters as $index => $chatter)
                            <tr style="background-color: {{ $index % 2 == 0 ? '#f8f9fa' : '#fff' }};">
                                <td width="25%">
                                    <img src="https://imager.habboon.pw/?figure={{ $chatter->look }}&size=m&direction=2&head_direction=2&gesture=sml&headonly=1">
                                </td>
                                <td width="75%">
                                    <a href="#">
                                        <b>{{ $chatter->username }}</b>
                                    </a>
                                    <br/>
                                    {{ $chatter->article_comments_count }} Comments
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>

        <!-- Most Badges -->
        <div class="col-lg-3 col-md-6 col-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="silver">
                        Most Badges 
                        <span class="float-right">
                            <i class="fa-solid fa-certificate"></i>
                        </span>
                    </h5>
                    <table class="leaderboard-table" width="100%">
                        @foreach($mostBadges as $index => $user)
                            <tr style="background-color: {{ $index % 2 == 0 ? '#f8f9fa' : '#fff' }};">
                                <td width="25%">
                                    <img src="https://imager.habboon.pw/?figure={{ $user->look }}&size=m&direction=2&head_direction=2&gesture=sml&headonly=1">
                                </td>
                                <td width="75%">
                                    <a href="#">
                                        <b>{{ $user->username }}</b>
                                    </a>
                                    <br/>
                                    {{ $user->badges_count }} Badges
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>

        <!-- Most Respected -->
        <div class="col-lg-3 col-md-6 col-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="silver">
                        Most Respected 
                        <span class="float-right">
                            <i class="fas fa-thumbs-up"></i>
                        </span>
                    </h5>
                    <table class="leaderboard-table" width="100%">
                        @foreach($mostRespected as $index => $user)
                            <tr style="background-color: {{ $index % 2 == 0 ? '#f8f9fa' : '#fff' }};">
                                <td width="25%">
                                    <img src="https://imager.habboon.pw/?figure={{ $user->look }}&size=m&direction=2&head_direction=2&gesture=sml&headonly=1">
                                </td>
                                <td width="75%">
                                    <a href="#">
                                        <b>{{ $user->username }}</b>
                                    </a>
                                    <br/>
                                    {{ $user->respects_count }} Respects
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>

        <!-- Most Active -->
        <div class="col-lg-3 col-md-6 col-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="silver">
                        Most Active 
                        <span class="float-right">
                            <i class="fas fa-clock"></i>
                        </span>
                    </h5>
                    <table class="leaderboard-table" width="100%">
                        @foreach($mostActive as $index => $user)
                            <tr style="background-color: {{ $index % 2 == 0 ? '#f8f9fa' : '#fff' }};">
                                <td width="25%">
                                    <img src="https://imager.habboon.pw/?figure={{ $user->look }}&size=m&direction=2&head_direction=2&gesture=sml&headonly=1">
                                </td>
                                <td width="75%">
                                    <a href="#">
                                        <b>{{ $user->username }}</b>
                                    </a>
                                    <br/>
                                    {{ $user->days_online }} day(s) online
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
