<?php

namespace App\Http;

use Phaseolies\Middleware\Middleware;
use Phaseolies\Http\Contracts\GatewayInterface;

class Gateway extends Middleware implements GatewayInterface
{
    /**
     * Middleware runs on every request, ahead of any group or route-specific middleware.
     *
     * @var array
     */
    public array $middleware = [
        // \App\Http\Middleware\TrustProxies::class,
    ];

    /**
     * Middleware bundles applies based on request type "web" vs "api"
     *
     * @var array<string, array<int, class-string|string>>
     */
    public array $middlewareGroups = [
        'web' => [
            \Phaseolies\Middleware\CsrfTokenMiddleware::class,
        ],
        'api' => [],
    ];

    /**
     * Named middleware aliases a route can request individually
     *
     * @var array
     */
    public array $routeMiddleware = [
        'web' => [
            'auth' => \App\Http\Middleware\Authenticate::class,
            'guest' => \App\Http\Middleware\GuestMiddleware::class,
            'verify.2fa' => \App\Http\Middleware\VerifyTwoFactorUser::class,
            // 'throttle' => \Phaseolies\Middleware\ThrottleRequests::class,
            // 'http.cache.headers' => \Phaseolies\Middleware\CacheHeaders::class
        ],
        'api' => [
            // 'throttle' => \Phaseolies\Middleware\ThrottleRequests::class,
        ]
    ];

    /**
     * Get the application's global HTTP middleware stack.
     *
     * @return array
     */
    public function getGlobalMiddleware(): array
    {
        return $this->middleware;
    }

    /**
     * Get the application's route middleware groups.
     *
     * @return array<string, array<int, class-string|string>>
     */
    public function getMiddlewareGroups(): array
    {
        return $this->middlewareGroups;
    }

    /**
     * Get the application's named route middleware aliases.
     *
     * @return array<string, array<string, class-string|string>>
     */
    public function getRouteMiddleware(): array
    {
        return $this->routeMiddleware;
    }
}
