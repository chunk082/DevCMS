@extends('housekeeping.app')

@section('title', 'Housekeeping - Word Filter')

@section('content')
<div class="container mt-4">
    <h2>Word Filter</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Word</th>
                <th>Replacement</th>
                <th>Hide</th>
                <th>Report</th>
                <th>Mute (seconds)</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($wordFilters as $filter)
            <tr>
                <td>{{ $filter->key }}</td>
                <td>{{ $filter->replacement }}</td>
                <td>{{ $filter->hide == '1' ? 'Yes' : 'No' }}</td>
                <td>{{ $filter->report == '1' ? 'Yes' : 'No' }}</td>
                <td>{{ $filter->mute > 0 ? $filter->mute . ' seconds' : 'No mute' }}</td>
                <td>
                    <form action="{{ route('housekeeping.hotel.wordfilter.destroy', $filter->key) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this word filter?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <h3>Add New Word Filter</h3>
    <form action="{{ route('housekeeping.hotel.wordfilter.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="key">Word</label>
            <input type="text" name="key" id="key" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="replacement">Replacement</label>
            <input type="text" name="replacement" id="replacement" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="hide">Hide</label>
            <select name="hide" id="hide" class="form-control" required>
                <option value="0">No</option>
                <option value="1">Yes</option>
            </select>
        </div>
        <div class="form-group">
            <label for="report">Report</label>
            <select name="report" id="report" class="form-control" required>
                <option value="0">No</option>
                <option value="1">Yes</option>
            </select>
        </div>
        <div class="form-group">
            <label for="mute">Mute Duration (seconds)</label>
            <input type="number" name="mute" id="mute" class="form-control" min="0" placeholder="Enter mute duration in seconds">
            <small class="form-text text-muted">Enter 0 for no mute.</small>
        </div>
        <button type="submit" class="btn btn-primary mt-2">Add Word</button>
    </form>
</div>
@endsection
