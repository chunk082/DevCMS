@extends('housekeeping.app')

@section('content')
    <h1 class="mb-4">Store Transactions</h1>

    <div class="table-responsive">
        <table class="table table-striped table-bordered align-middle">
            <thead class="table-dark">
                <tr>
                    <th>User</th>
                    <th>Transaction ID</th>
                    <th>Description</th>
                    <th>Amount</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                @forelse($transactions as $transaction)
                    <tr>
                        <td>{{ $transaction->user->username ?? 'Unknown' }}</td>
                        <td>{{ $transaction->transaction_id ?? '—' }}</td>
                        <td>{{ $transaction->desc ?? '—' }}</td>
                        <td class="text-success">${{ number_format($transaction->amount, 2) }}</td>
                        <td>{{ $transaction->created_at->format('Y-m-d H:i') }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center text-muted">No transactions found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{ $transactions->links() }}
@endsection
