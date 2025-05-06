@extends('layouts.app')

@section('title')
    {{ config('app.name') }} - Staff
@endsection

@section('content')
        <div class="row">
        <div class="col-lg-8 col-12">
            <div class="row">
                                    <div class="col-12">
                        <div id="staff-banner">
                                                           @foreach ($users as $user)
        @if ($user->online == 1 && in_array($user->rank, [5, 6, 7])) <!-- Check online and rank -->
            <img 
                src="https://imager.habboon.pw/?figure={{ $user->look }}&size=m&direction=3&head_direction=3&gesture=sml&headonly=1" 
                class="staff" 
                data-id="{{ $user->id }}" 
                data-rank="{{ $user->rank }}" 
                data-toggle="tooltip" 
                data-placement="top" 
                title="{{ $user->username }}">
        @endif
    @endforeach
                                                    </div>
                    </div>
                
                <div class="col-lg-12">
                                <div class="card">
                                <div class="card-body">
                                    <h5 class="silver"
                                        style="background-color: #B40B0B; text-shadow: none; color: #fff;border-radius: 5px;margin-bottom: 8px;">
                                        Management
                                    </h5>

                                    <img src="{{ config('app.app_assets') }}/swf/c_images/album1584/MNGR.gif" title="{{ config('app.name') }} Staff"
                                         style="position: absolute;top: 15px;right: 25px;">
                                    <div class="row no-gutters">
                                         @foreach ($users as $user)
                            @if ($user->rank == 8)
                            @php
                                            $statusClass = $user->online == '1' ? 'alert-success' : '';
                                        @endphp
                            <div class="col-lg-6 col-12 mb-2">
                                <div class="staff-block {{ $statusClass }}" style="width: 108%; margin-bottom: -7px; position: relative; left: 50%; transform: translateX(-50%);">
                                    <div class="row align-items-center">
                                        <div class="col-2 text-center">
                                            <img src="https://imager.habboon.pw/?figure={{ $user->look }}&direction=3&head_direction=3&gesture=sml&headonly=1" class="avatar" alt="{{ $user->username }}">
                                        </div>
                                        <div class="col-10">
                                            <strong>{{ $user->username }}</strong><br>
                                            <span>{{ $user->motto }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                        @endforeach                                      
                                    </div>
                                </div>
                            </div>

                                <div class="card">
                                <div class="card-body">
                                    <h5 class="silver"
                                        style="background-color: #9F08B2; text-shadow: none; color: #fff;border-radius: 5px;margin-bottom: 8px;">
                                        Senior Moderation
                                    </h5>

                                    <img src="{{ config('app.app_assets') }}/swf/c_images/album1584/SMOD.gif" title="{{ config('app.name') }} Staff"
                                         style="position: absolute;top: 15px;right: 25px;">

                                    <div class="row no-gutters">
                                        @foreach ($users as $user)
                            @if ($user->rank == 7)
                            @php
                                            $statusClass = $user->online == '1' ? 'alert-success' : '';
                                        @endphp
                            <div class="col-lg-6 col-12 mb-2">
                                <div class="staff-block {{ $statusClass }}" style="width: 108%; margin-bottom: -7px; position: relative; left: 50%; transform: translateX(-50%);">
                                    <div class="row align-items-center">
                                        <div class="col-2 text-center">
                                            <img src="https://imager.habboon.pw/?figure={{ $user->look }}&direction=3&head_direction=3&gesture=sml&headonly=1" class="avatar" alt="{{ $user->username }}">
                                        </div>
                                        <div class="col-10">
                                            <strong>{{ $user->username }}</strong><br>
                                            <span>{{ $user->motto }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                        @endforeach           
                                                                                    
                                    </div>
                                </div>
                            </div>

                                <div class="card">
                                <div class="card-body">
                                    <h5 class="silver" style="background-color: #D64306; text-shadow: none; color: #fff;border-radius: 5px;margin-bottom: 8px;">
                                        Moderation
                                    </h5>
                                    <img src="{{ config('app.app_assets') }}/swf/c_images/album1584/MOD.gif" title="{{ config('app.name') }} Staff"
                                         style="position: absolute;top: 15px;right: 25px;">
                                    <div class="row no-gutters">
                                            @foreach ($users as $user)
                            @if ($user->rank == 7)
                            @php
                                            $statusClass = $user->online == '1' ? 'alert-success' : '';
                                        @endphp
                            <div class="col-lg-6 col-12 mb-2">
                                <div class="staff-block {{ $statusClass }}" style="width: 108%; margin-bottom: -7px; position: relative; left: 50%; transform: translateX(-50%);">
                                    <div class="row align-items-center">
                                        <div class="col-2 text-center">
                                            <img src="https://imager.habboon.pw/?figure={{ $user->look }}&direction=3&head_direction=3&gesture=sml&headonly=1" class="avatar" alt="{{ $user->username }}">
                                        </div>
                                        <div class="col-10">
                                            <strong>{{ $user->username }}</strong><br>
                                            <span>{{ $user->motto }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                        @endforeach                                                   
                                    </div>
                                </div>
                            </div>
                            @if (\App\Models\WebsiteSetting::isTrialModView())
                           <div class="card">
                                <div class="card-body">
                                    <h5 class="silver" style="background-color: #505050; text-shadow: none; color: #fff;border-radius: 5px;margin-bottom: 8px;">
                                        Trial Moderation
                                    </h5>
                                    <img src="{{ config('app.app_assets') }}/swf/c_images/album1584/TMOD.gif" title="{{ config('app.name') }} Staff"
                                         style="position: absolute;top: 15px;right: 25px;">
                                    <div class="row no-gutters">
                                            @foreach ($users as $user)
                            @if ($user->rank == 5)
                            @php
                                            $statusClass = $user->online == '1' ? 'alert-success' : '';
                                        @endphp
                            <div class="col-lg-6 col-12 mb-2">
                                <div class="staff-block {{ $statusClass }}" style="width: 108%; margin-bottom: -7px; position: relative; left: 50%; transform: translateX(-50%);">
                                    <div class="row align-items-center">
                                        <div class="col-2 text-center">
                                            <img src="https://imager.habboon.pw/?figure={{ $user->look }}&direction=3&head_direction=3&gesture=sml&headonly=1" class="avatar" alt="{{ $user->username }}">
                                        </div>
                                        <div class="col-10">
                                            <strong>{{ $user->username }}</strong><br>
                                            <span>{{ $user->motto }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                        @endforeach                                                   
                                    </div>
                                </div>
                            </div> 
                         @endif   
                        </div>
            </div>
        </div>

        <div class="col-lg-4 col-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="silver">About {{ config('app.name') }} Staff</h5>
                    <p class="mb-0">The {{ config('app.name') }} staff team is one big happy family, each staff member has a different role and duties to fulfill. <br><br>Most of our team usually consists of players that have been around {{ config('app.name') }} for quite a while, but this doesn't mean we only recruit old &amp; known players, we recruit those who shine out to us!</p>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <h5 class="silver">How do I join the team?</h5>
                    <p class="mb-0">Every couple of months staff applications may open up via a <a href="/articles" target="_blank">news article</a> giving users a chance to join the team, though we also like to handpick users that we feel are worthy of a trial. Things that we look out for are professionalism, a clear record, friendly &amp; a frequent event host.</p>
                </div>
            </div>
        </div>
    </div>
@endsection
