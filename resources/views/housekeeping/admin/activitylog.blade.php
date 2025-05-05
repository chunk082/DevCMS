@extends('housekeeping.app')

@section('title')
    Housekeeping - Activity Logs
@endsection

@section('content')
    <div class="container my-4">
    <h1 class="mb-4">Activity Log</h1>
    <form method="GET" action="{{ route('housekeeping.admin.activitylogs') }}" class="d-flex mb-3">
    <div class="input-group">
        <input type="text" name="staff" class="form-control" placeholder="Search by Staff Name" value="{{ request('staff') }}">
        <button type="submit" class="btn btn-primary">
            <i class="fas fa-search"></i> Filter
        </button>
    </div>
</form>
</form>

    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead class="table-dark">
                <tr>
                    <th scope="col">Staff</th>
                    <th scope="col">IP Address</th>
                    <th scope="col">Action</th>
                    <th scope="col">Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach($logs as $log)
                    <tr>
                        <td>{{ $log->user->username ?? 'Unknown' }}</td>
                        <td>{{ preg_replace('/(\d+)\.(\d+)\.(\d+)\.(\d+)/', '$1.x.x.$4', $log->ip_address) }}</td>
                        <td>{{ $log->action_performed }}</td>
                        <td>{{ $log->created_at->format('Y-m-d H:i') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="d-flex justify-content-center">
         {{ $logs->links('pagination::bootstrap-4') }}
    </div>
</div>
@endsection
