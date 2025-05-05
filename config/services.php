<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'nowpayments' => [
    'api_key' => env('NOWPAYMENTS_API_KEY'),
    ],

    'discord' => [
    'client_id'     => env('DISCORD_CLIENT_ID'),
    'client_secret' => env('DISCORD_CLIENT_SECRET'),
    'redirect'      => env('DISCORD_REDIRECT_URI'),
    'bot_token'     => env('BOT_TOKEN'),
    'channel_id'    => env('DISCORD_CHANNEL_ID'),
    'webhook_url'   => env('DISCORD_BOT_WEBHOOK_URL', 'http://localhost:3000/api/discord/verify'),
    'shared_secret' => env('BOT_SHARED_SECRET'),
],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'resend' => [
        'key' => env('RESEND_KEY'),
    ],

    'turnstile' => [
    'key' => env('TURNSTILE_KEY'),
    'secret' => env('TURNSTILE_SECRET'),
    ],

    'slack' => [
        'notifications' => [
            'bot_user_oauth_token' => env('SLACK_BOT_USER_OAUTH_TOKEN'),
            'channel' => env('SLACK_BOT_USER_DEFAULT_CHANNEL'),
        ],
    ],

];
