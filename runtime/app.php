<?php

use Phaseolies\Application;
use Phaseolies\Http\Request;
use Phaseolies\Http\Response;

/*
|--------------------------------------------------------------------------
| Create, configure, and build the application instance.
|--------------------------------------------------------------------------
|
| - Defines paths that should bypass CSRF verification.
| - Registers a callback to run during application termination.
| - Configures the application and its middleware pipeline.
| - Builds the final application instance.
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
