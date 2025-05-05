@extends('housekeeping.app')

@section('title')
    {{ config('app.name') }} - Room Chatlogs
@endsection

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Search Chat Logs</h2>
    <form method="GET" action="{{ route('housekeeping.roomchatlogs') }}" class="mb-4">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Search by username" value="{{ old('search', $search) }}">
            <button type="submit" class="btn btn-primary">Search</button>
        </div>
    </form>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Room ID</th>
                <th>Room Name</th>
                <th>Username</th>
                <th>Message</th>
                <th>Timestamp</th>
            </tr>
        </thead>
        <tbody>
            @forelse($chatLogs as $log)
                <tr>
                    <td>{{ $log->room_id }}</td>
                    <td>{{ $log->room_name }}</td>
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