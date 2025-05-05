@extends('housekeeping.app')

@section('content')
<div class="container mt-4">
    <h2 class="mb-3">VPN Blacklist</h2>

    <!-- Form to add new IP (Moved to the Top) -->
    <div class="card mb-4">
        <div class="card-body">
            <h4 class="card-title">Add New IP</h4>
            <form action="{{ route('housekeeping.admin.blacklist.store') }}" method="POST">
                @csrf
                <div class="form-row">
                    <div class="col-md-5 mb-2">
                        <input type="text" name="ip_address" class="form-control" placeholder="Enter IP Address" required>
                    </div>
                    <div class="col-md-5 mb-2">
                        <input type="text" name="reason" class="form-control" placeholder="Reason (optional)">
                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-success btn-block">Add</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Table displaying blacklisted IPs -->
    <div class="card">
        <div class="card-body">
            <table class="table table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>IP Address</th>
                        <th>Reason</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($blacklist as $ip)
                    <tr>
                        <td>{{ $ip->ip_address }}</td>
                        <td>{{ $ip->reason ?? 'N/A' }}</td>
                        <td>
                            <form action="{{ route('housekeeping.admin.blacklist.destroy', $ip->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Remove</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
