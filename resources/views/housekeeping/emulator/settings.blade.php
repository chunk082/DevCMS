@extends('housekeeping.app')

@section('content')
<div class="container">
    <h1 class="my-3">Emulator Settings</h1>

    <!-- Filter Form -->
    <form method="GET" action="{{ route('housekeeping.emulator.settings.index') }}" class="d-flex mb-4">
        <input 
            type="text" 
            name="filter" 
            placeholder="Search by key or value" 
            class="form-control me-2" 
            value="{{ request('filter') }}"
        >
        <button type="submit" class="btn btn-secondary">Filter</button>
    </form>

    <!-- Display Success Message -->
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Emulator Settings Table -->
    <table class="table table-hover align-middle">
        <thead class="table-light">
            <tr>
                <th>Key</th>
                <th>Value</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($settings as $setting)
                <tr>
                    <td>{{ $setting->key }}</td>
                    <td>{{ $setting->value }}</td>
                    <td>
                        <!-- Edit Button -->
                        <button 
                            type="button" 
                            class="btn btn-warning btn-sm" 
                            data-bs-toggle="modal" 
                            data-bs-target="#editSettingModal" 
                            data-key="{{ $setting->key }}" 
                            data-value="{{ $setting->value }}">
                            Edit
                        </button>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="text-center">No settings found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <!-- Pagination -->
    <div class="d-flex justify-content-center mt-4">
        {{ $settings->links('pagination::bootstrap-5') }}
    </div>
</div>

<!-- Edit Setting Modal -->
<div class="modal fade" id="editSettingModal" tabindex="-1" aria-labelledby="editSettingModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="editSettingForm" method="POST">
    @csrf
    @method('PUT')
    <div class="modal-header">
        <h5 class="modal-title" id="editSettingModalLabel">Edit Setting</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
        <div class="mb-3">
            <label for="edit_key" class="form-label">Key</label>
            <input type="text" id="edit_key" name="key" class="form-control" readonly>
        </div>
        <div class="mb-3">
            <label for="edit_value" class="form-label">Value</label>
            <input type="text" id="edit_value" name="value" class="form-control" required>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save Changes</button>
    </div>
</form>

<script>
document.addEventListener('DOMContentLoaded', function () {
    var editSettingModal = document.getElementById('editSettingModal');
    editSettingModal.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget;

        // Retrieve data attributes
        var key = button.getAttribute('data-key');
        var value = button.getAttribute('data-value');

        // Populate the form fields
        var form = document.getElementById('editSettingForm');
        form.action = `/housekeeping/emulator/update/${encodeURIComponent(key)}`;
        form.querySelector('#edit_key').value = key;
        form.querySelector('#edit_value').value = value;
    });
});
</script>

@endsection
