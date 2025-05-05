@extends('layouts.app')

@section('title', config('app.name') . ' - Ticket Center')

@section('content')
    <div class="row justify-content-center" style="margin-top: 15px;">

        <!-- My Tickets Section -->
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <h5 class="silver">
                        My Tickets 
                        @auth
                            <span class="float-right">
                                <a href="{{ route('tickets.create') }}">New ticket?</a>
                            </span>
                        @endauth
                    </h5>

                    @guest
                        <!-- Show login warning inside the ticket box -->
                        <div class="alert alert-danger mt-3">
                            Please login to submit a ticket, we need to be able to communicate with you. :)
                        </div>
                    @endguest

                    @auth
                        <table class="table table-bordered mb-0 mt-3">
                            <thead>
                                <tr>
                                    <th><strong>Ticket Id</strong></th>
                                    <th><strong>Type</strong></th>
                                    <th><strong>Status</strong></th>
                                    <th><strong>Date</strong></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($tickets as $ticket)
                                    <tr>
                                        <td>
                                            <a href="{{ route('tickets.show', $ticket->id) }}">
                                                {{ str_pad($ticket->id, 6, '0', STR_PAD_LEFT) }}
                                            </a>
                                        </td>
                                        <td>{{ ucfirst($ticket->ticket_type) }}</td>
                                        <td>{{ ucfirst($ticket->status) }}</td>
                                        <td>{{ $ticket->created_at }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center">No tickets found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    @endauth
                </div>
            </div>
        </div>

        <!-- Sidebar: What is this? -->
        <div class="col-lg-4">
            <h5 class="silver">What is this?</h5>
            <div class="card">
                <div class="card-body">
                    <p>Welcome to the Ticket Centre. Here you can submit a ticket to have staff assist you with solving an issue.</p>

                    <p><strong>The following ticket types are available:</strong></p>

                    <ul class="mb-0" style="padding: 0 0 0 25px;">
                        <li>Ban Appeals</li>
                        <li>Scam Reports</li>
                        <li>Proxy/VPN Whitelist Requests</li>
                        <li>Room Ad Requests</li>
                        <li>Password Recovery</li>
                        <li>Store Payment</li>
                        <li>Desktop Application</li>
                        <li>Other</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
