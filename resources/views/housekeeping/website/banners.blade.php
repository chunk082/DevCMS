@extends('housekeeping.app')

@section('title', 'Manage Banners')

@section('content')
<div class="container mt-4">
    <h1>Manage Banners</h1>
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createBannerModal">
        Add New Banner
    </button>

    @if(session('success'))
        <div class="alert alert-success mt-3">{{ session('success') }}</div>
    @endif

    <table class="table table-striped mt-3">
        <thead>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Image</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($banners as $banner)
                <tr>
                    <td>{{ $banner->title }}</td>
                    <td>{!! $banner->desc !!}</td>
                    <td>
                        <img src="{{ asset('/' . $banner->image_path) }}" alt="{{ $banner->title }}" width="100">
                    </td>
                    <td>
                        <span class="badge {{ $banner->active ? 'bg-success' : 'bg-secondary' }}">
                            {{ $banner->active ? 'Enabled' : 'Disabled' }}
                        </span>
                    </td>
                    <td>
                        <button class="btn btn-primary btn-sm" 
                            data-bs-toggle="modal" 
                            data-bs-target="#editBannerModal" 
                            data-id="{{ $banner->id }}" 
                            data-title="{{ $banner->title }}" 
                            data-desc="{{ $banner->desc }}" 
                            data-active="{{ $banner->active }}">
                            Edit
                        </button>
                        <form action="{{ route('housekeeping.website.destroy', $banner->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this banner?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Create Banner Modal -->
<div class="modal fade" id="createBannerModal" tabindex="-1" aria-labelledby="createBannerModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createBannerModalLabel">Add New Banner</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('housekeeping.website.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="title" class="form-label">Banner Title</label>
                        <input type="text" name="title" id="title" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="desc" class="form-label">Description</label>
                        <textarea name="desc" id="desc" class="form-control tinymce-editor"></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="image" class="form-label">Banner Image</label>
                        <select name="image" id="image" class="form-control" required>
                            <option value="">-- Select Image --</option>
                            @foreach(File::files(public_path('img/promotions')) as $file)
                                <option value="/{{ basename($file) }}">{{ basename($file) }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="active" class="form-label">Status</label>
                        <select name="active" id="active" class="form-select" required>
                            <option value="1">Enabled</option>
                            <option value="0">Disabled</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success">Create Banner</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Banner Modal -->
<div class="modal fade" id="editBannerModal" tabindex="-1" aria-labelledby="editBannerModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editBannerModalLabel">Edit Banner</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="editBannerForm" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="editTitle" class="form-label">Banner Title</label>
                        <input type="text" name="title" id="editTitle" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="editDesc" class="form-label">Description</label>
                        <textarea name="desc" id="editDesc" class="form-control tinymce-editor"></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="editActive" class="form-label">Status</label>
                        <select name="active" id="editActive" class="form-select" required>
                            <option value="1">Enabled</option>
                            <option value="0">Disabled</option>
                        </select>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Update Banner</button>
                </div>
            </form>
        </div>
    </div>
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
            selector: '.tinymce-editor',
            plugins: 'advlist autolink lists link image charmap preview anchor table code',
            toolbar: 'undo redo | bold italic | alignleft aligncenter alignright alignjustify | link code',
            menubar: false,
            height: 300,
            link_title: true,
            default_link_target: "_blank",
            target_list: [
                { title: 'Current window', value: '_self' },
                { title: 'New window', value: '_blank' }
            ],
            link_class_list: [
                { title: 'None', value: '' },
                { title: 'Blue Link', value: 'text-primary' }
            ],
            forced_root_block: 'p',
            valid_elements: '*[*]',
            content_style: `
                p.text-white.mb-0 { color: white; margin-bottom: 0; }
                a { color: #0d6efd; text-decoration: underline; }
            `,
            setup: function (editor) {
                editor.on('init', function () {
                    const desc = editor.targetElm.getAttribute('data-desc');
                    if (desc) {
                        editor.setContent(desc);
                    }
                });
            }
        });
    }

    document.addEventListener('DOMContentLoaded', function () {
        // Initialize TinyMCE for "Add New Banner" modal
        const createModal = document.getElementById('createBannerModal');
        createModal.addEventListener('show.bs.modal', function () {
            initializeTinyMCE();
            setTimeout(() => {
                if (tinymce.get('desc')) {
                    tinymce.get('desc').setContent('');
                }
            }, 500);
        });

        // Initialize TinyMCE and populate data for "Edit Banner" modal
        const editModal = document.getElementById('editBannerModal');
        editModal.addEventListener('show.bs.modal', function (event) {
            const button = event.relatedTarget;
            const bannerId = button.getAttribute('data-id');

            if (!bannerId) return;

            document.getElementById('editTitle').value = button.getAttribute('data-title');
            document.getElementById('editActive').value = button.getAttribute('data-active') === "1" ? "1" : "0";
            document.getElementById('editBannerForm').setAttribute('action', `/housekeeping/banners/${bannerId}`);

            initializeTinyMCE();

            setTimeout(() => {
                const desc = button.getAttribute('data-desc');
                if (tinymce.get('editDesc')) {
                    tinymce.get('editDesc').setContent(desc);
                }
            }, 500);
        });

        // Cleanup TinyMCE when modals are hidden
        ['createBannerModal', 'editBannerModal'].forEach(modalId => {
            const modal = document.getElementById(modalId);
            modal.addEventListener('hidden.bs.modal', function () {
                if (typeof tinymce !== 'undefined') {
                    tinymce.remove();
                }
            });
        });

        // Prevent Bootstrap modal from blocking TinyMCE link dialog
        document.addEventListener('focusin', (e) => {
            if (e.target.closest(".tox-tinymce-aux, .moxman-window, .tam-assetmanager-root") !== null) {
                e.stopImmediatePropagation();
            }
        });
    });
</script>
@endsection


