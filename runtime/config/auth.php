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
    |   model       — The Entity model used to look up and authenticate users.
    |   session_key — The session key under which the authenticated user's ID
    |                 is stored. Must be unique across all defined actors.
    |
    | Example adding an admin actor:
    |
    |   'admin' => [
    |       'model'       => App\Models\Admin::class,
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
