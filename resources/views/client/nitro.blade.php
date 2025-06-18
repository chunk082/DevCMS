<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1" />
    <title>{{ config('app.name') }} - Client</title>
    
    <link rel="stylesheet" href="{{ config('app.app_assets') }}/nitro/static/assets/index-eb44ed43.css">
    <link rel="shortcut icon" href="https://devcms.online/img/favicon-d.png" type="image/vnd.microsoft.icon"/>

</head>

<body>
<noscript>You need to enable JavaScript to run this app.</noscript>

<div id="root" class="w-100 h-100"></div>

<script>
    const NitroConfig = {
        'config.urls': [
            '{{ config('app.app_assets') }}/nitro/renderer-config.json',
            '{{ config('app.app_assets') }}/nitro/ui-config.json'

        ],
        'socket.url': 'wss://ws-game.devcms.online:2096',
        'asset.url': '{{ config('app.app_assets') }}/nitro',
        'image.library.url': '{{ config('app.app_assets') }}/swf/c_images/',
        'hof.furni.url': '{{ config('app.app_assets') }}/dcr/hof_furni/',
        'camera.url': '//static.devcms.online/camera/',
        'thumbnails.url': '//static.devcms.online/navigator-thumbnail/%thumbnail%.png',
        'url.prefix': 'https://devcms.online/',
        'sso.ticket': '{{ Auth::user()->auth_ticket }}', // Dynamically set SSO ticket
        'system.currency.types': [
            -1,0,5,103
        ],
        'forward.type': (new URLSearchParams(window.location.search).get('room') ? 2 : -1),
        'forward.id': (new URLSearchParams(window.location.search).get('room') || 0),
        'friend.id': (new URLSearchParams(window.location.search).get('friend') || 0),
    };
</script>

<!-- Nitro Script Modules -->
<script type="module" crossorigin src="{{ config('app.app_assets') }}/nitro/static/assets/index-9d80f1fd.js"></script>
<link rel="modulepreload" crossorigin href="{{ config('app.app_assets') }}/nitro/static/assets/vendor-ca9afaeb.js">

<script>
    window.FlashExternalInterface = {};
    window.FlashExternalInterface.disconnect = function() {
        window.location.href = "{{ route('nitro-client') }}";
    };
</script>

<div id="client-alerts"></div>

</body>
</html>
