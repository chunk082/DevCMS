@extends('layouts.app')

@section('title')
    {{ config('app.name') }} - My Password
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
                            <a href="{{ route('account.password') }}" class="nav-link active">Password</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('account.discord') }}" class="nav-link">Discord</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
         <div class="col-lg-6 col-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="silver">Your Password</h5>
                    <p>Update your password to keep your account secure.</p>
                    <hr />

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

                    <form action="{{ route('account.password.update') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="current_password">Current Password:</label>
                            <input 
                                type="password" 
                                class="form-control" 
                                name="current_password" 
                                id="current_password" 
                                required>
                        </div>

                        <div class="form-group">
                            <label for="new_password">New Password:</label>
                            <input 
                                type="password" 
                                class="form-control" 
                                name="new_password" 
                                id="new_password" 
                                required>
                        </div>

                        <div class="form-group">
                            <label for="new_password_confirmation">Confirm New Password:</label>
                            <input 
                                type="password" 
                                class="form-control" 
                                name="new_password_confirmation" 
                                id="new_password_confirmation" 
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
