@extends('housekeeping.app')

@section('title', config('app.name') . ' - Site Support Tickets')

@section('content')
<div class="container py-4">

    <!-- Success Alert -->
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Page Heading -->
    <h2 class="mb-4">Site Support Tickets</h2>

    <!-- Filter Form -->
    <div class="mb-3">
        <form method="GET" action="{{ route('housekeeping.support.siteticket') }}">
            <div class="row">
                <div class="col-md-4">
                    <select name="status" class="form-select">
                        <option value="">All</option>
                        <option value="Queued" {{ request('status') == 'Queued' ? 'selected' : '' }}>Queued</option>
                        <option value="Open" {{ request('status') == 'Open' ? 'selected' : '' }}>Open</option>
                        <option value="Closed" {{ request('status') == 'Closed' ? 'selected' : '' }}>Closed</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary">Filter</button>
                </div>
            </div>
        </form>
    </div>

    <!-- Tickets Table -->
    <div class="table-responsive">
        <table class="table table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th>ID</th>
                    <th>Type</th>
                    <th>Message</th>
                    <th>Submitted At</th>
                    <th>Handled By</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
    @forelse($tickets as $ticket)
        <tr>
            <td>{{ $ticket->id }}</td>
            <td>{{ ucfirst(str_replace('_', ' ', $ticket->ticket_type)) }}</td>
            <td>{{ \Illuminate\Support\Str::limit($ticket->message, 60, '...') }}</td>
            <td>{{ $ticket->created_at->format('Y-m-d H:i') }}</td>
            <td>{{ $ticket->user->username ?? 'Unknown' }}</td>
            <td>
                <span class="badge {{ $ticket->status == 'Open' ? 'bg-success' : 'bg-danger' }}">
                    {{ ucfirst($ticket->status) }}
                </span>
            </td>
            <td>
                <button 
                    type="button" 
                    class="btn btn-sm btn-primary" 
                    data-bs-toggle="modal" 
                    data-bs-target="#viewResponsesModal" 
                    data-id="{{ $ticket->id }}"
                    data-ticket-type="{{ $ticket->ticket_type }}"
                    data-message="{{ $ticket->message }}" 
                    data-username="{{ $ticket->user->username ?? 'Unknown' }}" 
                    data-timestamp="{{ $ticket->created_at }}" 
                    data-responses="{{ json_encode($ticket->respond_messages ?? []) }}" 
                    data-status="{{ $ticket->status }}">
                    View
                </button>
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="7" class="text-center">No tickets found.</td>
        </tr>
    @endforelse
</tbody>

        </table>
    </div>

    <!-- Pagination -->
    <div class="d-flex justify-content-center mt-4">
        {{ $tickets->links('pagination::bootstrap-4') }}
    </div>

    <!-- Modal for Handling Tickets -->
<div class="modal fade" id="viewResponsesModal" tabindex="-1" aria-labelledby="viewResponsesLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form id="responseForm" method="POST" action="">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Ticket Responses</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Topic -->
                    <div class="mb-3">
                        <strong>Topic:</strong> 
                        <span id="ticketTopic">No topic</span>
                        <div id="ticketSubject" class="card mb-2">
                            <div class="card-body"></div>
                        </div>
                    </div>

                    <!-- Responses -->
                    <h6>Responses:</h6>
                    <div id="responseList">
                        <div class="alert alert-info">No responses yet.</div>
                    </div>

                    <!-- Add New Response -->
                    <div class="form-group mt-3">
                        <label for="response_message" class="form-label">New Response</label>
                        <textarea name="response_message" id="responseMessage" class="form-control" rows="4" required></textarea>
                    </div>

                    <!-- Update Status -->
                    <div class="form-group mt-3">
                        <label for="status" class="form-label">Ticket Status</label>
                        <select name="status" id="ticketStatus" class="form-select">
                            <option value="Open">Open</option>
                            <option value="Closed">Closed</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- JavaScript for Passing Ticket ID to Modal -->
<script> 
document.addEventListener('DOMContentLoaded', function () {
    console.log('Modal initialized');

    var viewResponsesModal = document.getElementById('viewResponsesModal');
    viewResponsesModal.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget;
        var ticketId = button.getAttribute('data-id');
        var ticketType = button.getAttribute('data-ticket-type') || 'No topic';
        var subjectMessage = button.getAttribute('data-message') || 'No subject message';
        var subjectUsername = button.getAttribute('data-username') || 'Unknown User';
        var subjectTimestamp = button.getAttribute('data-timestamp') || 'N/A';
        var responses = JSON.parse(button.getAttribute('data-responses') || '[]');
        var status = button.getAttribute('data-status');

        // Populate the form's action attribute
        this.querySelector('form#responseForm').setAttribute('action', `/housekeeping/support/reply/${ticketId}`);

        // Populate the topic
        this.querySelector('#ticketTopic').textContent = ticketType;

        // Populate the subject
        var ticketSubject = this.querySelector('#ticketSubject .card-body');
        ticketSubject.innerHTML = `
            <p>
                <strong>${subjectUsername}</strong>
                <small class="text-muted">${new Date(subjectTimestamp).toLocaleString()}</small>
            </p>
            <p>${subjectMessage}</p>
        `;

        // Populate the responses
        var responseList = this.querySelector('#responseList');
        responseList.innerHTML = ''; // Clear previous responses

        if (responses.length > 0) {
            responses.forEach(function (response) {
                var responseHtml = `
                    <div class="card mb-2">
                        <div class="card-body">
                            <p><strong>${response.username}</strong> 
                            <small class="text-muted">${new Date(response.timestamp).toLocaleString()}</small></p>
                            <p>${response.message}</p>
                        </div>
                    </div>
                `;
                responseList.insertAdjacentHTML('beforeend', responseHtml);
            });
        } else {
            responseList.innerHTML = '<div class="alert alert-info">No responses yet.</div>';
        }

        // Set the ticket status in the dropdown
        this.querySelector('#ticketStatus').value = status;
    });
});

</script>
@endsection
