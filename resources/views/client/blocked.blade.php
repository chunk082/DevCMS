@extends('layouts.app')

@section('title')
    {{ config('app.name') }} - VPN Detected
@endsection

@section('content')
<div class="row justify-content-center">
        <div class="col-lg-6 col-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="silver">Possible VPN or proxy detected</h5>

                    <p>It looks like you're currently using a VPN or Proxy... Due to this you'll not be able to connect to the hotel.</p>
                    <p class="mb-0">Please disconnect your proxy or VPN, still having issues? Let us know about it by submitting a ticket.</p>

                    <div class="mt-3">
                        <a href="/help/tickets/create" class="btn btn-primary">Submit a ticket &raquo;</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection