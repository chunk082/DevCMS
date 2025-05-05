@extends('layouts.app')

@section('title')
   Dev  - Create a new ticket
@endsection

@section('content')
    <div class="row justify-content-center" style="margin-top: 15px;">
        <div class="col-lg-6 col-12">
            @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
            <div class="alert alert-info">
                <strong>Spamming tickets will result in a ban, please do not abuse this system.</strong>
            </div>
            <div class="card">
                <div class="card-body">
                    <h5 class="silver">Create a new ticket</h5>
                    <hr/>
                    <form action="{{ route('tickets.store') }}" method="POST" class="form">
                        @csrf
                        <div class="form-group">
                            <label>
                                <strong>Ticket Type</strong>
                            </label>
                            <select name="ticket_type" class="form-control" required>
                                <option value>Please select an option</option>
                                <option value="Ban Appeal">Ban Appeal</option>
                                <option value="Scam Report">Scam Report</option>
                                <option value="Proxy Whitelist">VPN/Proxy Whitelist Request</option>
                                <option value="Room Ads">Room Ad Rights Request</option>
                                <option value="Password Recovery">Password Recovery</option>
                                <option value="Store Payment">Store Payment</option>
                                <option value="Desktop Client">Desktop Client</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>
                                <strong>Message:</strong>
                            </label>
                            <textarea name="message" cols="30" rows="5" class="form-control" required></textarea>
                            <small class="text-muted">The more detail the better!</small>
                        </div>
                        <div id="hp_field_XyBQrdLXBljbNiK6_wrap" style="display: none" aria-hidden="true">
                            <input id="hp_field_XyBQrdLXBljbNiK6" name="hp_field_XyBQrdLXBljbNiK6" type="text" value autocomplete="nope" tabindex="-1">
                            <input name="hp_from_field" type="text" value="eyJpdiI6ImQ5cVVsR2w5UjlxMjlqeUpwOGsrZUE9PSIsInZhbHVlIjoiRk5WOVB2NDZJRUoxc0dpKzUyQkpQdz09IiwibWFjIjoiMjI4ZWRkMzk4Mjc4M2I5OGViMWVhZGNmNDU4NmM3MWY2ZTI0YzQ2YWE1NWY2OTEzZjJmNzkwZWM3YzdlZjUyMSIsInRhZyI6IiJ9" autocomplete="off" tabindex="-1">
                        </div>
                        <div class="form-group mb-0">
                            <button class="btn btn-primary btn-block">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection