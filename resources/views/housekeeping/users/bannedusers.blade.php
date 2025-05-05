@extends('housekeeping.app')

@section('title')
    Housekeeping - Banned Users
@endsection

@section('content')
<div class="row mt-4">
    <div class="col-md-12">
        <h2>Banned Users</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Ban ID</th>
                    <th>Banned User</th>
                    <th>IP Address</th>
                    <th>Staff</th>
                    <th>Timestamp</th>
                    <th>Ban Reason</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($bannedUsers as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->banned_username }}</td>
                        <td>{{ preg_replace('/(\d+)\.(\d+)\.(\d+)\.(\d+)/', '$1.x.x.$4', $user->ip) }}</td>
                        <td>{{ $user->staff_username }}</td>
                        <td>{{ \Carbon\Carbon::createFromTimestamp($user->timestamp)->format('Y-m-d') }}</td>
                        <td>{{ $user->ban_reason }}</td>
                        <td>
                            <form action="{{ route('housekeeping.users.bannedusers.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to unban this user?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Unban</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection