<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Housekeeping</title>

    <!-- jQuery -->

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('/img/favicon-d.png') }}" type="image/vnd.microsoft.icon"/>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- Custom CSS -->
    <style>
      /* Sparkling Animation (General) */
@keyframes sparkle {
    0% { text-shadow: 0 0 5px #fff, 0 0 10px #ff0, 0 0 15px #ff0; }
    50% { text-shadow: 0 0 10px #ff0, 0 0 20px #ff0, 0 0 25px #ff0; }
    100% { text-shadow: 0 0 5px #fff, 0 0 10px #ff0, 0 0 15px #ff0; }
}

/* Gold Glow for Rank 10 */
@keyframes goldGlow {
    0% {
        text-shadow: 0 0 5px #ffd700, 0 0 10px #ffcc00, 0 0 15px #ffcc00;
    }
    100% {
        text-shadow: 0 0 10px #ffcc00, 0 0 20px #ffcc00, 0 0 25px #ffcc00;
    }
}

/* Rank-Based Styles */
.rank-5 { 
    color: #1e90ff; /* DodgerBlue */
    font-weight: bold;
    animation: sparkle 1.5s infinite alternate;
}

.rank-6 { 
    color: #32cd32; /* LimeGreen */
    font-weight: bold;
    animation: sparkle 1.5s infinite alternate;
}

.rank-7 { 
    color: #8a2be2; /* BlueViolet */
    font-weight: bold;
    animation: sparkle 1.5s infinite alternate;
}

.rank-8 { 
    color: #ff4500; /* OrangeRed */
    font-weight: bold;
    animation: sparkle 1.5s infinite alternate;
}

.rank-9 { 
    color: #ff1493; /* DeepPink */
    font-weight: bold;
    animation: sparkle 1.5s infinite alternate;
}

.rank-10 { 
    color: #ff0000; /* Red */
    font-weight: bold;
    animation: goldGlow 1.5s infinite alternate;
}

        body {
            font-family: "Ubuntu", sans-serif;
        }

        .sidebar {
            height: 100vh;
            width: 280px;
            position: fixed;
            top: 0;
            left: 0;
            background-color: #343a40;
            color: white;
            padding: 20px;
            overflow-y: auto;
        }

        .sidebar a {
            color: white;
            text-decoration: none;
            display: block;
            padding: 10px;
            transition: background 0.3s ease;
        }

        .sidebar a:hover {
            background-color: #495057;
        }

        .content {
            margin-left: 300px;
            padding: 20px;
        }

        .submenu {
            list-style: none;
            display: none;
            transition: all 0.3s ease-in-out;
            padding-left: 15px;
        }

        .submenu.open {
            display: block;
        }

        .submenu li a {
            padding-left: 35px;
            font-size: 0.9rem;
        }

        .toggle-caret {
            transition: transform 0.3s ease;
        }

        .rotate {
            transform: rotate(90deg);
        }
        
          .dropdown {
            margin-left: auto !important;
        }
        .username {
            font-weight: bold;
            font-size: 1.2rem;
            color: #007bff;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.3);
        }
    #hkNotification {
    position: fixed;
    top: 20px;
    right: 20px;
    z-index: 1050; /* Ensures it stays above other content */
    width: auto;
    max-width: 400px; /* Adjust as needed */
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header class="p-3 mb-3 border-bottom">
        @if($openTicketCount > 0)
    <div id="hkNotification" class="alert alert-danger alert-dismissible fade show">
        🚨 <strong>Attention!</strong> You have {{ $openTicketCount }} open support tickets.
        <a href="{{ route('housekeeping.support.siteticket') }}" class="alert-link">View Tickets</a>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger" role="alert" style="position: fixed; top: 10px; right: 10px; z-index: 1000;">
       🚨  {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

        <div class="container-fluid">
    <div class="d-flex justify-content-end align-items-center">
        <div class="dropdown text-end">
            <a href="#" class="d-flex align-items-center text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                <span class="rank-{{ Auth::user()->rank }}">{{ Auth::guard('housekeeping')->user()->username ?? '' }}</span>
                <img src="https://imager.habboon.pw/?figure={{ Auth::guard('housekeeping')->user()->look ?? '' }}&size=m&direction=4&head_direction=4&gesture=sml&headonly=1"
                     alt="avatar" width="50" height="50" class="rounded-circle">
            </a>
            <ul class="dropdown-menu text-small">
                <li>
                    <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('housekeeping-logout-form').submit();">
                        Sign out
                    </a>
                </li>
            </ul>
            <form id="housekeeping-logout-form" action="{{ route('housekeeping.logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
    </div>
</div>

    </header>

    <!-- Sidebar -->
    <div class="sidebar p-3">
        <a href="/housekeeping/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-decoration-none">
            <span class="fs-3">Housekeeping</span>
        </a>
        <br />

        <ul class="nav nav-pills flex-column mb-auto">
            <!-- Dashboard -->
            <li class="nav-item">
                <a href="{{ route('housekeeping.dashboard') }}" class="nav-link {{ request()->routeIs('housekeeping.dashboard') ? 'active' : '' }}">
                    <i class="bi bi-speedometer2 me-2"></i> Dashboard
                </a>
            </li>

            <!-- Hotel Menu -->
<li class="nav-item">
    <a href="#" class="nav-link d-flex justify-content-between align-items-center toggle-link">
        <span><i class="bi bi-house me-2"></i> Hotel</span>
        <i class="bi bi-caret-right toggle-caret 
            {{ request()->routeIs('housekeeping.hotel.*') || request()->routeIs('housekeeping.permissions.*') || request()->routeIs('housekeeping.users.*') ? 'rotate' : '' }}"></i>
    </a>
    <ul class="submenu {{ request()->routeIs('housekeeping.hotel.*') || request()->routeIs('housekeeping.permissions.*') || request()->routeIs('housekeeping.users.*') ? 'open' : '' }}">
        
        <li><a href="{{ route('housekeeping.hotel.badges') }}" class="nav-link {{ request()->routeIs('housekeeping.hotel.badges') ? 'active' : '' }}">Badges</a></li>
        <li><a href="{{ route('housekeeping.users.bannedusers') }}" class="nav-link {{ request()->routeIs('housekeeping.users.bannedusers') ? 'active' : '' }}">Bans</a></li>

        <!-- Chatlogs Submenu -->
        <li class="nav-item">
            <a href="#" class="nav-link d-flex justify-content-between align-items-center toggle-link chatlogs-toggle">
                <span>Chatlogs</span>
                <i class="bi bi-caret-right toggle-caret 
                    {{ request()->routeIs('housekeeping.hotel.roomchatlogs') || request()->routeIs('housekeeping.hotel.privatechatlogs') ? 'rotate' : '' }}"></i>
            </a>
            <ul class="submenu chatlogs-submenu 
                {{ request()->routeIs('housekeeping.hotel.roomchatlogs') || request()->routeIs('housekeeping.hotel.privatechatlogs') ? 'open' : '' }}">
                <li><a href="{{ route('housekeeping.hotel.roomchatlogs') }}" class="nav-link {{ request()->routeIs('housekeeping.hotel.roomchatlogs') ? 'active' : '' }}">Room Chatlogs</a></li>
                <li><a href="{{ route('housekeeping.hotel.privatechatlogs') }}" class="nav-link {{ request()->routeIs('housekeeping.hotel.privatechatlogs') ? 'active' : '' }}">Private Chatlogs</a></li>
            </ul>
        </li>

        <li><a href="{{ route('housekeeping.users.index') }}" class="nav-link {{ request()->routeIs('housekeeping.users.index') ? 'active' : '' }}">Users</a></li>
        <li><a href="{{ route('housekeeping.permissions.index') }}" class="nav-link {{ request()->routeIs('housekeeping.permissions.index') ? 'active' : '' }}">Permissions</a></li>
        <li><a href="{{ route('housekeeping.hotel.alert') }}" class="nav-link {{ request()->routeIs('housekeeping.hotel.alert') ? 'active' : '' }}">Hotel Alert</a></li>
        <li><a href="{{ route('housekeeping.hotel.wordfilter') }}" class="nav-link {{ request()->routeIs('housekeeping.hotel.wordfilter') ? 'active' : '' }}">Word Filters</a></li>
    </ul>
</li>


            <!-- Website Menu -->
<li class="nav-item">
    <a href="#" class="nav-link d-flex justify-content-between align-items-center toggle-link">
        <span><i class="bi bi-globe me-2"></i> Website</span>
        <i class="bi bi-caret-right toggle-caret 
            {{ request()->routeIs('housekeeping.website.*') || 
               request()->routeIs('housekeeping.support.*') || 
               request()->routeIs('housekeeping.articles.*') || 
               request()->routeIs('housekeeping.camera.*') ? 'rotate' : '' }}"></i>
    </a>
    <ul class="submenu {{ request()->routeIs('housekeeping.website.*') || request()->routeIs('housekeeping.support.*') || request()->routeIs('housekeeping.articles.*') || request()->routeIs('housekeeping.camera.*') ? 'open' : '' }}">
         <!-- Articles Nested Dropdown -->
        <li class="nav-item">
            <a href="#" class="nav-link d-flex justify-content-between align-items-center toggle-link">
                <span>Articles</span>
                <i class="bi bi-caret-right toggle-caret {{ request()->routeIs('housekeeping.articles.*') ? 'rotate' : '' }}"></i>
            </a>
            <ul class="submenu {{ request()->routeIs('housekeeping.articles.*') ? 'open' : '' }}">
                <li><a href="{{ route('housekeeping.articles.create') }}" class="nav-link {{ request()->routeIs('housekeeping.articles.create') ? 'active' : '' }}">Create Article</a></li>
                <li><a href="{{ route('housekeeping.articles.manage') }}" class="nav-link {{ request()->routeIs('housekeeping.articles.manage') ? 'active' : '' }}">Manage Articles</a></li>
                <li><a href="{{ route('housekeeping.articles.comments') }}" class="nav-link {{ request()->routeIs('housekeeping.articles.comments') ? 'active' : '' }}">Article Comments</a></li>
            </ul>
        </li>
        <li><a href="{{ route('housekeeping.website.banners') }}" class="nav-link {{ request()->routeIs('housekeeping.website.banners') ? 'active' : '' }}">Web Banners</a></li>
        <li><a href="{{ route('housekeeping.support.siteticket') }}" class="nav-link {{ request()->routeIs('housekeeping.support.siteticket') ? 'active' : '' }}">Tickets</a></li>
        <li><a href="{{ route('housekeeping.camera.cameraweb') }}" class="nav-link {{ request()->routeIs('housekeeping.camera.cameraweb') ? 'active' : '' }}">Camera Web</a></li>
    </ul>
</li>

            <!-- Catalogue Menu -->
            <li class="nav-item">
                <a href="#" class="nav-link d-flex justify-content-between align-items-center toggle-link">
                    <span><i class="bi bi-bag me-2"></i>Catalogue</span>
                    <i class="bi bi-caret-right toggle-caret {{ request()->routeIs('housekeeping.catalog.*') ? 'rotate' : '' }}"></i>
                </a>
                <ul class="submenu {{ request()->routeIs('housekeeping.catalog.*') ? 'open' : '' }}">
                    <li><a href="{{ route('housekeeping.catalog.pages.index')}}" class="nav-link {{ request()->routeIs('housekeeping.catalog.pages.index') ? 'active' : '' }}">Catalogue Pages</a></li>
                    <li><a href="{{ route('housekeeping.catalog.items.index')}}" class="nav-link {{ request()->routeIs('housekeeping.catalog.items.index') ? 'active' : '' }}">Catalogue Items</a></li>
                    <li><a href="{{ route('housekeeping.catalog.furniture.index')}}" class="nav-link {{ request()->routeIs('housekeeping.catalog.furniture.index') ? 'active' : '' }}">Furniture</a></li>
                </ul>
            </li>

            <!-- Catalogue Menu -->
            <li class="nav-item">
                <a href="#" class="nav-link d-flex justify-content-between align-items-center toggle-link">
                    <span><i class="bi bi-server me-2"></i>Emulator Settings</span>
                    <i class="bi bi-caret-right toggle-caret {{ request()->routeIs('housekeeping.emulator.*') ? 'rotate' : '' }}"></i>
                </a>
                <ul class="submenu {{ request()->routeIs('housekeeping.emulator.*') ? 'open' : '' }}">
                    <li><a href="{{ route('housekeeping.emulator.settings.index')}}" class="nav-link {{ request()->routeIs('housekeeping.emulator.settings.index') ? 'active' : '' }}">Emulator Settings</a></li>
                    <li><a href="{{ route('housekeeping.emulator.texts.index')}}" class="nav-link {{ request()->routeIs('housekeeping.catalog.texts.index') ? 'active' : '' }}">Emulator Texts</a></li>
                </ul>
            </li>

            <!-- Admin Menu -->
            @if (Auth::check() && Auth::user()->rank >= 6)
             <li class="nav-item">
    <a href="#" class="nav-link d-flex justify-content-between align-items-center toggle-link">
        <span><i class="bi bi-person-badge me-2"></i>Admin</span>
        <i class="bi bi-caret-right toggle-caret {{ request()->routeIs('housekeeping.admin.*') ? 'rotate' : '' }}"></i>
    </a>
    <ul class="submenu {{ request()->routeIs('housekeeping.admin.*') ? 'open' : '' }}">
        <li><a href="{{ route('housekeeping.admin.activitylogs') }}" class="nav-link {{ request()->routeIs('housekeeping.admin.activitylogs') ? 'active' : '' }}">Activity Logs</a></li>
        <li><a href="{{ route('housekeeping.admin.staffapps') }}" class="nav-link {{ request()->routeIs('housekeeping.admin.staffapps') ? 'active' : '' }}">Staff Applications</a></li>
        <li><a href="{{ route('housekeeping.admin.passwordrestore') }}" class="nav-link {{ request()->routeIs('housekeeping.admin.passwordrestore') ? 'active' : '' }}">Password Restore Tool</a></li>
        <li><a href="{{ route('housekeeping.admin.voucher') }}" class="nav-link {{ request()->routeIs('housekeeping.admin.voucher') ? 'active' : '' }}">Voucher</a></li>

        <!-- Whitelisting / Blacklisting (Now under Admin) -->
        <li class="nav-item">
            <a href="#" class="nav-link d-flex justify-content-between align-items-center toggle-link">
                <span>Whitelisting / Blacklisting</span>
                <i class="bi bi-caret-right toggle-caret {{ request()->routeIs('housekeeping.admin.whitelist') || request()->routeIs('housekeeping.admin.blacklist') ? 'rotate' : '' }}"></i>
            </a>
            <ul class="submenu {{ request()->routeIs('housekeeping.admin.whitelist') || request()->routeIs('housekeeping.admin.blacklist') ? 'open' : '' }}">
                <li><a href="{{ route('housekeeping.admin.whitelist') }}" class="nav-link {{ request()->routeIs('housekeeping.admin.whitelist') ? 'active' : '' }}">Whitelisting</a></li>
                <li><a href="{{ route('housekeeping.admin.blacklist') }}" class="nav-link {{ request()->routeIs('housekeeping.admin.blacklist') ? 'active' : '' }}">Blacklisting</a></li>
            </ul>
        </li>

        <!-- Website Settings (Now under Admin) -->
<li class="nav-item">
    <a href="#" class="nav-link d-flex justify-content-between align-items-center toggle-link">
        <span>Website Settings</span>
        <i class="bi bi-caret-right toggle-caret {{ request()->routeIs('housekeeping.admin.maintenance') || request()->routeIs('housekeeping.admin.theme') || request()->routeIs('housekeeping.admin.webtabs') || request()->routeIs('housekeeping.admin.syncbadges') ? 'rotate' : '' }}"></i>
    </a>
    <ul class="submenu {{ request()->routeIs('housekeeping.admin.maintenance') || request()->routeIs('housekeeping.admin.theme') || request()->routeIs('housekeeping.admin.webtabs') || request()->routeIs('housekeeping.admin.syncbadges')  ? 'open' : '' }}">
        <li><a href="{{ route('housekeeping.admin.maintenance') }}" class="nav-link {{ request()->routeIs('housekeeping.admin.maintenance') ? 'active' : '' }}">Maintenance Mode</a></li>
        <li><a href="{{ route('housekeeping.admin.syncbadges') }}" class="nav-link {{ request()->routeIs('housekeeping.admin.syncbadges') ? 'active' : '' }}">Sync Badges</a></li>
        <li><a href="{{ route('housekeeping.admin.theme') }}" class="nav-link {{ request()->routeIs('housekeeping.admin.theme') ? 'active' : '' }}">Theme System</a></li>
        <li><a href="{{ route('housekeeping.admin.webtabs') }}" class="nav-link {{ request()->routeIs('housekeeping.admin.webtabs') ? 'active' : '' }}">Website Tabs</a></li>
    </ul>
</li>

    </ul>
</li>

            @endif
        </ul>
    </div>

    <!-- Content -->
    <div class="content">
        @yield('content')
    </div>

    <!-- JavaScript -->
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        // ✅ Submenu Toggle System
        const toggles = document.querySelectorAll('.toggle-link');

        toggles.forEach(toggle => {
            toggle.addEventListener('click', function (e) {
                e.preventDefault();
                const submenu = this.nextElementSibling;
                const caret = this.querySelector('.toggle-caret');

                submenu.classList.toggle('open');
                caret.classList.toggle('rotate');
            });
        });

        setTimeout(function () {
            let alert = document.getElementById("hkNotification");
            if (alert) {
                alert.classList.remove("show");
                alert.classList.add("fade");
                setTimeout(() => alert.remove(), 500); // Ensures complete removal after fading
            }
        }, 10000); // 10 seconds
    });
    
    setTimeout(function() {
        document.querySelector('.alert-danger')?.remove();
    }, 5000);
</script>


    <!-- Bootstrap JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    @yield('scripts')
</body>
</html>
