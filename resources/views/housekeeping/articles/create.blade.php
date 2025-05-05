@extends('housekeeping.app')

@section('title', 'Create News Article')

@section('content')
<br />
@if(session('success'))
    <div class="alert alert-success" style="width: 50%; margin: 0 auto; text-align: center;">
        {{ session('success') }}
    </div>
@endif

<div class="container">
    <h1><center>Create News Article</center></h1>
    <form method="POST" action="{{ route('housekeeping.articles.store') }}">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" id="title" name="title" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="desc">Description</label>
            <input id="desc" name="desc" class="form-control">
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea class="form-control" id="content" name="content" rows="10"></textarea>
        </div>
        <div class="form-group">
            <label for="published_by">Published By</label>
            <input type="text" id="published_by" name="published_by" class="form-control" value="{{ $username }}" readonly>
        </div>
        <div class="form-group">
            <label for="image">Image</label>
            <select id="image" name="image" class="form-control" required>
                <option value="">Select an image</option>
                @foreach($images as $image)
                    <option value="{{ $image->getFilename() }}">{{ $image->getFilename() }}</option>
                @endforeach
            </select>
            <img id="image-preview" src="#" alt="Image Preview" style="display: none; margin-top: 15px; max-width: 400px; max-height: 300px;">
        </div>
        <br />
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</div>
@endsection

@section('scripts')
<script src="/tinymce/js/tinymce/tinymce.min.js"></script>
<script>
    function initializeTinyMCE() {
        if (typeof tinymce !== 'undefined') {
            tinymce.remove(); // Clear any existing instances
        }

        tinymce.init({
            selector: '#content', // Target the content textarea
            plugins: 'advlist autolink lists link image media table code fullscreen emoticons preview wordcount',
            toolbar: 'undo redo | bold italic underline strikethrough | fontsizeselect fontselect | alignleft aligncenter alignright alignjustify | bullist numlist | forecolor backcolor | link image media | table emoticons preview fullscreen code',
            menubar: 'file edit view insert format tools table help',
            height: 500,
            branding: false,
            font_formats: 'Arial=arial,helvetica,sans-serif; Times New Roman=times new roman,times,serif; Courier New=courier new,courier,monospace;',
            fontsize_formats: '10px 12px 14px 16px 18px 24px 36px 48px',
            image_upload_url: '/upload-image', // Backend route for image uploads
            file_picker_types: 'image',
            automatic_uploads: true,
            images_upload_handler: function (blobInfo, success, failure) {
                let formData = new FormData();
                formData.append('file', blobInfo.blob());

                fetch('/upload-image', {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.json())
                .then(result => {
                    if (result.location) {
                        success(result.location);
                    } else {
                        failure('Image upload failed');
                    }
                })
                .catch(() => failure('Image upload failed'));
            }
        });
    }

    document.addEventListener('DOMContentLoaded', function () {
        initializeTinyMCE(); // Initialize TinyMCE when the page loads
        const imageSelect = document.getElementById('image'); // Dropdown for image selection
        const imagePreview = document.getElementById('image-preview'); // Preview image element

    if (imageSelect) {
        console.log('Image select element found. Adding event listener.');

        imageSelect.addEventListener('change', function (event) {
            const selectedImage = event.target.value; // Get the selected image filename
            console.log('Selected image:', selectedImage); // Log selected image filename

            if (selectedImage) {
                // Update the src of the preview image
                imagePreview.src = `/img/webpromo/${selectedImage}`;
                imagePreview.style.display = 'block'; // Make the preview visible
                console.log('Image preview updated to:', imagePreview.src); // Debugging
            } else {
                // Hide the preview image if no selection
                imagePreview.style.display = 'none';
                imagePreview.src = ''; // Clear the src
                console.log('No image selected. Hiding preview.'); // Debugging
            }
        });
    } else {
        console.error('Image select element not found.');
    }
    });
</script>
@endsection