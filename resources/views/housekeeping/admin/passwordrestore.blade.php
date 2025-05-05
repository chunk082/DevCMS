@extends('housekeeping.app')

@section('title', 'Password Restore Tool')

@section('content')
<div class="container my-4">
    <h1>Password Restore Tool</h1>
    <p class="text-muted">Use this tool to generate a temporary password for a user.</p>

    @if(session('temp_password'))
<div class="alert alert-success mt-3">
    <strong>Temporary Password Generated:</strong> {{ session('temp_password') }}
</div>
@endif

    <form action="{{ route('housekeeping.admin.passwordrestore.post') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="username" class="form-label">Habbo Username</label>
            <input type="text" name="username" id="username" class="form-control" placeholder="Enter Habbo username" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">New Email Address (optional)</label>
            <input type="email" name="email" id="email" class="form-control" placeholder="Enter new email address">
        </div>
        <div class="mb-3">
            <label for="customMessage" class="form-label">Custom Message</label>
            <textarea name="customMessage" id="customMessage" class="form-control" rows="4" placeholder="Enter custom message (optional)"></textarea>
        </div>
        <div class="mb-3">
            <label for="subject" class="form-label">Email Subject</label>
            <input type="text" name="subject" id="subject" class="form-control" value="Your New Temporary Password" required>
        </div>
        <button type="submit" class="btn btn-primary">Restore</button>
    </form>
</div>
@endsection
