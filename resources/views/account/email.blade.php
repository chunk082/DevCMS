@extends('layouts.app')

@section('title')
    {{ config('app.name') }} - My Email
@endsection

@section('content')
    <div class="row">
        <!-- Sidebar -->
        <div class="col-lg-3 col-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="silver">Account Settings</h5>
                    <ul class="nav nav-pills" id="account-navigation">
                        <li class="nav-item">
                            <a href="{{ route('account.account') }}" class="nav-link">Preferences</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('account.email') }}" class="nav-link active">Email</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('account.password') }}" class="nav-link">Password</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('account.discord') }}" class="nav-link">Discord</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="col-lg-6 col-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="silver">Your Email</h5>
                    <p>Having a legitimate email improves the chances of retrieving your account, should you lose access to it.</p>
                    <hr />

                    <!-- Email Update Form -->
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('account.email.update') }}" method="POST" class="form">
                        @csrf
                        <div class="form-group">
                            <label for="email">Email Address:</label>
                            <input 
                                type="email" 
                                class="form-control" 
                                name="email" 
                                id="email" 
                                size="32" 
                                maxlength="32" 
                                value="{{ old('email', Auth::user()->email) }}" 
                                required>
                        </div>

                        <div class="form-group mb-0">
                            <button class="btn btn-success btn-block">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
