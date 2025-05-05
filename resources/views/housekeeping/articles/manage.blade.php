@extends('housekeeping.app')

@section('title', 'Manage Articles')

@section('content')
<div class="container mt-4">
    <h1>Manage Articles</h1>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <table class="table table-hover align-middle">
        <thead class="table-light">
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Published By</th>
                <th>Created At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($articles as $article)
                <tr id="article-row-{{ $article->id }}">
                    <td>{{ $article->id }}</td>
                    <td id="article-title-{{ $article->id }}">{{ $article->title }}</td>
                    <td>{{ $article->published_by }}</td>
                    <td>{{ $article->created_at }}</td>
                    <td>
                        <!-- Edit Button -->
                        <button class="btn btn-warning btn-sm edit-btn" 
    data-id="{{ $article->id }}" 
    data-title="{{ $article->title }}" 
    data-desc="{{ $article->desc }}" 
    data-content="{{ htmlentities($article->content) }}" 
    data-bs-toggle="modal" 
    data-bs-target="#editArticleModal">
    Edit
</button>
                        <!-- Delete Button -->
                        <form action="{{ route('housekeeping.articles.destroy', $article->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $articles->links() }} <!-- Pagination -->
</div>

<!-- Edit Article Modal -->
<div class="modal fade" id="editArticleModal" tabindex="-1" aria-labelledby="editArticleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editArticleModalLabel">Edit Article</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editArticleForm" method="POST">
                    @csrf
                    <input type="hidden" name="_method" value="PUT"> <!-- Ensures Laravel recognizes it as PUT -->
                    <input type="hidden" id="editArticleId" name="article_id">

                    <div class="form-group">
                        <label for="editTitle">Title</label>
                        <input type="text" id="editTitle" name="title" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="editDesc">Description</label>
                        <input type="text" id="editDesc" name="desc" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="editContent">Content</label>
                        <textarea id="editContent" name="content" class="form-control" rows="5"></textarea>
                    </div>

                    <br />
                    <button type="submit" class="btn btn-primary">Update Article</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<!-- TinyMCE -->
<script src="/tinymce/js/tinymce/tinymce.min.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function () {
    function initializeTinyMCE() {
        tinymce.init({
            selector: '#editContent',
            plugins: 'advlist autolink lists link image media table code fullscreen preview wordcount',
            toolbar: 'undo redo | bold italic underline strikethrough | fontsizeselect fontselect | alignleft aligncenter alignright alignjustify | bullist numlist | forecolor backcolor | link image media | table preview fullscreen code',
            height: 400,
            branding: false,
            valid_elements: '*[*]', 
            extended_valid_elements: 'span[*],div[*],img[*],iframe[*]',
            entity_encoding: 'raw', 
            content_style: 'body { font-family: Arial, sans-serif; font-size: 14px; }'
        });
    }

    const editArticleModal = document.getElementById('editArticleModal');

    editArticleModal.addEventListener('show.bs.modal', function (event) {
        const button = event.relatedTarget;
        const articleId = button.getAttribute('data-id');

        if (!articleId) return;

        document.getElementById('editTitle').value = button.getAttribute('data-title');
        document.getElementById('editDesc').value = button.getAttribute('data-desc');
        document.getElementById('editArticleId').value = articleId;
        document.getElementById('editArticleForm').setAttribute('action', `/housekeeping/articles/${articleId}`);

        initializeTinyMCE();

        setTimeout(() => {
            const content = button.getAttribute('data-content');
            if (tinymce.get('editContent')) {
                tinymce.get('editContent').setContent(decodeHTMLEntities(content));
            }
        }, 500);
    });

    // Function to decode HTML entities
    function decodeHTMLEntities(text) {
        let textArea = document.createElement("textarea");
        textArea.innerHTML = text;
        return textArea.value;
    }

    // ✅ **Update Article Without AJAX (Submit via Form)**
    document.getElementById('editArticleForm').addEventListener('submit', function (e) {
        tinymce.triggerSave(); // Ensure TinyMCE updates textarea
    });
});

</script>
@endsection
