<?php

use Phaseolies\Application;
use Phaseolies\Http\Request;
use Phaseolies\Http\Response;

/*
|--------------------------------------------------------------------------
| Create, configure, and build the application instance.
|--------------------------------------------------------------------------
|
| Create and configure the application instance, then return it. The
| Application takes the base path directly in its constructor — it's
| the single source of truth for it from that point on, no global
| constant required — and initializes the framework environment, core
| launchers, and application gateway.
|
| The configuration chain then:
|
| - Defines paths that should bypass CSRF verification.
| - Registers a callback to run during application termination.
| - Configures the application and its middleware pipeline.
| - Builds the final application instance.
|
| Global and middleware-group middleware are processed during application
| configuration, while route-specific middleware is resolved later
| when a route is dispatched.
*/

return ($app = new Application(dirname(__DIR__)))
    ->setRelaxablePaths(relaxablePaths: [
        // The paths listed below will bypass CSRF token verification.
        // '/webhook/payment' – bypasses only the '/webhook/payment' URI.
        // '/webhook/*' – bypasses all URIs that start with '/webhook'.
    ])
    ->terminating(function (Request $request, ?Response $response, ?\Throwable $exception = null) {
        // Runs after the response is sent, during application termination.
    })
    ->configure(app: $app)
    ->build();
