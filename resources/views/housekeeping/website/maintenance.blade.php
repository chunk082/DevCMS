@extends('housekeeping.app')

@section('title')
    Housekeeping - Maintenance Mode
@endsection

@section('content')
<div class="container my-4">
    <h1>Maintenance Mode</h1>

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

    <form action="{{ route('housekeeping.admin.maintenance.update') }}" method="POST">
        @csrf
        <!-- Maintenance Mode -->
        <div class="form-group">
            <label for="maintenance_mode">Maintenance Mode</label>
            <select id="maintenance_mode" name="maintenance_mode" class="form-control" style="width: 150px;">
                <option value="true" {{ $maintenanceMode ? 'selected' : '' }}>True</option>
                <option value="false" {{ !$maintenanceMode ? 'selected' : '' }}>False</option>
            </select>
        </div>
        <br />
        <button type="submit" class="btn btn-primary">Save Settings</button>
    </form>
</div>
@endsection
