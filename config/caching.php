<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Default Cache Store
    |--------------------------------------------------------------------------
    |
    | This option controls the default cache connection that gets used while
    | using this caching library. This connection is used when another is
    | not explicitly specified when executing a given caching function.
    |
    */

    'default' => env('CACHE_DRIVER', 'file'),

    /*
    |--------------------------------------------------------------------------
    | Cache Stores
    |--------------------------------------------------------------------------
    |
    | Here you may define all of the cache "stores" for your application as
    | well as their drivers. You may even define multiple stores for the
    | same cache driver to group types of items stored in your caches.
    |
    | Supported drivers: "apc", "array", "file", "redis"
    |
    */

    'stores' => [
        'apc' => [
            'driver' => 'apc',
        ],

        'array' => [
            'driver' => 'array',
            'serialize' => false,
        ],

        'file' => [
            'driver' => 'file',
            'path' => storage_path('framework/cache/data'),
            'lock_path' => storage_path('framework/cache/data'),
        ],

        'redis' => [
            'driver' => 'redis',
            'connection' => env('REDIS_URL', 'redis://127.0.0.1:6379'),
            'options' => [
                'parameters' => [
                    'password' => env('REDIS_PASSWORD', null),
                    'database' => env('REDIS_DB', 1),
                ],
            ],
            'ttl' => 3600,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Cache Key Prefix
    |--------------------------------------------------------------------------
    |
    */

    'prefix' => env('CACHE_PREFIX', strtolower(env('APP_NAME', 'doppar')) . '_cache_'),
];
