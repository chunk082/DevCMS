@extends('layouts.app')

@section('title', config('app.name') . ' - Register')

@section('body-class', 'registration-page')

@section('content')
<main class="container py-4">
    <div class="row justify-content-center">
        <div class="col-lg-6 col-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="silver">Register</h5>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <p>{{ $error }}</p>
                                @endforeach
                            </div>
                        @endif

                        <div class="form-group">
                            <label for="username">{{ __('Username') }}</label>
                            <input id="username" class="form-control" type="text" name="username" value="{{ old('username') }}" required autofocus>
                        </div>

                        <div class="form-group mt-4">
                            <label for="mail">{{ __('Email') }}</label>
                            <input id="mail" class="form-control" type="email" name="mail" value="{{ old('mail') }}" required>
                        </div>

                        <div class="form-group mt-4">
                            <label for="password">{{ __('Password') }}</label>
                            <input id="password" class="form-control" type="password" name="password" required>
                        </div>

                        <div class="form-group mt-4">
                            <label for="password_confirmation">{{ __('Confirm Password') }}</label>
                            <input id="password_confirmation" class="form-control" type="password" name="password_confirmation" required>
                        </div>

                        <div class="d-flex justify-content-center mb-3 mt-1">
                        <div class="cf-turnstile"
                                data-sitekey="{{ config('services.turnstile.key') }}"
                                data-action="login"
                                data-theme="light">
                        </div>
                        </div>

                        <div class="form-group mb-0">

                            <button type="submit" class="btn btn-primary btn-block">
                                {{ __('Register') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
