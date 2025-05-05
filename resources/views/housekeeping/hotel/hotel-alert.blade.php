@extends('housekeeping.app')

@section('title')
    {{ config('app.name') }} - Hotel Alert
@endsection

@section('content')
<div class="container mt-5">
    <h2 class="text-center mb-4">Hotel Alert</h2>
    <form method="POST" action="{{ route('housekeeping.hotel.alert') }}">
        @csrf
        <div class="mb-3">
            <label for="message" class="form-label">Alert Message:</label>
            <textarea id="message" name="message" class="form-control" rows="5" required></textarea>
        </div>
        <div class="text-end">
            <button type="submit" class="btn btn-primary">Send Hotel Alert</button>
        </div>
    </form>
</div>

@endsection