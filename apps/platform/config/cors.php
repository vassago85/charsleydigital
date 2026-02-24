<?php

return [

    'paths' => ['api/*'],

    'allowed_methods' => ['POST', 'GET', 'OPTIONS', 'PUT', 'PATCH', 'DELETE'],

    'allowed_origins' => array_values(array_unique(array_filter(array_merge(
        env('SITE_ORIGIN') ? explode(',', env('SITE_ORIGIN')) : [],
        [rtrim(env('APP_URL', 'http://localhost'), '/')],
        ['http://127.0.0.1:8000', 'http://localhost:8000', 'http://localhost:4321']
    )))) ?: ['*'],

    'allowed_origins_patterns' => [],

    'allowed_headers' => ['*'],

    'exposed_headers' => [],

    'max_age' => 0,

    'supports_credentials' => false,

];
