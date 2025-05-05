@extends('housekeeping.app')

@section('title')
    Housekeeping - Users
@endsection

@section('content')
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <h2>Search for Users</h2>
    <form action="{{ route('housekeeping.users.search') }}" method="GET">
        <div class="form-group">
            <label for="search">Username or IP:</label>
            <input type="text" name="search" id="search" class="form-control" required>
        </div>
        <br />
        <button type="submit" class="btn btn-primary">Search</button>
    </form>

    <div class="row mt-4">
        <div class="col-md-12">
            <h2>All Users</h2>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>User ID</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->username }}</td>
                            <td>{{ $user->mail }}</td>
                            <td>
                                <!-- Edit Button -->
                                <button type="button" class="btn btn-primary edit-user-btn"
                                    data-bs-toggle="modal"
                                    data-bs-target="#editUserModal"
                                    data-user-id="{{ $user->id }}"
                                    data-look="{{ $user->look }}"
                                    data-username="{{ $user->username }}"
                                    data-useremail="{{ $user->mail }}"
                                    data-motto="{{ $user->motto }}"
                                    data-rank="{{ $user->rank }}"
                                    data-ip_register="{{ $user->ip_register }}"
                                    data-ip_current="{{ $user->ip_current }}"
                                    data-coins="{{ $user->credits }}"
                                    data-gotw="{{ $user->gotw_points }}">
                                    <i class="fas fa-pencil-alt"></i>
                                </button>

                                <!-- Clone Button -->
                                <a href="{{ route('housekeeping.users.clones', $user->id) }}" class="btn btn-warning text-white">
                                    <i class="fas fa-eye"></i>
                                </a>

                                <!-- Ban Button -->
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#banModal"
                                    data-user-id="{{ $user->id }}" data-username="{{ $user->username }}">
                                    <i class="fas fa-ban"></i>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            </table>

<div class="d-flex justify-content-center">
    {{ $users->appends(request()->query())->links('pagination::bootstrap-4') }}
</div>


        </div>
    </div>

    <!-- Edit User Modal -->
    <div class="modal fade" id="editUserModal" tabindex="-1" role="dialog" aria-labelledby="editUserModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form method="POST" action="" id="editUserForm">
                    @csrf
                    @method('PUT')
                    <div class="modal-header">
                        <h5 class="modal-title" id="editUserModalLabel">Edit User</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <div class="text-center mb-3">
                            <img id="avatarPreview" src="" alt="User Avatar" class="img-fluid rounded" style="width: 150px; height: 150px; object-fit: contain; border: 2px solid #ccc;">
                        </div>

                        <input type="hidden" id="userId" name="user_id">

                        <div class="mb-3">
                            <label for="username" class="form-label">Username:</label>
                            <input type="text" class="form-control" id="username" name="username" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="useremail" class="form-label">Email:</label>
                            <input type="text" class="form-control" id="useremail" name="useremail" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="motto" class="form-label">Motto:</label>
                            <input type="text" class="form-control" id="motto" name="motto">
                        </div>
                        <div class="mb-3">
                            <label for="rank" class="form-label">Rank:</label>
                            <select class="form-select" id="rank" name="rank">
                                <option value="1">Member</option>
                                <option value="2">Bronze VIP</option>
                                <option value="3">Silver VIP</option>
                                <option value="4">Gold VIP</option>
                                <option value="5">Trial Moderator</option>
                                <option value="6">Moderator</option>
                                <option value="7">Super Moderator</option>
                                <option value="8">Administrator</option>
                                <option value="9">Developer</option>
                                <option value="10">Owner</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="ip_register" class="form-label">Registered IP:</label>
                                <input type="text" class="form-control" id="ip_register" name="ip_register" readonly>
                            </div>

                        <div class="mb-3">
                            <label for="ip_current" class="form-label">Current IP:</label>
                                <input type="text" class="form-control" id="ip_current" name="ip_current" readonly>
                        </div>

                        <div class="mb-3">
                            <label for="coins" class="form-label">Coins:</label>
                            <input type="number" class="form-control" id="coins" name="coins" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="gotw" class="form-label">GOTW Points:</label>
                            <input type="number" class="form-control" id="gotw" name="gotw_points" readyonly>
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

    <!-- Ban User Modal -->
    <div class="modal fade" id="banModal" tabindex="-1" role="dialog" aria-labelledby="banModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="banModalLabel">Ban User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="{{ route('housekeeping.banUser', 0) }}" id="banForm">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="ban_reason">Ban Reason</label>
                            <textarea id="ban_reason" name="ban_reason" class="form-control @error('ban_reason') is-invalid @enderror" required></textarea>
                            @error('ban_reason')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="ban_expire">Ban Expiry</label>
                            <input type="datetime-local" id="ban_expire" name="ban_expire"
                                class="form-control @error('ban_expire') is-invalid @enderror" required>
                            @error('ban_expire')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="ban_type">Ban Type</label>
                            <select id="ban_type" name="ban_type"
                                class="form-control @error('ban_type') is-invalid @enderror" required>
                                <option value="account">Account</option>
                                <option value="ip">IP</option>
                                <option value="machine">Machine</option>
                                <option value="super">Super</option>
                            </select>
                            @error('ban_type')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Ban User</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const editUserModal = document.getElementById('editUserModal');
            const editUserForm = document.getElementById('editUserForm');

            const userIdField = document.getElementById('userId');
            const look = document.getElementById('look');
            const usernameField = document.getElementById('username');
            const emailField = document.getElementById('useremail')
            const mottoField = document.getElementById('motto');
            const rankField = document.getElementById('rank');
            const ipRegisterField = document.getElementById('ip_register');
            const ipCurrentField = document.getElementById('ip_current');
            const coinsField = document.getElementById('coins');
            const gotwField = document.getElementById('gotw');

            editUserModal.addEventListener('show.bs.modal', function (event) {
                const button = event.relatedTarget;

                // Get the user look from data-look attribute
                const look = button.getAttribute('data-look');
    
                 // Update the avatar preview
                const avatarUrl = `https://imager.habboon.pw/?figure=${look}&direction=2&head_direction=3&gesture=sml&action=wav`;
                    avatarPreview.src = avatarUrl;

                userIdField.value = button.getAttribute('data-user-id');
                usernameField.value = button.getAttribute('data-username');
                emailField.value = button.getAttribute('data-useremail');
                mottoField.value = button.getAttribute('data-motto');
                rankField.value = button.getAttribute('data-rank');
                ipRegisterField.value = button.getAttribute('data-ip_register');
                ipCurrentField.value = button.getAttribute('data-ip_current');
                coinsField.value = button.getAttribute('data-coins');
                gotwField.value = button.getAttribute('data-gotw');

                editUserForm.action = `/housekeeping/users/${userIdField.value}`;
            });

            const banModal = document.getElementById('banModal');
            banModal.addEventListener('show.bs.modal', function (event) {
                const button = event.relatedTarget;

                const userId = button.getAttribute('data-user-id');
                const username = button.getAttribute('data-username');

                const modalTitle = banModal.querySelector('.modal-title');
                const form = banModal.querySelector('form');
                modalTitle.textContent = 'Ban User: ' + username;
                form.action = `/housekeeping/users/${userId}/ban`;

            });
        });
    </script>
@endsection
