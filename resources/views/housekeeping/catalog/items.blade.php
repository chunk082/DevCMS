@extends('housekeeping.app')

@section('content')
<div class="container">
    <h1 class="my-3">Catalog Items</h1>

    <!-- Add New Item Button -->
    <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addCatalogItemModal">Add New Item</button>

    <!-- Filter Form -->
    <form method="GET" action="{{ route('housekeeping.catalog.items.index') }}" class="d-flex mb-4">
        <input type="text" name="filter" placeholder="Search by ID, Catalog Name, Club Only, or VIP Only" class="form-control me-2" value="{{ request('filter') }}">
        
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

    <!-- Success Message -->
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Catalog Items Table -->
    <table class="table table-hover align-middle">
        <thead class="table-light">
            <tr>
                <th>ID</th>
                <th>Item IDs</th>
                <th>Page IDs</th>
                <th>Catalog Name</th>
                <th>Cost Credits</th>
                <th>Cost Points</th>
                <th>Club Only</th>
                <th>VIP Only</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($catalogItems as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->item_ids }}</td>
                    <td>{{ $item->page_id }}</td>
                    <td>{{ $item->catalog_name }}</td>
                    <td>{{ $item->cost_credits }}</td>
                    <td>{{ $item->cost_points }}</td>
                    <td>{{ $item->club_only ? 'Yes' : 'No' }}</td>
                    <td>{{ $item->vip_only ? 'Yes' : 'No' }}</td>
                    <td>
                        <!-- Edit Button -->
                        <button 
                            type="button" 
                            class="btn btn-warning btn-sm" 
                            data-bs-toggle="modal" 
                            data-bs-target="#editCatalogItemModal" 
                            data-id="{{ $item->id }}" 
                            data-page_ids="{{ $item->page_id }}" 
                            data-catalog_name="{{ $item->catalog_name }}" 
                            data-cost_credits="{{ $item->cost_credits }}" 
                            data-cost_points="{{ $item->cost_points }}" 
                            data-points_type="{{ $item->points_type }}" 
                            data-amount="{{ $item->amount }}" 
                            data-limited_stack="{{ $item->limited_stack }}" 
                            data-limited_sells="{{ $item->limited_sells }}" 
                            data-have_offer="{{ $item->have_offer }}" 
                            data-club_only="{{ $item->club_only }}">
                                    Edit
                        </button>

                        <!-- Delete Button -->
                        <form action="{{ route('housekeeping.catalog.items.delete', $item->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center">No catalog items found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <!-- Pagination -->
    <div class="d-flex justify-content-center mt-4">
        {{ $catalogItems->links('pagination::bootstrap-5') }}
    </div>
</div>

