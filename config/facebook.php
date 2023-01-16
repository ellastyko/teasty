<?php

return [
    'app_id'        => env('FACEBOOK_APP_ID'),
    'app_secret'    => env('FACEBOOK_APP_SECRET'),
    'redirect_uri'  => config('app.url') . '/oauth/callback',
    'graph_version' => env('FACEBOOK_GRAPH_VERSION', 'v11.0'),
    'beta_mode'     => env('FACEBOOK_ENABLE_BETA', false),
];
