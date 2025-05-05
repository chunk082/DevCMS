@extends('housekeeping.app')

@section('title', 'Camera Images')

@section('content')
<div class="container mt-4">
    <h2>Published Images</h2>

    <div class="row">
        @foreach ($images as $image)
            <div class="col-md-4 mb-3">
                <div class="card">
                    <img src="{{ $image->url }}" class="card-img-top" alt="Uploaded Image" style="width: 100%; height: 250px; object-fit: cover;">
                    <div class="card-body">
                        <form action="{{ route('housekeeping.camera.destroy', $image->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this image?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
