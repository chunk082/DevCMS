@extends('housekeeping.app')

@section('content')
<div class="container">
    <h1 class="my-3">Furniture</h1>

    <!-- Add New Furniture Button -->
    <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addFurnitureModal">Add New Furniture</button>

    <!-- Filter Form -->
    <form method="GET" action="{{ route('housekeeping.catalog.furniture.index') }}" class="d-flex mb-4">
        <input 
            type="text" 
            name="filter" 
            placeholder="Search by Public Name, Item Name, or Type" 
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

    <!-- Success Message -->
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Furniture Table -->
    <table class="table table-hover align-middle">
        <thead class="table-light">
            <tr>
                <th>ID</th>
                <th>Sprite ID</th>
                <th>Public Name</th>
                <th>Allow Stack</th>
                <th>Allow Sit</th>
                <th>Allow Lay</th>
                <th>Allow Trade</th>
                <th>Allow Gift</th>
                <th>Allow Walk</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($furniture as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->sprite_id }}</td>
                    <td>{{ $item->public_name }}</td>
                    <td>
    <span class="badge {{ $item->allow_stack ? 'bg-success' : 'bg-danger' }}">
        {{ $item->allow_stack ? 'Yes' : 'No' }}
    </span>
</td>
<td>
    <span class="badge {{ $item->allow_sit ? 'bg-success' : 'bg-danger' }}">
        {{ $item->allow_sit ? 'Yes' : 'No' }}
    </span>
</td>
<td>
    <span class="badge {{ $item->allow_lay ? 'bg-success' : 'bg-danger' }}">
        {{ $item->allow_lay ? 'Yes' : 'No' }}
    </span>
</td>
<td>
    <span class="badge {{ $item->allow_trade ? 'bg-success' : 'bg-danger' }}">
        {{ $item->allow_trade ? 'Yes' : 'No' }}
    </span>
</td>
<td>
    <span class="badge {{ $item->allow_gift ? 'bg-success' : 'bg-danger' }}">
        {{ $item->allow_gift ? 'Yes' : 'No' }}
    </span>
</td>
<td>
    <span class="badge {{ $item->allow_walk ? 'bg-success' : 'bg-danger' }}">
        {{ $item->allow_walk ? 'Yes' : 'No' }}
    </span>
</td>

                    <td>
                        <!-- Edit Button -->
                       <button 
                            type="button" 
                            class="btn btn-warning btn-sm" 
                            data-bs-toggle="modal" 
                            data-bs-target="#editFurnitureModal" 
                            data-id="{{ $item->id }}" 
                            data_sprite_id="{{ $item->sprite_id }}"
                            data-public_name="{{ $item->public_name }}" 
                            data-allow_stack="{{ $item->allow_stack }}" 
                            data-allow_sit="{{ $item->allow_sit }}" 
                            data-allow_lay="{{ $item->allow_lay }}" 
                            data-allow_walk="{{ $item->allow_walk }}" 
                            data-allow_gift="{{ $item->allow_gift }}" 
                            data-allow_trade="{{ $item->allow_trade }}" 
                            data-allow_recycle="{{ $item->allow_recycle }}" 
                            data-allow_marketplace_sell="{{ $item->allow_marketplace_sell }}">
                                        Edit
                        </button>


                        <!-- Delete Button -->
                        <form action="{{ route('housekeeping.catalog.furniture.delete', $item->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="8" class="text-center">No furniture found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <!-- Pagination -->
    <div class="d-flex justify-content-center mt-4">
        {{ $furniture->links('pagination::bootstrap-5') }}
    </div>
</div>

