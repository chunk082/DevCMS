@extends('layouts.app')

@section('title')
    {{ config('app.name') }} - Banned
@endsection

@section('content')
<br /><br />
<main class="main-container">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-12">
                    <div class="card">
                        <div class="card-body text-center">
                            <h4 class="alert-danger p-2">You have Been Banned</h4>
                            <p>You have been banned for the following reason:</p>

                            <p>- {{ $ban_reason}}</p>

                            <p>Your ban will expire on: {{ \Carbon\Carbon::createFromTimestamp($ban_expire)->toDateTimeString() }} </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection