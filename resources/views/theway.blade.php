@extends('layouts.app')

@section('title')
    {{ config('app.name') }} - The {{config('app.name')}} Way
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
                                Rules and regulations are subject to change without notice. As a member of the {{ config('app.name') }} community, you hereby agree to and understand the following terms and conditions above. Failure to comply with these rules and regulations will result in the necessary sanctions implemented upon your account. If you have any questions or concerns in regards to The {{ config('app.name') }} Way, please do not hesitate to ask a member of the Hotel Staff.
                                </div>
                            </div>
                        </div>
                        <h5 class="silver">General Rules</h5>
                        <ul>
                            <li>
                                <strong>1.1.</strong>
                                 Do not abuse the Call for Help (CFH) system; it should be used during emergency purposes only.
                            </li>
                            <li>
                                <strong>1.2.</strong>
                                 Do not advertise other Habbo Retros; hotel links or purposely mentioning the name of another hotel with the intentions of advertising is not permitted.
                            </li>
                            <li>
                                <strong>1.3.</strong>
                                 Do not attempt to or scam credits or furniture from other users through betting, gaming, or trading.
                            </li>
                            <li>
                                <strong>1.4.</strong>
                                 Do not bully, harass, or abuse other users; avoid violent or aggressive behavior.
                            </li>
                            <li>
                                <strong>1.5.</strong>
                                 Do not disclose any personal information of another user (e.g., address, IP Address, phone number, school, private images etc.) without their consent.
                            </li>
                            <li>
                                <strong>1.6.</strong>
                                 Do not excessively repeat identical or similar statements (spamming).
                            </li>
                            <li>
                                <strong>1.7.</strong>
                                 Users are prohibited from engaging in any sexual, inappropriate, or generally objective acts towards other users without their prior consent. Sexual roleplay involving an underage character is strictly prohibited.
                            </li>
                            <li>
                                <strong>1.8.</strong>
                                 Do not make rooms with inappropriate or abusive names.
                            </li>
                            <li>
                                <strong>1.9.</strong>
                                 Do not attempt to or successfully harm a user’s home internet connection.
                            </li>
                            <li>
                                <strong>1.10.</strong>
                                 Do not disrupt events with explicit language or negative behavior.
                            </li>
                        </ul>
                        <h5 class="silver">Account</h5>
                        <ul>
                            <li>
                                <strong>2.1</strong>
                                 Do not attempt to or give away, buy, sell, or trade your 
                                <strong>{{ config('app.name') }} Hotel</strong>
                                 account and/or {{ config('app.name') }} items for virtual items from another game, accounts from another game, cash, or vice versa without permission from an Administrator. This includes giving away, buying, selling or trading {{ config('app.name') }} furniture/currency for Habbo furniture/currency or vice versa.
                            </li>
                            <li>
                                <strong>2.2</strong>
                                 Do not create a username with an offensive name that is insulting, racist, harassing, or generally objectionable.
                            </li>
                            <li>
                                <strong>2.3</strong>
                                 Do not evade an IP Address ban.
                            </li>
                            <li>
                                <strong>2.4</strong>
                                 Do not share your account with other users.
                            </li>
                            <li>
                                <strong>2.5</strong>
                                 Do not threaten to, attempt to, or hack other users' accounts.
                            </li>
                            <li>
                                <strong>2.6</strong>
                                 Do not create multiple accounts for the purpose of taking an advantage over gaining more in-game currency and/or rares of any kind.
                            </li>
                            <li>
                                <strong>2.7</strong>
                                 Do not re-appeal your ban unless stated otherwise. This means if you re-appeal in 2 days after your first appeal was denied and you were told to re-appeal in 2-3 weeks, you will be banned from the forum as well as the hotel.
                            </li>
                        </ul>
                        <h5 class="silver">{{ config('app.name') }} Hotel</h5>
                        <ul>
                            <li>
                                <strong>3.1</strong>
                                 Do not attempt to or exploit errors of 
                                <strong>{{ config('app.name') }} Hotel</strong>
                                ; report it to the Administration immediately.
                            </li>
                            <li>
                                <strong>3.2</strong>
                                 Do not attempt to or refund your VIP Membership or donation to 
                                <strong>{{ config('app.name') }} Hotel</strong>
                                 at any given time; all payments are final.
                            </li>
                            <li>
                                <strong>3.3</strong>
                                 Do not intentionally give wrong or misleading information to staff members in reports about rule violations, complaints, bug reports, or support requests.
                            </li>
                            <li>
                                <strong>3.4</strong>
                                 Do not make false statements against 
                                <strong>{{ config('app.name') }} Hotel</strong>
                                 or any other part of its services.
                            </li>
                            <li>
                                <strong>3.5</strong>
                                 Do not pretend to be a representative of 
                                <strong>{{ config('app.name') }} Hotel</strong>
                                . This includes mimicing, acting like them, and or claim to have staff powers.
                            </li>
                            <li>
                                <strong>3.6</strong>
                                 Do not threaten to, attempt to, or use any scripts or third party software to enter, disrupt, or modify 
                                <strong>{{ config('app.name') }} Hotel</strong>
                                .
                            </li>
                            <li>
                                <strong>3.7</strong>
                                 Non-harmful auto-typing, auto-clicking and other programs can only be used if you are the room owner or with permission from the room owner.
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
   @endsection