<?php

namespace App\Http;

use Phaseolies\Middleware\Middleware;

class Kernel extends Middleware
{
    /**
     * The application's global HTTP middleware stack.
     *
     * These middleware are run during every request to your application.
     *
     * @var array
     */
    public array $middleware = [
        // \App\Http\Middleware\TrustProxies::class,
    ];

    /**
     * The application's route middleware groups.
     *
     * @var array<string, array<int, class-string|string>>
     */
    public $middlewareGroups = [
        'web' => [
            \Phaseolies\Middleware\CsrfTokenMiddleware::class,
        ],
        'api' => [],
    ];

    /**
     * The application's route specific middleware.
     *
     * These middleware may be assigned to groups or used individually.
     *
     * @var array
     */
    public array $routeMiddleware = [
        'web' => [
            'auth' => \App\Http\Middleware\Authenticate::class,
            'guest' => \App\Http\Middleware\GuestMiddleware::class,
            // 'throttle' => \Phaseolies\Middleware\ThrottleRequests::class,
            // 'http.cache.headers' => \Phaseolies\Middleware\CacheHeaders::class
        ],
        'api' => [
            // 'throttle' => \Phaseolies\Middleware\ThrottleRequests::class,
        ]
    ];
}
