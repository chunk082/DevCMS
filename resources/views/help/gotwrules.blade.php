@extends('layouts.app')

@section('title')
    {{ config('app.name') }} - GOTW Rules
@endsection

@section('content')
        <div class="row">
            <div class="col-12">
                    <div id="staff-banner">
                    @foreach ($users as $user)
        @if (in_array($user->rank, [5, 6, 7])) <!-- Check online and rank -->
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
            <div class="col-12">
                <div class="card rules-card">
                    <div class="card-body">
                        <div class="alert alert-danger" role="alert">
                            <div class="row align-items-center">
                                <div class="col-1 alert-icon-col">
                                    <i class="fas fa-info-circle" style="font-size: 36px;"></i>
                                </div>
                                <div class="col">
                                  As a player or a host, you agree to follow the following rules when in attendance of official staff alerted events. Breaking any of the following rules will result in either a host strike or a player strike which will handicap you from participating in events. If you have any questions or concerns in regards to GOTW rules, please do not hesitate to ask a member of the Hotel Staff.
                                </div>
                            </div>
                        </div>
                        <h5 class="silver">Frequently Asked Questions</h5>
                        <ul>
                        <li>
                            <strong>How am I able to get a strike in GOTW?</strong><br>
                            Strikes are given to users for various reasons within the GOTW competition, and they last for one week. You may be given a strike for the following:
                            <ul>
                                <li>• Disrespecting an event host continuously.</li>
                                <li>• Abusing users in a staff-supervised event room.</li>
                                <li>• Cheating (giving answers/hints, rigging, playing for other people, etc.)</li>
                                <li>• Teaming (telling people who to pick, walking out/exiting to let users win, etc.)</li>
                            </ul>
                        </li>
                        <li>
                            <strong>How am I able to get a strike for hosting in GOTW?</strong><br>
                            Strikes for hosting are also given out for various reasons, these last for one month. You may be given a strike for the following:
                            <ul>
                                <li>• Abusing members in your own events.</li>
                                <li>• Kicking or banning a user from the room without permission from staff (kicking is prohibited except with staff permission, always request a summon first).</li>
                                <li>• Faulty wired that cannot be fixed within a reasonable amount of time and causes the game to end.</li>
                                <li>• Rigging events for specific users to win.</li>
                                <li>• Refusing staff co-operation, if a supervisor tries to help/guide you.</li>
                                <li>• Hosting for less than 30 minutes or more than 60 minutes. In addition to leaving/going offline and not coming back within 5 minutes.</li>
                            </ul>
                            If you believe that you have been given a strike for unfair circumstances, please find an administrator in-game.
                        </li>
                        <br>
                        <li>
                            <strong>What happens if I get a strike for hosting in GOTW?</strong><br>
                            No action will be taken during your first or second strike, but they will contribute to you being closer to a third strike. Gaining a third strike means that you will not be able to host until one of your strikes expires (1 month from the date of your first host strike). Strikes remain on your account for one month and are automatically removed when a month has passed.
                        </li>
                        <br>
                        <li>
                            <strong>What games can I host at an event?</strong><br>
                            These games are NOT allowed to be hosted at an event: Nervous Game, Kick the Ugly, Falling Furni (unwired), Mole, Take Me Out, Roleplays, Casinos, Hang Out/Chill rooms/Snog Rooms, Don't Wake Grandma, Cozzie Change (specifically a room dedicated ONLY to CC). Any of these rooms will be declined as an event request if you attempt to :eha and get them hotel alerted.
                        </li>
                    </ul>

                        <h5 class="silver">Player Rules</h5>
                        <ul>
                        <li><strong>Please keep in mind that events are meant to be fun for everyone. This means being respectful to both the host and other players!</strong></li>
                        <li>• Do not share answers.</li>
                        <li>• Do not leave events purposely with the intention to let your others win.</li>
                        <li>• Do not do ‘last to’s/first to’s’ - this is currently banned and if this occurs, you will be removed from the game and possibly striked.</li>
                    </ul>
                    Please also keep in mind that events are meant to be fun for everyone! This means being respectful to both the host and other players!
                    <ul>
                        <li><strong>Strike 1</strong>: Users will not be able to place in the article for the week that their strike lasts.</li>
                        <li><strong>Strike 2</strong>: Users will not be able to participate in any GOTW official events until one strike expires - they will be automatically room banned from all events.</li>
                    </ul>

                    <h5 class="silver">Host Rules</h5>
                    <ul>
                        <li><strong>If you are hosting, here are a few things to take note:</strong></li>
                        <li>• Please ensure that your events room is fully functional (e.g games have been wired properly, other users do not have rights in your events room - including group admins).</li>
                        <li>• Please ensure that your events room has commands off, by doing :room pull etc. (the full list can be seen by doing :room list).</li>
                        <li>• The minimum hosting time is 30 minutes and the maximum is 1 hour. Upon successfully completing your event you will receive 25 diamonds, these will be given after you have hosted.</li>
                        <li>• Players are able to host one event per 24 hours, if you request to host again before 24 hours has elapsed, other users will be prioritised over yourself. You will be able to host before then if no one else is available.</li>
                        <li>• Should you happen to disconnect whilst hosting, you will have 5 minutes to return.</li>
                        <li>• You are not allowed to rig events for certain users to win.</li>
                        <li>• You are not allowed to kick (without staff permission), ban or mute users.</li>
                        <li>• Above all, ensure that everything remains <u><b>FAIR</b></u> for all players.</li>
                        <li>• Should you fail to comply with them, you will receive one strike. One strike will last for a month. In the case you receive three strikes, you will not be able to host again until the first strike has been removed.</li>
                    </ul>
                    </div>
                </div>
            </div>
   @endsection