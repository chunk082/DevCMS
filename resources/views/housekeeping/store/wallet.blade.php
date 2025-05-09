@extends('housekeeping.app')

@section('content')
    <h1 class="mb-4">User Wallet Balances</h1>

    <div class="table-responsive">
        <table class="table table-striped table-bordered align-middle">
            <thead class="table-dark">
                <tr>
                    <th>User</th>
                    <th>Balance</th>
                    <th>Last Updated</th>
                </tr>
            </thead>
            <tbody>
                @forelse($wallets as $wallet)
                    <tr>
                        <td>{{ $wallet->user->username ?? 'Unknown' }}</td>
                        <td class="text-primary">${{ number_format($wallet->balance, 2) }}</td>
                        <td>{{ $wallet->updated_at->format('Y-m-d H:i') }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-center text-muted">No wallet records found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{ $wallets->links() }}
@endsection
