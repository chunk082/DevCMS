@extends('housekeeping.app')

@section('title', 'Theme Manager')

@section('content')
<div class="container mt-4">
    <h2>Theme Manager</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form method="POST" action="{{ route('housekeeping.admin.theme.update') }}">
        @csrf

        <div class="mb-3">
            <label for="theme" class="form-label">Select Active Theme</label>
            <select class="form-select" id="theme" name="theme">
                <option value="default" {{ $currentTheme === 'default' ? 'selected' : '' }}>Default</option>
                <option value="Christmas" {{ $currentTheme === 'Christmas' ? 'selected' : '' }}>Christmas</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Save Theme</button>
    </form>
</div>
@endsection
