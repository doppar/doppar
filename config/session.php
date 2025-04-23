<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Session Driver
    |--------------------------------------------------------------------------
    |
    | Determines how session data is stored. The available options are:
    | - "file"   → Stores sessions in local files.
    | - "cookie" → Stores session data in encrypted cookies.
    |
    */

    'driver' => env('SESSION_DRIVER', 'file'),

    /*
    |--------------------------------------------------------------------------
    | Session Lifetime
    |--------------------------------------------------------------------------
    |
    | Defines how long (in minutes) a session remains active before expiring.
    | If 'expire_on_close' is true, the session ends when the user closes the browser.
    |
    */

    'lifetime' => env('SESSION_LIFETIME', 120),
    'expire_on_close' => env('SESSION_EXPIRE_ON_CLOSE', false),

    /*
    |--------------------------------------------------------------------------
    | Session File Storage
    |--------------------------------------------------------------------------
    |
    | When using the "file" driver, session files are stored in this location.
    | Change this path if you want to store sessions elsewhere.
    |
    */

    'files' => base_path('storage/framework/sessions'),

    /*
    |--------------------------------------------------------------------------
    | Session Cookie Name
    |--------------------------------------------------------------------------
    |
    | The name of the session cookie that stores session data.
    | The default is dynamically generated using the function below.
    |
    */

    'cookie' => env('SESSION_COOKIE', strtolower(env('APP_NAME')) . '_session'),

    /*
    |--------------------------------------------------------------------------
    | Session Cookie Path
    |--------------------------------------------------------------------------
    |
    | Defines the URL path where the session cookie is valid. By default, 
    | it's available across the entire application ('/').
    |
    */

    'path' => env('SESSION_PATH', '/'),

    /*
    |--------------------------------------------------------------------------
    | Session Cookie Domain
    |--------------------------------------------------------------------------
    |
    | Specifies which domain (and subdomains) the session cookie is valid for.
    | If set to null, it defaults to the current domain.
    |
    */

    'domain' => env('SESSION_DOMAIN', null),

    /*
    |--------------------------------------------------------------------------
    | Secure Cookies (HTTPS Only)
    |--------------------------------------------------------------------------
    |
    | If true, the session cookie is only transmitted over HTTPS connections,
    | preventing it from being sent over insecure HTTP.
    |
    */

    'secure' => env('SESSION_SECURE_COOKIE', null),

    /*
    |--------------------------------------------------------------------------
    | HTTP-Only Cookies
    |--------------------------------------------------------------------------
    |
    | If enabled, the session cookie is inaccessible to JavaScript (client-side).
    | This enhances security by preventing cross-site scripting (XSS) attacks.
    |
    */

    'http_only' => env('SESSION_HTTP_ONLY', true),

    /*
    |--------------------------------------------------------------------------
    | Same-Site Cookie Policy
    |--------------------------------------------------------------------------
    |
    | Controls how cookies are shared across sites to mitigate CSRF attacks.
    | - "lax"    → Allows cookies on same-site requests and top-level navigations.
    | - "strict" → Cookies sent only on same-site requests (more secure).
    | - "none"   → Allows cross-site cookies (requires 'secure' set to true).
    |
    */

    'same_site' => env('SESSION_SAME_SITE', 'lax'),
];
