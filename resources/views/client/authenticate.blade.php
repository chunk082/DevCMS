@extends('layouts.app')

@section('title')
    {{ config('app.name') }} - Community
@endsection

@section('content')

<main class="position-relative container justify-content-center py-4">
        <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-4 col-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="silver">Authentication</h5>

                        <p>Please re-enter your password.</p><hr />

                        
                        <form method="POST" action="{{ route('client.authenticate.post') }}">
        @csrf
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <button type="submit" class="btn btn-primary">Authenticate</button>
    </form>
</div>
                    </div>
                </div>
            </div>

            <div class="col-lg-8 col-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="silver">What's this?</h5>

                        <p>To enhance your security, we've implemented a policy that requires you to re-authenticate by re-entering your password every 60 minutes.</p>

                        <p>While this may introduce a slight interruption, rest assured that your client session will not be disrupted. You'll simply be prompted to re-enter your password when you refresh the page or conduct an activity that triggers a reload.</p>

                        <p>Please note, you're not required to enter your password immediately upon logging in to the website. This policy only takes effect after the initial 60 minutes of your session have elapsed.</p>

                        <p class="mb-0">Why this change? This is primarily due to our recent decision to extend web sessions from 120 minutes to a full day (1440 minutes). In light of this extension, we believe it's prudent to require periodic re-authentication to maintain high security standards. We appreciate your understanding as we continue to safeguard your online experience.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection