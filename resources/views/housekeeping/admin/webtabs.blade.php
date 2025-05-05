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
            <label for="staffapps" class="form-label">Staff Apps</label>
            <select class="form-select" id="staff_application_tab_visible" name="staff_application_tab_visible">
                <option value="true" {{ $staffApplicationTabVisible === 'true' ? 'selected' : '' }}>Enable</option>
                <option value="false" {{ $staffApplicationTabVisible === 'false' ? 'selected' : '' }}>Disable</option>
            </select>
            <br />
            <label for="trialmod" class="form-label">Trial Mod</label>
                <select class="form-select" id="trial_moderator_view" name="trial_moderator_view">
                    <option value="true" {{ $trialModeratorView === 'true' ? 'selected' : '' }}>Enable</option>
                    <option value="false" {{ $trialModeratorView === 'false' ? 'selected' : '' }}>Disable</option>
                </select>
        </div>

        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>
@endsection