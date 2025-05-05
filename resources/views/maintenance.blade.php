@extends('layouts.app')

@section('title')
    {{ config('app.name') }} - Maintenance
@endsection

@section('content')
<br /><br />
<main class="position-relative container justify-content-center py-4">
        <div class="row">
                <div class="col-lg-8 col-12">
                    <div class="card">
                        <div class="card-body text-center">
                            <h4 class="alert-danger p-2">Maintenance</h4>
                           <div style="float: left; margin-right: 15px; background-color: white; padding: 10px;">
                                <img src="{{ asset('img/maintenance/maintenance_construction.png') }}" alt="Maintenance" style="max-width: 150px;">
                            </div>
                            <br />
                            <p>We're currently undergoing maintenance.</p>
                            <p>We are improving the experience of the site and game-play we look forward seeing you in the hotel. Please check back later!</p>
                        </div>
                    </div>
               </div>
               
         <div class="col-12 col-lg-4">
            <div class="card">
                <div class="card-body">
                    <iframe src="https://discordapp.com/widget?id={{ config('app.discord_id') }}&theme=dark" width="300" height="500" allowtransparency="true" frameborder="0"></iframe>
                </div>
            </div>
        </div>
    </div>
    </main>
@endsection