@extends('housekeeping.app')

@section('content')
<div class="container">
    <h4>Crypto Payments</h4>
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>User</th>
                <th>Gateway</th>
                <th>Amount (USD)</th>
                <th>Amount (Crypto)</th>
                <th>Status</th>
                <th>Address</th>
                <th>Expires At</th>
                <th>Created</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cryptoPayments as $payment)
                <tr>
                    <td>{{ $payment->id }}</td>
                    <td>{{ $payment->user->username ?? 'Unknown' }}</td>
                    <td>{{ $payment->payment_gateway }}</td>
                    <td>${{ number_format($payment->amount, 2) }}</td>
                    <td>{{ $payment->amount_crypto }}</td>
                    <td>
    <span class="badge bg-{{ 
        $payment->status === 'paid' ? 'success' : 
        ($payment->status === 'expired' ? 'danger' : 'warning') 
    }}">
        {{ ucfirst($payment->status) }}
    </span>
</td>

                    <td>{{ $payment->address }}</td>
                    <td>{{ $payment->expires_at }}</td>
                    <td>{{ $payment->created_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $cryptoPayments->links() }}
</div>
@endsection
