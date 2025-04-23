<?php

/*
|--------------------------------------------------------------------------
| Loading application api routes
|--------------------------------------------------------------------------
*/

use Phaseolies\Support\Facades\Route;
use Phaseolies\Http\Request;
use Phaseolies\Support\Facades\Auth;

Route::get('user', function (Request $request) {
    $credentials = [
        'email' => 'rixe@mailinator.com',
        'password' => 'password'
    ];

    if (Auth::try($credentials)) {
        $user = auth()->user();
        $user['access_token'] = $user->createToken('myToken', now()->addMinutes(3))->plainTextToken;
    } else {
        return response()->json(['Error' => 'Login failed']);
    }

    return response()->json(['user' => $user]);
});

Route::get('user/{id}/user', function (Request $request) {
    $user = $request->user();
    // $user->tokens()->where('token', '=', '5gMpMivedlicssML6LYKNGb4tWSQt5fh8SF3ELc5b2a341cf')->delete();
    // php pool vendor:publish --provider="Phaseolies\Flarion\FlarionServiceProvider"
    return $user->tokens;
})->middleware('auth-api');
