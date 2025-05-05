@extends('housekeeping.app')

@section('title')
    {{ config('app.name') }} - Private Chatlogs
@endsection

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Search Private Chat Logs</h2>
    <form method="GET" action="{{ route('housekeeping.privatechatlogs') }}" class="mb-4">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Search by username or room ID" value="{{ old('search', $search) }}">
            <button type="submit" class="btn btn-primary">Search</button>
        </div>
    </form>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Username</th>
                <th>Message</th>
                <th>Timestamp</th>
            </tr>
        </thead>
        <tbody>
            @forelse($chatLogs as $log)
                <tr>
                    <td>{{ $log->username ?? 'N/A' }}</td>
                    <td>{{ $log->message }}</td>
                    <td>{{ date('Y-m-d H:i:s', $log->timestamp) }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">No chat logs found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
         {{ $chatLogs->links('pagination::bootstrap-4') }}
    </div>
</div>
@endsection