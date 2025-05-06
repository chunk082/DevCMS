@extends('housekeeping.app')

@section('title', 'Website Tabs')

@section('content')
<div class="container mt-4">
    <h2>Website Tabs</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form method="POST" action="{{ route('housekeeping.admin.webtabs.update') }}">
        @csrf

        <div class="mb-3">
            <label for="staff_application_tab_visible" class="form-label">Staff Apps</label>
            <select class="form-select" id="staff_application_tab_visible" name="staff_application_tab_visible">
                <option value="true" {{ $staffApplicationTabVisible ? 'selected' : '' }}>Enable</option>
                <option value="false" {{ !$staffApplicationTabVisible ? 'selected' : '' }}>Disable</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="trial_moderator_view" class="form-label">Trial Mod</label>
            <select class="form-select" id="trial_moderator_view" name="trial_moderator_view">
                <option value="true" {{ $trialModeratorView ? 'selected' : '' }}>Enable</option>
                <option value="false" {{ !$trialModeratorView ? 'selected' : '' }}>Disable</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>
@endsection
