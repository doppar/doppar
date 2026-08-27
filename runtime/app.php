<?php

use Phaseolies\Application;
use Phaseolies\Http\Request;
use Phaseolies\Http\Response;

$basePath = empty(env('APP_BASE_PATH')) ? dirname(__DIR__) : env('APP_BASE_PATH');

define('BASE_PATH', $basePath);

/*
|--------------------------------------------------------------------------
| Create The Application
|--------------------------------------------------------------------------
|
| Here we create the application instance.
|
*/
$app = new Application();

/*
|--------------------------------------------------------------------------
| Return The Application
|--------------------------------------------------------------------------
|
| Finally, we return the application instance. This will be used to handle
| incoming requests and send responses back to the client.
|
*/
return $app->withBasePath(basePath: $basePath)
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