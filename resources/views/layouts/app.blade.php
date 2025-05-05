<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ mix('assets/web/app.css') }}">
    <link rel="shortcut icon" href="{{ asset('/img/favicon-d.png') }}" type="image/vnd.microsoft.icon"/>
    <link href="https://fonts.googleapis.com/css?family=Ubuntu&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" rel="stylesheet">
    <style>
    body {
        display: flex;
        flex-direction: column;
        min-height: 100vh;
        margin: 0;
    }
    .content {
        flex: 1;
    }
    footer {
        background-color: #343a40;
        color: #868e96;
        margin-top: auto;
    }
    #footer {
        padding: 20px 0;
    }
    #legal-footer {
        background-color: #343a40;
        color: #868e96;
        text-align: center;
        padding: 10px 0;
    }
</style>
<!-- Cloudflare Web Analytics --><script defer src='https://static.cloudflareinsights.com/beacon.min.js' data-cf-beacon='{"token": "5e8e0c0f262441019bf0fefe98d58505"}'></script><!-- End Cloudflare Web Analytics -->
<script src="https://challenges.cloudflare.com/turnstile/v0/api.js" async defer></script>
</head>
<body class="@yield('body-class')">
    @include('layouts.header')

    <main class="position-relative container justify-content-center py-4">

    @php
    use App\Http\Controllers\Community\BannerController;
    $banners = (new BannerController)->getActiveBanners();
    @endphp

   @if($banners->isNotEmpty())
    <div class="row justify-content-center">
        @foreach ($banners as $banner)
            <div class="{{ request()->routeIs('dashboard', 'articles', 'articles.show', 'community', 'gotw', 'staff', 'players', 'leaderboards', 'store', 'help', 'theway', 'gallery', 'marketplace', 'tickets.index', 'tickets.show', 'tickets.create', 'account.account', 'account.account.update', 'account.email', 'account.email.update', 'account.password', 'account.password.update', 'help.gotwrules') ? 'col-12 mb-4' : 'col-11 mb-4' }}">
                <div class="w-full d-flex align-items-center justify-content-center flex-column rounded-lg py-4"
                    style="background: url('{{ asset('/' . $banner->image_path) }}') no-repeat center center / cover; box-shadow: inset 0 0 0 1000px rgba(0, 0, 0, .6);">
                    <h4 class="text-white">{{ $banner->title }}</h4>
                    <div class="text-white mb-0">
                        {!! $banner->desc !!}
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    @endif

    @yield('content')
    </main>

    @include('layouts.footer')

    <script src="{{ mix('assets/web/manifest.js') }}"></script>
    <script src="{{ mix('assets/web/vendor.js') }}"></script>
    <script src="{{ mix('assets/web/app.js') }}"></script>

    @yield('script')


</body>
</html>
