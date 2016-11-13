<?php

return [
    'client_id' => env('TWITCH_KEY', ''),
    'client_secret' => env('TWITCH_SECRET', ''),
    'redirect_url' => env('TWITCH_REDIRECT_URI', ''),
    'scopes' => [
        'user_read',
        'user_blocks_edit',
        'user_blocks_read',
        'user_follows_edit',
        'channel_read',
        'channel_editor',
        'channel_commercial',
        'channel_stream',
        'channel_subscriptions',
        'user_subscriptions',
        'channel_check_subscription',
        'chat_login',
    ],
];
