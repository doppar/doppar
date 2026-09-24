<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Authentication Actor
    |--------------------------------------------------------------------------
    |
    | This value defines the default actor resolved when calling Auth:: or
    | auth() without an explicit actor name. It must match one of the keys
    | defined in the "actors" array below.
    |
    */

    'default' => 'web',

    /*
    |--------------------------------------------------------------------------
    | Authentication Actors
    |--------------------------------------------------------------------------
    |
    | Each actor requires two values:
    |
    |   model       — Entity model used to look up and authenticate users.
    |                 Must implement Phaseolies\Auth\Contracts\Authenticatable
    |                 (e.g. User, Admin). Auth::login() accepts that contract,
    |                 not a single concrete class.
    |   session_key — Session key for the authenticated user's ID.
    |                 Must be unique across all defined actors.
    |
    | Example adding an admin actor:
    |
    |   'admin' => [
    |       'model'       => App\Models\Admin::class, // implements Authenticatable
    |       'session_key' => 'admin_user',
    |   ],
    |
    */

    'actors' => [

        'web' => [
            'model'       => App\Models\User::class,
            'session_key' => 'user',
        ],

    ],

];
