@extends('layouts.app')

@section('title')
    {{ config('app.name') }} - Discord
@endsection

@section('content')
        <div class="row">
        <div class="col-lg-3 col-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="silver">Account Settings</h5>
                    <ul class="nav nav-pills" id="account-navigation">
                        <li class="nav-item">
                            <a href="{{ route('account.account') }}" class="nav-link">Preferences</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('account.email') }}" class="nav-link ">Email</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('account.password') }}" class="nav-link">Password</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('account.discord') }}" class="nav-link active">Discord</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-12">
    <div class="card">
        <div class="card-body">
            <h5 class="silver">Discord Account Association</h5>

            @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if (auth()->user()->discord_id)
    <a href="javascript:void(0);" onclick="$(this).find('form').submit();" class="btn btn-primary btn-block mb-3">
        Unlink account?
        <form action="{{ route('account.discord.unlink') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </a>
    <p class="mb-0">
        Please note, you may need to deauthorize with
        <a href="https://discordapp.com/developers/applications/authorized" target="_blank">Discord</a> too.
    </p>
@else
    <a href="{{ route('account.discord.authorize') }}" class="btn btn-primary btn-block">
        Login with Discord
    </a>
@endif

        </div>
    </div>
</div>


@endsection