<!-- Add New Furniture Modal -->
<div class="modal fade" id="addFurnitureModal" tabindex="-1" aria-labelledby="addFurnitureModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form id="addFurnitureForm" method="POST" action="{{ route('housekeeping.catalog.furniture.store') }}">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="addFurnitureModalLabel">Add New Furniture</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- ID -->
                    <div class="mb-3">
                        <label for="id" class="form-label">ID</label>
                        <input type="number" id="id" name="id" class="form-control" required>
                    </div>
                    <!-- Sprite ID -->
                    <div class="mb-3">
                        <label for="sprite_id" class="form-label">Sprite ID</label>
                        <input type="number" id="sprite_id" name="sprite_id" class="form-control" required>
                    </div>
                    <!-- Public Name -->
                    <div class="mb-3">
                        <label for="public_name" class="form-label">Public Name</label>
                        <input type="text" id="public_name" name="public_name" class="form-control" maxlength="56" required>
                    </div>
                    <!-- Item Name -->
                    <div class="mb-3">
                        <label for="item_name" class="form-label">Public Name</label>
                        <input type="text" id="item_name" name="item_name" class="form-control" maxlength="56" required>
                    </div>
                    <!-- Type -->
                    <div class="mb-3">
                        <label for="type" class="form-label">Type</label>
                        <input type="text" id="type" name="type" class="form-control" maxlength="3" required>
                    </div>
                    <!-- Width -->
                    <div class="mb-3">
                        <label for="width" class="form-label">Width</label>
                        <input type="number" id="width" name="width" class="form-control" required>
                    </div>
                    <!-- Length -->
                    <div class="mb-3">
                        <label for="length" class="form-label">Length</label>
                        <input type="number" id="length" name="length" class="form-control" required>
                    </div>
                    <!-- Stack Height -->
                    <div class="mb-3">
                        <label for="stack_height" class="form-label">Stack Height</label>
                        <input type="number" step="0.01" id="stack_height" name="stack_height" class="form-control" required>
                    </div>
                    <!-- Boolean Fields -->
                    @foreach(['allow_stack', 'allow_sit', 'allow_lay', 'allow_walk', 'allow_gift', 'allow_trade', 'allow_recycle', 'allow_marketplace_sell', 'allow_inventory_stack'] as $field)
                    <div class="mb-3">
                        <label for="{{ $field }}" class="form-label">{{ ucfirst(str_replace('_', ' ', $field)) }}</label>
                        <select id="{{ $field }}" name="{{ $field }}" class="form-select">
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                    @endforeach
                    <!-- Interaction Type -->
                    <div class="mb-3">
                        <label for="interaction_type" class="form-label">Interaction Type</label>
                        <input type="text" id="interaction_type" name="interaction_type" class="form-control" maxlength="500">
                    </div>
                    <!-- Interaction Modes Count -->
                    <div class="mb-3">
                        <label for="interaction_modes_count" class="form-label">Interaction Modes Count</label>
                        <input type="number" id="interaction_modes_count" name="interaction_modes_count" class="form-control">
                    </div>
                    <!-- Vending IDs -->
                    <div class="mb-3">
                        <label for="vending_ids" class="form-label">Vending IDs</label>
                        <input type="text" id="vending_ids" name="vending_ids" class="form-control" maxlength="255">
                    </div>
                    <!-- Multiheight -->
                    <div class="mb-3">
                        <label for="multiheight" class="form-label">Multiheight</label>
                        <input type="text" id="multiheight" name="multiheight" class="form-control" maxlength="50">
                    </div>
                    <!-- Custom Params -->
                    <div class="mb-3">
                        <label for="customparams" class="form-label">Custom Params</label>
                        <input type="text" id="customparams" name="customparams" class="form-control" maxlength="256">
                    </div>
                    <!-- Effect ID Male -->
                    <div class="mb-3">
                        <label for="effect_id_male" class="form-label">Effect ID (Male)</label>
                        <input type="number" id="effect_id_male" name="effect_id_male" class="form-control">
                    </div>
                    <!-- Effect ID Female -->
                    <div class="mb-3">
                        <label for="effect_id_female" class="form-label">Effect ID (Female)</label>
                        <input type="number" id="effect_id_female" name="effect_id_female" class="form-control">
                    </div>
                    <!-- Clothing on Walk -->
                    <div class="mb-3">
                        <label for="clothing_on_walk" class="form-label">Clothing on Walk</label>
                        <input type="text" id="clothing_on_walk" name="clothing_on_walk" class="form-control" maxlength="255">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save Furniture</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Edit Furniture Modal -->
<div class="modal fade" id="editFurnitureModal" tabindex="-1" aria-labelledby="editFurnitureModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form id="editFurnitureForm" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title" id="editFurnitureModalLabel">Edit Furniture</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Public Name -->
                    <div class="mb-3">
                        <label for="edit_public_name" class="form-label">Public Name</label>
                        <input type="text" id="edit_public_name" name="public_name" class="form-control" maxlength="56" required>
                    </div>
                    <!-- Boolean Fields -->
                    @foreach(['allow_stack', 'allow_sit', 'allow_lay', 'allow_walk', 'allow_gift', 'allow_trade', 'allow_recycle', 'allow_marketplace_sell'] as $field)
                    <div class="mb-3">
                        <label for="edit_{{ $field }}" class="form-label">{{ ucfirst(str_replace('_', ' ', $field)) }}</label>
                        <select id="edit_{{ $field }}" name="{{ $field }}" class="form-select">
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                    @endforeach
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
    var editFurnitureModal = document.getElementById('editFurnitureModal');
    editFurnitureModal.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget;

        // Retrieve data attributes from the button
        var id = button.getAttribute('data-id');
        var publicName = button.getAttribute('data-public_name');
        var allowStack = button.getAttribute('data-allow_stack');
        var allowSit = button.getAttribute('data-allow_sit');
        var allowLay = button.getAttribute('data-allow_lay');
        var allowWalk = button.getAttribute('data-allow_walk');
        var allowGift = button.getAttribute('data-allow_gift');
        var allowTrade = button.getAttribute('data-allow_trade');
        var allowRecycle = button.getAttribute('data-allow_recycle');
        var allowMarketplaceSell = button.getAttribute('data-allow_marketplace_sell');

        // Populate the form fields in the modal
        var form = document.getElementById('editFurnitureForm');
        form.action = `/housekeeping/furniture/update/${id}`;
        form.querySelector('#edit_public_name').value = publicName;
        form.querySelector('#edit_allow_stack').value = allowStack;
        form.querySelector('#edit_allow_sit').value = allowSit;
        form.querySelector('#edit_allow_lay').value = allowLay;
        form.querySelector('#edit_allow_walk').value = allowWalk;
        form.querySelector('#edit_allow_gift').value = allowGift;
        form.querySelector('#edit_allow_trade').value = allowTrade;
        form.querySelector('#edit_allow_recycle').value = allowRecycle;
        form.querySelector('#edit_allow_marketplace_sell').value = allowMarketplaceSell;
    });
});
</script>

@endsection
