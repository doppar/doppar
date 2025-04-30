<?php

/*
|--------------------------------------------------------------------------
| Loading application api routes
|--------------------------------------------------------------------------
*/

use Phaseolies\Support\Facades\Route;
use Phaseolies\Http\Request;

// Endpoint: http://example.com/api/v1/user
Route::group(['prefix' => 'v1', 'middleware' => ['auth-api']], function () {
    Route::get('user', function (Request $request) {
        return $request->user();
    })->middleware(['throttle:100,1']);
});
