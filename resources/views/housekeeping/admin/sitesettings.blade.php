@extends('housekeeping.app')

@section('title')
    Housekeeping - Site Settings
@endsection

@section('content')
<div class="container my-4">
    <h1>Site Settings</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <form action="{{ route('housekeeping.admin.sitesettings.update') }}" method="POST">
        @csrf
        <!-- Staff Application Tab Visibility -->
        <div class="form-group">
            <label for="staff_application_tab_visible">Staff Application Tab</label>
            <select id="staff_application_tab_visible" name="staff_application_tab_visible" class="form-control" style="width: 150px;">
                <option value="true" {{ $staffApplicationTabVisible == 'true' ? 'selected' : '' }}>True</option>
                <option value="false" {{ $staffApplicationTabVisible == 'false' ? 'selected' : '' }}>False</option>
            </select>
        </div>
        <br />

        <!-- Maintenance Mode -->
        <div class="form-group">
            <label for="maintenance_mode">Maintenance Mode</label>
            <select id="maintenance_mode" name="maintenance_mode" class="form-control" style="width: 150px;">
                <option value="true" {{ $maintenanceMode == 'true' ? 'selected' : '' }}>True</option>
                <option value="false" {{ $maintenanceMode == 'false' ? 'selected' : '' }}>False</option>
            </select>
        </div>
        <br />

        <!-- Theme Selection -->
        <div class="form-group">
            <label for="theme">Select Theme</label>
            <select id="theme" name="theme" class="form-control" style="width: 200px;" required>
                <option value="Default" {{ $currentTheme === 'default' ? 'selected' : '' }}>Default Theme</option>
                <option value="Christmas" {{ $currentTheme === 'Christmas' ? 'selected' : '' }}>Christmas Theme</option>
            </select>
        </div>
        <br />

        <button type="submit" class="btn btn-primary">Save Settings</button>
    </form>
</div>
@endsection
