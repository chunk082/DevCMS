@extends('housekeeping.app')

@section('title')
    Housekeeping - Badges
@endsection

@section('content')
<div class="container my-4">
    <div class="card mb-4 shadow-sm">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Assign a Badge</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('housekeeping.hotel.givebadge') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="username" class="form-label">Username:</label>
                        <input type="text" id="username" name="username" class="form-control" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="badge_code" class="form-label">Badge Code:</label>
                        <input type="text" id="badge_code" name="badge_code" class="form-control" required>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Assign Badge</button>
            </form>
        </div>
    </div>

    <div class="card shadow-sm">
        <div class="card-header bg-secondary text-white">
            <h5 class="mb-0">Assigned Badges</h5>
        </div>
        <div class="card-body p-0">
            <table class="table table-striped mb-0">
                <thead class="table-dark">
                    <tr>
                        <th>Badge ID</th>
                        <th>Username</th>
                        <th>Badge Image</th>
                        <th>Badge Code</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($assignedBadges as $badge)
                        <tr>
                            <td>{{ $badge->id }}</td>
                            <td>{{ $badge->username }}</td>
                            <td>
                                <img src="{{ asset('/img/badges/' . $badge->badge_code . '.gif') }}" alt="{{ $badge->badge_code }}" width="30">
                            </td>
                            <td>{{ $badge->badge_code }}</td>
                            <td>
                                <form action="{{ route('housekeeping.hotel.badges.destroy', $badge->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this badge?');">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger">Delete</button>
</form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">No badges assigned yet.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <br />
            <div class="d-flex justify-content-center">
         {{ $assignedBadges->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
</div>
@endsection