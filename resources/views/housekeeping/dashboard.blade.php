@extends('housekeeping.app')

@section('title', 'Dashboard')

@section('content')
<div class="row g-4">
    <!-- Registered Users Card -->
    <div class="col-md-6 col-xl-3">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="flex-grow-1">
                        <h7 class="text-muted fw-normal mt-0 text-truncate" title="Users Registered">Users Registered</h7>
                        <h3 class="my-2 py-1">{{ $userCount }}</h3>
                    </div>
                    <div class="flex-shrink-0">
                        <i class="fas fa-users fa-2x text-primary"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Users Online Card -->
    <div class="col-md-6 col-xl-3">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="flex-grow-1">
                        <h7 class="text-muted fw-normal mt-0 text-truncate" title="Users Online">Users Online</h7>
                        <h3 class="my-2 py-1">{{ $onlineUsers->count() }}</h3>
                    </div>
                    <div class="flex-shrink-0">
                        <i class="fas fa-user-check fa-2x text-success"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Active Rooms Card -->
    <div class="col-md-6 col-xl-3">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="flex-grow-1">
                        <h7 class="text-muted fw-normal mt-0 text-truncate" title="Active Rooms">Active Rooms</h7>
                        <h3 class="my-2 py-1">{{ $activeRooms }}</h3>
                    </div>
                    <div class="flex-shrink-0">
                        <i class="fas fa-door-open fa-2x text-warning"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Items in Catalogue Card -->
    <div class="col-md-6 col-xl-3">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="flex-grow-1">
                        <h7 class="text-muted fw-normal mt-0 text-truncate" title="Items in the Catalogue">Items in the Catalogue</h7>
                        <h3 class="my-2 py-1">{{ $itemsInCatalog }}</h3>
                    </div>
                    <div class="flex-shrink-0">
                        <i class="fas fa-box fa-2x text-primary"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- New Row for Additional Stats -->
<div class="row g-4 mt-4">
    <!-- Support Tickets Card -->
    <div class="col-md-6 col-xl-3">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="flex-grow-1">
                        <h7 class="text-muted fw-normal mt-0 text-truncate" title="Support Tickets">Support Tickets</h7>
                        <h3 class="my-2 py-1">{{ $websiteticket }}</h3>
                    </div>
                    <div class="flex-shrink-0">
                        <i class="fas fa-ticket fa-2x text-warning"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bans Card -->
    <div class="col-md-6 col-xl-3">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="flex-grow-1">
                        <h7 class="text-muted fw-normal mt-0 text-truncate" title="Bans">Bans</h7>
                        <h3 class="my-2 py-1">{{ $bannedUsers }}</h3>
                    </div>
                    <div class="flex-shrink-0">
                        <i class="fas fa-ban fa-2x text-danger"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Total Rooms Card -->
    <div class="col-md-6 col-xl-3">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="flex-grow-1">
                        <h7 class="text-muted fw-normal mt-0 text-truncate" title="Total Rooms">Total Rooms</h7>
                        <h3 class="my-2 py-1">{{ $totalRooms }}</h3>
                    </div>
                    <div class="flex-shrink-0">
                        <i class="fas fa-home fa-2x text-success"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Total Articles Card -->
    <div class="col-md-6 col-xl-3">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="flex-grow-1">
                        <h7 class="text-muted fw-normal mt-0 text-truncate" title="News Articles">Total Articles</h7>
                        <h3 class="my-2 py-1">{{$totalArticles}}</h3>
                    </div>
                    <div class="flex-shrink-0">
                        <i class="fas fa-newspaper fa-2x text-info"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row mt-4">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="text-center">
                    <p class="mt-4">
                       Hi {{ Auth::guard('housekeeping')->user()->username }} 👋
                    </p>

                    <p class="mt-2">
                        Welcome to the Housekeeping, where you can manage user accounts, create articles, handle support tickets, and view staff applications.
                    </p>

                    <p class="mt-2">
                        <strong>With great power comes great responsibility</strong><br>
                        The housekeeping is not to be abused, and every action made inside of the housekeeping will be logged and closely monitored. If you're caught abusing the housekeeping, you will be instantly demoted from your position and potentially banned from the hotel.
                    </p>

                    <p class="mt-4">
                        <strong>Thank you</strong> for using the housekeeping with care and stay awesome!
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
