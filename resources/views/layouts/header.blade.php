@if($maintenanceMode)
    <div style="background: #d9534f; color: white; padding: 10px; text-align: center;">
        The website is currently in <strong>read-only</strong> maintenance mode.
    </div>
@endif
<header class="position-relative blue">
    <div class="container">
        <div class="row justify-content-center justify-content-md-between justify-content-lg-between align-items-center">
            <div class="col-lg-3 col-md-6 d-lg-block d-md-block d-flex justify-content-center">
                <a href="/">
    <img src="{{ asset(
    $currentTheme === 'Halloween' ? '/seasonal/halloween/dev.gif' :
    ($currentTheme === 'Christmas' ? '/seasonal/christmas/dev.gif' :
    ($currentTheme === 'Boon' ? '/seasonal/boon/boon.gif' :
    '/img/dev.gif'))
) }}" alt="Dev Logo" loading="lazy">

                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-12 mt-2 mt-md-0">
                <div class="row">
                    <div class="col-12 d-flex justify-content-center justify-content-md-end">
                        <div class="online" style="max-width: 220px;">
                            <i class="fas fa-users"></i>
                            <span class="count">{{ $online_user_count }}</span>
                            {{ config('app.name') }} Online
                        </div>
                    </div>
                    @guest
                    <div class="col-12 d-flex justify-content-center justify-content-md-end mt-1">
                        <div class="w-100" style="max-width: 220px;">
                            <a href="/register" class="enter w-100" id="ga-header-registration-button" aria-label="Register">
                                <div>
                                    <i class="fas fa-plus"></i>
                                    Register now!
                                </div>
                            </a>
                        </div>
                    </div>
                    @endguest
                </div>
            </div>
        </div>
    </div>
</header>

<nav class="navbar navbar-expand-md navbar-dark habboon-nav">
    <div class="container">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto ml-2 ml-lg-0">
                <li class="nav-item">
                    <a href="{{ auth()->check() ? route('dashboard') : route('home') }}" class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                        Homepage
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle {{ request()->is('community*') ? 'active' : '' }}" href="#" id="communityDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Community
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a href="{{ route('community') }}" class="dropdown-item {{ request()->routeIs('community') ? 'active' : '' }}">Community</a>
                        <a href="{{ route('gallery') }}" class="dropdown-item {{ request()->routeIs('gallery') ? 'active' : '' }}">Gallery</a>
                        <a href="{{ route('gotw') }}" class="dropdown-item {{ request()->routeIs('gotw') ? 'active' : '' }}">GOTW Leaderboards</a>
                        <a href="{{ route('leaderboards') }}" class="dropdown-item {{ request()->routeIs('leaderboards') ? 'active' : '' }}">Leaderboards</a>
                        <a href="{{ route('players') }}" class="dropdown-item {{ request()->routeIs('online-players') ? 'active' : '' }}">Online Players</a>
                        @if($currentTheme === 'Christmas')
                        <a href="{{ route('snowflake') }}" class="dropdown-item {{ request()->routeIs('snowflake') ? 'active' : '' }}">Snowflake Leaderboard</a>
                        @endif
                        <a href="{{ route('staff') }}" class="dropdown-item {{ request()->routeIs('staff') ? 'active' : '' }}">Staff</a>
                    </div>
                </li>
                <li class="nav-item d-md-none d-lg-block">
                    <a href="{{ route('marketplace') }}" class="nav-link {{ request()->routeIs('marketplace') ? 'active' : '' }}">Marketplace</a>
                </li>
                <li class="nav-item d-md-none d-lg-block">
                    <a href="{{ route('store') }}" class="nav-link {{ request()->routeIs('store') ? 'active' : '' }}">Store</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('help') }}" class="nav-link {{ request()->routeIs('help') ? 'active' : '' }}">Help</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('theway') }}" class="nav-link {{ request()->routeIs('theway') ? 'active' : '' }}">The {{ config('app.name') }} Way</a>
                </li>
               @php
                $websiteSetting = \App\Models\WebsiteSetting::first();
                @endphp

                @if (auth()->check() && \App\Models\WebsiteSetting::isStaffApplicationTabVisible())
                    <li class="nav-item">
                        <a href="{{ route('staff.application') }}" class="nav-link {{ request()->routeIs('staff.application') ? 'active' : '' }}">Staff Application</a>
                    </li>
                @endif
            </ul>
            @if (!View::hasSection('body-class') || trim(View::yieldContent('body-class')) !== 'registration-page')
                <ul class="navbar-nav ml-lg-auto navbar-user-dropdown ml-2 ml-lg-0" style="margin-right: -90px;">
                    @auth
                        @if (!Auth::user()->isBanned())
                            <li class="nav-item d-none d-md-block d-flex align-items-center">
                                @if (Auth::user()->rank >= 5)
                                    <a href="/housekeeping" target="_blank" class="btn btn-danger" style="margin-right: 10px;">Housekeeping</a>
                                @endif
                                <a href="/client" target="_blank" class="btn btn-success">Enter Hotel</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="accountDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <img src="https://imager.habboon.pw/?figure={{ Auth::user()->look ?? '' }}&size=m&direction=4&head_direction=4&gesture=sml&headonly=1" alt="{{ Auth::user()->username ?? 'User' }}" class="avatar d-none d-md-inline-block d-lg-inline-block" loading="lazy">
                                    <span class="d-md-none">{{ Auth::user()->username ?? 'User' }}</span>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a href="/account" class="dropdown-item">Account Settings</a>
                                    <div class="dropdown-divider"></div>
                                    <form method="POST" action="{{ route('logout') }}" class="dropdown-item">
                                        @csrf
                                        <button type="submit" class="dropdown-item">
                                            {{ __('Logout') }}
                                        </button>
                                    </form>
                                </div>
                            </li>
                        @else
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="accountDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <img src="https://imager.habboon.pw/?figure={{ Auth::user()->look ?? '' }}&size=m&direction=4&head_direction=4&gesture=sml&headonly=1" alt="{{ Auth::user()->username ?? 'User' }}" class="avatar d-none d-md-inline-block d-lg-inline-block" loading="lazy">
                                    <span class="d-md-none">{{ Auth::user()->username ?? 'User' }}</span>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <form method="POST" action="{{ route('logout') }}" class="dropdown-item">
                                        @csrf
                                        <button type="submit" class="dropdown-item">
                                            {{ __('Logout') }}
                                        </button>
                                    </form>
                                </div>
                            </li>
                        @endif
                    @endauth
                    @guest
                        <li class="nav-item d-none d-md-block">
                            <a href="{{ route('register') }}" class="btn btn-primary">Register</a>
                        </li>
                    @endguest
                </ul>
            @else
                <div class="navbar-enter-button position-absolute">
                    <div class="nav-item d-block d-md-none">
                        <a href="{{ route('home') }}" class="btn btn-primary">Login</a>
                    </div>
                </div>
            @endif
        </div>
    </div>
</nav>