<!-- Add New Item Modal -->
<div class="modal fade" id="addCatalogItemModal" tabindex="-1" aria-labelledby="addCatalogItemModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form id="addCatalogItemForm" method="POST" action="{{ route('housekeeping.catalog.items.store') }}">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="addCatalogItemModalLabel">Add New Catalog Item</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Add fields for catalog_items table -->
                    <div class="mb-3">
                        <label for="id" class="form-label">ID</label>
                        <input type="number" id="id" name="id" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="page_id" class="form-label">Page ID</label>
                        <input type="number" id="page_id" name="page_id" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="item_ids" class="form-label">Item IDs</label>
                        <input type="text" id="item_ids" name="item_ids" class="form-control" maxlength="666" required>
                    </div>
                    <div class="mb-3">
                        <label for="catalog_name" class="form-label">Catalog Name</label>
                        <input type="text" id="catalog_name" name="catalog_name" class="form-control" maxlength="100" required>
                    </div>
                    <div class="mb-3">
                        <label for="cost_credits" class="form-label">Cost Credits</label>
                        <input type="number" id="cost_credits" name="cost_credits" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="cost_points" class="form-label">Cost Points</label>
                        <input type="number" id="cost_points" name="cost_points" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="points_type" class="form-label">Points Type</label>
                        <input type="number" id="points_type" name="points_type" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="amount" class="form-label">Amount</label>
                        <input type="number" id="amount" name="amount" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="limited_stack" class="form-label">Limited Stack</label>
                        <input type="limited_stack" id="limited_stack" name="limited_stack" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="limited_sells" class="form-label">Limited Sells</label>
                        <input type="number" id="limited_sells" name="limited_sells" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="order_number" class="form-label">Order Number</label>
                        <input type="number" id="order_number" name="order_number" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="offer_id" class="form-label">Offer ID:</label>
                        <input type="number" id="offer_id" name="offer_id" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="song_id" class="form-label">Song ID:</label>
                        <input type="number" id="song_id" name="song_id" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="extradata" class="form-label">Extra Data:</label>
                        <input type="number" id="extradata" name="extradata" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="club_only" class="form-label">Club Only</label>
                        <select id="club_only" name="club_only" class="form-select">
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="have_offer" class="form-label">Have Offer</label>
                        <select id="have_offer" name="have_offer" class="form-select">
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save Item</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Item Modal -->
<div class="modal fade" id="editCatalogItemModal" tabindex="-1" aria-labelledby="editCatalogItemModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form id="editCatalogItemForm" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title" id="editCatalogItemModalLabel">Edit Catalog Item</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Page IDs -->
                    <div class="mb-3">
                        <label for="edit_page_ids" class="form-label">Page IDs</label>
                        <input type="text" id="edit_page_ids" name="page_ids" class="form-control" maxlength="666">
                    </div>

                    <!-- Catalog Name -->
                    <div class="mb-3">
                        <label for="edit_catalog_name" class="form-label">Catalog Name</label>
                        <input type="text" id="edit_catalog_name" name="catalog_name" class="form-control" maxlength="100">
                    </div>

                    <!-- Cost Credits -->
                    <div class="mb-3">
                        <label for="edit_cost_credits" class="form-label">Cost Credits</label>
                        <input type="number" id="edit_cost_credits" name="cost_credits" class="form-control">
                    </div>

                    <!-- Cost Points -->
                    <div class="mb-3">
                        <label for="edit_cost_points" class="form-label">Cost Points</label>
                        <input type="number" id="edit_cost_points" name="cost_points" class="form-control">
                    </div>

                    <!-- Points Type -->
                    <div class="mb-3">
                        <label for="edit_points_type" class="form-label">Points Type</label>
                        <input type="number" id="edit_points_type" name="points_type" class="form-control">
                    </div>

                    <!-- Amount -->
                    <div class="mb-3">
                        <label for="edit_amount" class="form-label">Amount</label>
                        <input type="number" id="edit_amount" name="amount" class="form-control">
                    </div>

                    <!-- Limited Stack -->
                    <div class="mb-3">
                        <label for="edit_limited_stack" class="form-label">Limited Stack</label>
                        <input type="number" id="edit_limited_stack" name="limited_stack" class="form-control">
                    </div>

                    <!-- Limited Sells -->
                    <div class="mb-3">
                        <label for="edit_limited_sells" class="form-label">Limited Sells</label>
                        <input type="number" id="edit_limited_sells" name="limited_sells" class="form-control">
                    </div>

                    <!-- Have Offer -->
                    <div class="mb-3">
                        <label for="edit_have_offer" class="form-label">Have Offer</label>
                        <select id="edit_have_offer" name="have_offer" class="form-select">
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </div>

                    <!-- Club Only -->
                    <div class="mb-3">
                        <label for="edit_club_only" class="form-label">Club Only</label>
                        <select id="edit_club_only" name="club_only" class="form-select">
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
    // Handle Edit Modal
    var editCatalogItemModal = document.getElementById('editCatalogItemModal');
    editCatalogItemModal.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget;

        // Retrieve data attributes from the button
        var id = button.getAttribute('data-id');
        var pageIds = button.getAttribute('data-page_ids');
        var catalogName = button.getAttribute('data-catalog_name');
        var costCredits = button.getAttribute('data-cost_credits');
        var costPoints = button.getAttribute('data-cost_points');
        var pointsType = button.getAttribute('data-points_type');
        var amount = button.getAttribute('data-amount');
        var limitedStack = button.getAttribute('data-limited_stack');
        var limitedSells = button.getAttribute('data-limited_sells');
        var haveOffer = button.getAttribute('data-have_offer');
        var clubOnly = button.getAttribute('data-club_only');

        // Populate the form fields in the modal
        var form = document.getElementById('editCatalogItemForm');
        form.action = `/housekeeping/catalog-items/update/${id}`;
        form.querySelector('#edit_page_ids').value = pageIds;
        form.querySelector('#edit_catalog_name').value = catalogName;
        form.querySelector('#edit_cost_credits').value = costCredits;
        form.querySelector('#edit_cost_points').value = costPoints;
        form.querySelector('#edit_points_type').value = pointsType;
        form.querySelector('#edit_amount').value = amount;
        form.querySelector('#edit_limited_stack').value = limitedStack;
        form.querySelector('#edit_limited_sells').value = limitedSells;
        form.querySelector('#edit_have_offer').value = haveOffer;
        form.querySelector('#edit_club_only').value = clubOnly;
    });
});
</script>
@endsection
