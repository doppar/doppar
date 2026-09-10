<?php

use Phaseolies\Application;
use Phaseolies\Http\Request;
use Phaseolies\Http\Response;

$basePath = empty(env('APP_BASE_PATH')) ? dirname(__DIR__) : env('APP_BASE_PATH');

define('BASE_PATH', $basePath);

/*
|--------------------------------------------------------------------------
| Create, configure, and build the application instance.
|--------------------------------------------------------------------------
|
| Create and configure the application instance, then return it. The Application
| initializes the framework environment, core launchers, and application gateway.
|
| The configuration chain then:
|
| - Sets the application's base path.
| - Defines paths that should bypass CSRF verification.
| - Registers a callback to run during application termination.
| - Configures the application and its middleware pipeline.
| - Builds the final application instance.
|
| Global and middleware-group middleware are processed during application
| configuration, while route-specific middleware is resolved later
| when a route is dispatched.
*/
return ($app = new Application())
    ->withBasePath(basePath: $basePath)
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