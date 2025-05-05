@extends('housekeeping.app')

@section('title', 'Manage Permissions')

@section('content')
<div class="container">
    <h1>Manage Permissions</h1>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Search Form -->
    <div class="mb-4">
        <input type="text" id="searchRank" class="form-control" placeholder="Enter Rank ID (1-7) or Rank Name to Search" min="1">
    </div>

    <!-- Permissions Display -->
    <div id="rankPermissionsContainer" style="display: none;">
        <h3 class="mt-4" id="rankName"></h3>

        <!-- Loop through each group of permissions -->
        <div id="permissionsGroups"></div>
    </div>
</div>
<script>
   document.addEventListener('DOMContentLoaded', function () {
    const ranks = @json($ranks);
    const permissionGroups = @json($permissionGroups);

    const searchRankInput = document.getElementById('searchRank');
    const rankPermissionsContainer = document.getElementById('rankPermissionsContainer');
    const rankNameElement = document.getElementById('rankName');
    const permissionsGroupsElement = document.getElementById('permissionsGroups');

    // Event listener for the search
    searchRankInput.addEventListener('input', function () {
        const searchValue = this.value.toLowerCase().trim();

        // If search input is empty, hide the permissions section
        if (searchValue === '') {
            rankPermissionsContainer.style.display = 'none';
            return;
        }

        // Find rank by ID or Name (case-insensitive)
        const rank = ranks.find(
            (r) => r.rank_name.toLowerCase() === searchValue || r.id.toString() === searchValue
        );

        if (rank) {
            rankNameElement.innerText = `Permissions for ${rank.rank_name}`;
            rankPermissionsContainer.style.display = 'block';
            permissionsGroupsElement.innerHTML = '';

            // Render permission groups
            Object.entries(permissionGroups).forEach(([groupName, permissions]) => {
                const card = document.createElement('div');
                card.className = 'card mb-3';

                const cardHeader = document.createElement('div');
                cardHeader.className = 'card-header';
                cardHeader.innerText = groupName;

                const cardBody = document.createElement('div');
                cardBody.className = 'card-body';

                const form = document.createElement('form');
                form.className = 'permission-form';

                const row = document.createElement('div');
                row.className = 'row';

                permissions.forEach((permission) => {
                    const col = document.createElement('div');
                    col.className = 'col-md-4';

                    const formCheck = document.createElement('div');
                    formCheck.className = 'form-check';

                    const input = document.createElement('input');
                    input.type = 'checkbox';
                    input.className = 'form-check-input';
                    input.id = permission;
                    input.name = permission;
                    input.value = 1;
                    input.checked = rank[permission] == '1';

                    const label = document.createElement('label');
                    label.className = 'form-check-label';
                    label.setAttribute('for', permission);
                    label.innerText = permission.replace(/_/g, ' ');

                    formCheck.appendChild(input);
                    formCheck.appendChild(label);
                    col.appendChild(formCheck);
                    row.appendChild(col);
                });

                form.appendChild(row);

                const submitButton = document.createElement('button');
                submitButton.type = 'button';
                submitButton.className = 'btn btn-primary mt-3';
                submitButton.innerText = 'Update Permissions';

                // Event listener for submitting the form
                submitButton.addEventListener('click', () => {
                    const updatedPermissions = {};

                    // Collect all checkboxes' values
                    form.querySelectorAll('input[type="checkbox"]').forEach((checkbox) => {
                        updatedPermissions[checkbox.name] = checkbox.checked ? 1 : 0;
                    });

                    // Send updated permissions to the server
                    submitButton.innerText = 'Saving...';
                    submitButton.disabled = true;

                    fetch(`/housekeeping/permissions/${rank.id}`, {
                        method: 'PUT',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                        },
                        body: JSON.stringify(updatedPermissions),
                    })
                        .then((response) => {
                            if (!response.ok) {
                                console.error('Server Response:', response);
                                throw new Error('Failed to update permissions.');
                            }
                            return response.json();
                        })
                        .then((data) => {
                            console.log('Update Successful:', data);
                            alert(data.message || 'Permissions updated successfully.');
                        })
                        .catch((error) => {
                            console.error('Error Updating:', error);
                            alert(error.message || 'An error occurred while updating permissions.');
                        })
                        .finally(() => {
                            submitButton.innerText = 'Update Permissions';
                            submitButton.disabled = false;
                        });
                });

                form.appendChild(submitButton);
                cardBody.appendChild(form);
                card.appendChild(cardHeader);
                card.appendChild(cardBody);
                permissionsGroupsElement.appendChild(card);
            });
        } else {
            rankPermissionsContainer.style.display = 'none';
        }
    });
});
</script>

@endsection
