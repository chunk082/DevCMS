@extends('housekeeping.app')

@section('title')
    {{ config('app.name') }} - Site Tickets
@endsection

@section('content')

<!-- Button to trigger the modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#assignTicketModal" data-id="{{ $ticket->id }}">
    Assign Ticket
</button>

<!-- Modal -->
<div class="modal fade" id="assignTicketModal" tabindex="-1" aria-labelledby="assignTicketLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="assignTicketLabel">Assign Ticket to Staff</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="assignTicketForm" method="POST" action="{{ route('housekeeping.support.handle') }}">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="ticket_id" id="ticket_id" value="">
                    <p>Are you sure you want to assign this ticket to yourself?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Assign to Me</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection