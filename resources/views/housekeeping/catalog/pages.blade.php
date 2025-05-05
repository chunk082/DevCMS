@extends('housekeeping.app')

@section('content')
<div class="container">
    <h1 class="my-3">Catalog Pages</h1>

    <!-- Add New Page Button -->
    <button 
        type="button" 
        class="btn btn-primary mb-3" 
        data-bs-toggle="modal" 
        data-bs-target="#addCatalogPageModal">
        Add New Page
    </button>

    <!-- Filter Form -->
    <form method="GET" action="{{ route('housekeeping.catalog.pages.index') }}" class="d-flex mb-4">
        <input 
            type="text" 
            name="filter" 
            placeholder="Filter by ID, Caption, Club Only, VIP Only" 
            class="form-control me-2" 
            value="{{ request('filter') }}"
        >
        <button type="submit" class="btn btn-secondary">Filter</button>
    </form>

    <!-- Display Validation Errors -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Catalog Pages Table -->
    <table class="table table-hover align-middle">
        <thead class="table-light">
            <tr>
                <th>ID</th>
                <th>Caption</th>
                <th>Visible</th>
                <th>Minimum Rank</th>
                <th>Club Only</th>
                <th>VIP Only</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($catalogPages as $page)
              <tr>
                <td>{{ $page->id }}</td>
                <td>{{ $page->caption }}</td>
                <td>
                    <span class="badge {{ $page->visible ? 'bg-success' : 'bg-danger' }}">
                        {{ $page->visible ? 'Yes' : 'No' }}
                    </span>
                </td>
                <td>{{ $page->min_rank }}</td>
                <td>
                    <span class="badge {{ $page->club_only ? 'bg-success' : 'bg-danger' }}">
                        {{ $page->club_only ? 'Yes' : 'No' }}
                    </span>
                </td>
                <td>
                    <span class="badge {{ $page->vip_only ? 'bg-success' : 'bg-danger' }}">
                        {{ $page->vip_only ? 'Yes' : 'No' }}
                    </span>
                </td>
                <td>
                    <button 
                        type="button" 
                        class="btn btn-warning btn-sm" 
                        data-bs-toggle="modal" 
                        data-bs-target="#editCatalogPageModal" 
                        data-id="{{ $page->id }}" 
                        data-visible="{{ $page->visible }}" 
                        data-min-rank="{{ $page->min_rank }}" 
                        data-order-num="{{ $page->order_num }}" 
                        data-club-only="{{ $page->club_only }}" 
                        data-vip-only="{{ $page->vip_only }}">
                        Edit
                    </button>

                    <form action="{{ route('housekeeping.catalog.pages.delete', $page->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
              </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center">No catalog pages found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <!-- Pagination -->
    <div class="d-flex justify-content-center mt-4">
        {{ $catalogPages->links('pagination::bootstrap-5') }}
    </div>
</div>

<!-- Add New Page Modal -->
<div class="modal fade" id="addCatalogPageModal" tabindex="-1" aria-labelledby="addCatalogPageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form id="addCatalogPageForm" method="POST" action="{{ route('housekeeping.catalog.pages.store') }}">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="addCatalogPageModalLabel">Add New Catalog Page</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- ID -->
                    <div class="mb-3">
                        <label for="id" class="form-label">ID</label>
                        <input type="number" id="id" name="id" class="form-control" required>
                    </div>

                    <!-- Parent ID -->
                    <div class="mb-3">
                        <label for="parent_id" class="form-label">Parent ID</label>
                        <input type="number" id="parent_id" name="parent_id" class="form-control">
                    </div>

                    <!-- Caption Save -->
                    <div class="mb-3">
                        <label for="caption_save" class="form-label">Caption Save</label>
                        <input type="text" id="caption_save" name="caption_save" class="form-control" maxlength="25">
                    </div>

                    <!-- Caption -->
                    <div class="mb-3">
                        <label for="caption" class="form-label">Caption</label>
                        <input type="text" id="caption" name="caption" class="form-control" maxlength="128" required>
                    </div>

                    <!-- Page Layout -->
                    <div class="mb-3">
                        <label for="page_layout" class="form-label">Page Layout</label>
                            <select id="page_layout" name="page_layout" class="form-select" required>
                                <option value="default_3x3">Default</option>
                                <option value="club_buy">Club Buy</option>
                                <option value="club_gift">Club Gift</option>
                             </select>
                    </div>

                    <!-- Icon Color -->
                    <div class="mb-3">
                        <label for="icon_color" class="form-label">Icon Color</label>
                        <input type="number" id="icon_color" name="icon_color" class="form-control">
                    </div>

                    <!-- Icon Image -->
                    <div class="mb-3">
                        <label for="icon_image" class="form-label">Icon Image</label>
                        <input type="number" id="icon_image" name="icon_image" class="form-control">
                    </div>

                    <!-- Minimum Rank -->
                    <div class="mb-3">
                        <label for="min_rank" class="form-label">Minimum Rank</label>
                        <input type="number" id="min_rank" name="min_rank" class="form-control" required>
                    </div>

                    <!-- Order Number -->
                    <div class="mb-3">
                        <label for="order_num" class="form-label">Order Number</label>
                        <input type="number" id="order_num" name="order_num" class="form-control" required>
                    </div>

                    <!-- Visible -->
                    <div class="mb-3">
                        <label for="visible" class="form-label">Visible</label>
                        <select id="visible" name="visible" class="form-select">
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </div>

                    <!-- Enabled -->
                    <div class="mb-3">
                        <label for="enabled" class="form-label">Enabled</label>
                        <select id="enabled" name="enabled" class="form-select">
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </div>

                    <!-- Club Only -->
                    <div class="mb-3">
                        <label for="club_only" class="form-label">Club Only</label>
                        <select id="club_only" name="club_only" class="form-select">
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </div>

                    <!-- VIP Only -->
                    <div class="mb-3">
                        <label for="vip_only" class="form-label">VIP Only</label>
                        <select id="vip_only" name="vip_only" class="form-select">
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </div>

                    <!-- Page Headline -->
                    <div class="mb-3">
                        <label for="page_headline" class="form-label">Page Headline</label>
                        <input type="text" id="page_headline" name="page_headline" class="form-control" maxlength="1024">
                    </div>

                    <!-- Page Teaser -->
                    <div class="mb-3">
                        <label for="page_teaser" class="form-label">Page Teaser</label>
                        <input type="text" id="page_teaser" name="page_teaser" class="form-control" maxlength="64">
                    </div>

                    <!-- Page Special -->
                    <div class="mb-3">
                        <label for="page_special" class="form-label">Page Special</label>
                        <textarea id="page_special" name="page_special" class="form-control" rows="3"></textarea>
                    </div>

                    <!-- Page Text 1 -->
                    <div class="mb-3">
                        <label for="page_text1" class="form-label">Page Text 1</label>
                        <textarea id="page_text1" name="page_text1" class="form-control" rows="3"></textarea>
                    </div>

                    <!-- Page Text 2 -->
                    <div class="mb-3">
                        <label for="page_text2" class="form-label">Page Text 2</label>
                        <textarea id="page_text2" name="page_text2" class="form-control" rows="3"></textarea>
                    </div>

                    <!-- Room ID -->
                    <div class="mb-3">
                        <label for="room_id" class="form-label">Room ID</label>
                        <input type="number" id="room_id" name="room_id" class="form-control">
                    </div>

                    <!-- Includes -->
                    <div class="mb-3">
                        <label for="includes" class="form-label">Includes</label>
                        <input type="text" id="includes" name="includes" class="form-control" maxlength="128">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save Page</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="editCatalogPageModal" tabindex="-1" aria-labelledby="editCatalogPageModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="editCatalogPageForm" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title" id="editCatalogPageModalLabel">Edit Catalog Page</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Visible -->
                    <div class="mb-3">
                        <label for="edit_visible" class="form-label">Visible</label>
                        <select id="edit_visible" name="visible" class="form-select">
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </div>

                    <!-- Minimum Rank -->
                    <div class="mb-3">
                        <label for="edit_min_rank" class="form-label">Minimum Rank</label>
                        <input type="number" id="edit_min_rank" name="min_rank" class="form-control" required>
                    </div>

                    <!-- Order Number -->
                    <div class="mb-3">
                        <label for="edit_order_num" class="form-label">Order Number</label>
                        <input type="number" id="edit_order_num" name="order_num" class="form-control" required>
                    </div>

                    <!-- Club Only -->
                    <div class="mb-3">
                        <label for="edit_club_only" class="form-label">Club Only</label>
                        <select id="edit_club_only" name="club_only" class="form-select">
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </div>

                    <!-- VIP Only -->
                    <div class="mb-3">
                        <label for="edit_vip_only" class="form-label">VIP Only</label>
                        <select id="edit_vip_only" name="vip_only" class="form-select">
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>


<script>
document.addEventListener('DOMContentLoaded', function () {
    var editCatalogPageModal = document.getElementById('editCatalogPageModal');

    editCatalogPageModal.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget;

        // Retrieve data attributes from the button
        var id = button.getAttribute('data-id');
        var visible = button.getAttribute('data-visible');
        var minRank = button.getAttribute('data-min-rank');
        var orderNum = button.getAttribute('data-order-num');
        var clubOnly = button.getAttribute('data-club-only');
        var vipOnly = button.getAttribute('data-vip-only');

        // Populate the form fields in the modal
        var form = document.getElementById('editCatalogPageForm');
        form.setAttribute('action', `/housekeeping/catalog-pages/update/${id}`);
        form.querySelector('#edit_visible').value = visible;
        form.querySelector('#edit_min_rank').value = minRank;
        form.querySelector('#edit_order_num').value = orderNum;
        form.querySelector('#edit_club_only').value = clubOnly;
        form.querySelector('#edit_vip_only').value = vipOnly;
    });
});

</script>
@endsection
