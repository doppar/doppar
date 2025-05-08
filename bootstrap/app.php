<?php

use Phaseolies\Application;

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
return $app
    ->withBasePath($basePath)
    ->configure($app)
    ->build();
