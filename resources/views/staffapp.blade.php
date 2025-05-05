@extends('layouts.app')

@section('title')
    {{ config('app.name') }} - Staff Applications
@endsection


@section('content')
<div class="container my-5 d-flex justify-content-center">
    <div style="max-width: 600px; width: 100%;">

        <!-- Success Message -->
        @if (session('success'))
            <div class="alert alert-success text-center">
                {{ session('success') }}
            </div>
        @endif

        <!-- Staff Application Form -->
        <div class="card shadow-sm p-4" style="background-color: #ffffff;">
            <h2 class="text-center">Staff Application</h2>

            <div class="alert alert-info">
                Please fill out all fields carefully. Incomplete applications may not be considered.
            </div>

            <form action="{{ route('staff.application.submit') }}" method="POST">
                @csrf

                <div class="form-group mb-3">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Enter your username" required>
                </div>

                <div class="form-group mb-3">
                    <label for="discord_username">Discord Username</label>
                    <input type="text" class="form-control" id="discord_username" name="discord_username" placeholder="Enter your Discord username" required>
                </div>

                <div class="form-group mb-3">
                    <label for="age">How old are you?</label>
                    <input type="number" class="form-control" id="age" name="age" placeholder="Enter your age" required>
                </div>

                <div class="form-group mb-3">
                    <label for="country">Country</label>
                    <input type="text" class="form-control" id="country" name="country" placeholder="Enter your country" required>
                </div>

                <div class="form-group mb-3">
                    <label for="reason_for_joining">Why do you want to join the staff team?</label>
                    <textarea class="form-control" id="reason_for_joining" name="reason_for_joining" rows="3" placeholder="Explain why you want to join" required></textarea>
                </div>

                <div class="form-group mb-3">
                    <label for="new_ideas">What new ideas would you bring to the table?</label>
                    <textarea class="form-control" id="new_ideas" name="new_ideas" rows="3" placeholder="Describe your ideas" required></textarea>
                </div>

                <div class="form-group mb-3">
                    <label for="availability_per_day">How much time can you dedicate per day?</label>
                    <input type="text" class="form-control" id="availability_per_day" name="availability_per_day" placeholder="e.g., 2-3 hours" required>
                </div>

                <div class="form-group mb-3">
                    <label for="additional_info">Anything else?</label>
                    <textarea class="form-control" id="additional_info" name="additional_info" rows="3" placeholder="Add any other relevant information"></textarea>
                </div>

                <button type="submit" class="btn btn-primary w-100">Submit Application</button>
            </form>
        </div>
    </div>
</div>
@endsection
