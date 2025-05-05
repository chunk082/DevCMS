@extends('housekeeping.app')

@section('title')
    Housekeeping - Staff Apps
@endsection

@section('content')
<div class="container my-4">
    <h1 class="text-center mb-4">Staff Applications</h1>

    <div class="row">
        @foreach($applications as $application)
        <div class="col-md-6 col-lg-4 mb-4">
            <div class="card h-100">
    <div class="card-body">
        <h5 class="card-title font-weight-bold">{{ $application->username }}</h5>
        <p class="card-text"><strong>Reason:</strong> {{ $application->reason_for_joining }}</p>
        <p class="card-text"><strong>Discord Username:</strong> {{ $application->discord_username }}</p>
        <p class="card-text"><strong>Country:</strong> {{ $application->country }}</p>
        <p class="card-text"><strong>Age:</strong> {{ $application->age }}</p>
        <p class="card-text"><strong>New Ideas:</strong> {{ $application->new_ideas }}</p>
        <p class="card-text"><strong>Availability:</strong> {{ $application->availability_per_day }}</p>
        <p class="card-text"><strong>Additional Info:</strong> {{ $application->additional_info ?? 'N/A' }}</p>
        
        <!-- Button Group -->
        <div class="d-flex justify-content-between">
            <!-- Promote Button -->
            <button class="btn btn-primary" data-bs-toggle="modal" 
                data-bs-target="#promoteModal" 
                data-user-id="{{ $application->user_id }}" 
                data-username="{{ $application->username }}">
                Promote
            </button>

            <!-- Reject Form -->
            <form action="{{ route('housekeeping.admin.staffapps.reject') }}" method="POST">
                @csrf
                @method('DELETE')
                <input type="hidden" name="application_id" value="{{ $application->id }}">
                <button type="submit" class="btn btn-danger">Reject</button>
            </form>
        </div>
    </div>
</div>
        @endforeach
    </div>
</div>

<!-- Promote Modal -->
<div class="modal fade" id="promoteModal" tabindex="-1" aria-labelledby="promoteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('housekeeping.admin.staffapps.promote') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="promoteModalLabel">Promote User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="user_id" id="modalUserId">
                    <label for="rank">Select Rank:</label>
                    <select name="rank" class="form-control" required>
                        <option value="4">Trial Moderator</option>
                        <option value="5">Moderator</option>
                        <option value="6">Senior Moderator</option>
                        <option value="7">Administrator</option>
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Promote</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- JavaScript to Handle Modal Content -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var promoteModal = document.getElementById('promoteModal');
        promoteModal.addEventListener('show.bs.modal', function (event) {
            var button = event.relatedTarget; // Button that triggered the modal
            var userId = button.getAttribute('data-user-id'); // Extract info from data-* attributes
            var username = button.getAttribute('data-username'); // Extract info from data-* attributes

            // Update modal content
            var modalTitle = promoteModal.querySelector('.modal-title');
            var modalUserId = promoteModal.querySelector('#modalUserId');
            modalTitle.textContent = 'Promote User: ' + username;
            modalUserId.value = userId;
        });
    });
</script>
@endsection
