<?php

$liveServerOrigins = array_filter(array_map(
    'trim',
    explode(',', (string) env('LIVE_SERVER_ORIGINS', 'http://127.0.0.1:5500,http://localhost:5500'))
));

return [
    'paths' => ['bookings', 'csrf-token'],
    'allowed_methods' => ['GET', 'POST', 'OPTIONS'],
    'allowed_origins' => $liveServerOrigins,
    'allowed_origins_patterns' => [],
    'allowed_headers' => ['Accept', 'Content-Type', 'X-CSRF-TOKEN', 'X-Requested-With'],
    'exposed_headers' => [],
    'max_age' => 0,
    'supports_credentials' => true,
];
