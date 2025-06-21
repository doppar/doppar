<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Application Name
    |--------------------------------------------------------------------------
    |
    | This value sets the name of your application, which is used in system
    | notifications, UI elements, and logs where an application name is needed.
    |
    */

    "name" => env("APP_NAME", "Doppar"),

    /*
    |--------------------------------------------------------------------------
    | Application Environment
    |--------------------------------------------------------------------------
    |
    | Defines the current environment of the application (e.g., "local",
    | "production", "staging"). This setting affects configurations such as
    | logging and error handling. It should be set in the ".env" file.
    |
    */

    "env" => env("APP_ENV", "local"),

    /*
    |--------------------------------------------------------------------------
    | Application Debug Mode
    |--------------------------------------------------------------------------
    |
    | When enabled, the application displays detailed error messages with stack
    | traces. In production, this should be disabled to prevent exposing
    | sensitive information to users.
    |
    */

    "debug" => (bool) env("APP_DEBUG", false),

    /*
    |--------------------------------------------------------------------------
    | Application URL
    |--------------------------------------------------------------------------
    |
    | The base URL of your application. This is used for generating proper URLs
    | in console commands, links, and redirections. Ensure this matches your
    | deployed application's domain.
    |
    */

    "url" => env("APP_URL", "http://localhost"),

    /*
    |--------------------------------------------------------------------------
    | Application Timezone
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default timezone for your application, which
    | will be used by the PHP date and date-time functions. The timezone
    | is set to "UTC" by default as it is suitable for most use cases.
    |
    */

    "timezone" => env("APP_TIMEZONE", "UTC"),

    /*
    |--------------------------------------------------------------------------
    | Application Locale Configuration
    |--------------------------------------------------------------------------
    |
    | Specifies the default language/locale for the application, used by
    | translation and localization services. Set this to match the primary
    | language of your application.
    |
    */

    "locale" => env("APP_LOCALE", "en"),
    "fallback_locale" => env("APP_FALLBACK_LOCALE", "en"),

    /*
    |--------------------------------------------------------------------------
    | Encryption Key
    |--------------------------------------------------------------------------
    |
    | This key is used for encrypting sensitive data within the application.
    | It should be a randomly generated 32-character string. Do not expose
    | this key publicly. Ensure it is set in the ".env" file.
    |
    */

    "cipher" => "AES-256-CBC",

    "key" => env("APP_KEY"),

    /*
    |--------------------------------------------------------------------------
    | Application Service Providers
    |--------------------------------------------------------------------------
    |
    | Here we register all of the application's service providers. These providers
    | bootstrap core application services and register important bindings. Providers
    | are loaded in the order they are listed below.
    |
    | Additional providers may be added for specific user implemented features and for packages.
    |
    */
    "providers" => [
        App\Providers\AppServiceProvider::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Class Aliases
    |--------------------------------------------------------------------------
    |
    | This array of class aliases allows you to use Doppar's facade classes
    | with simple, memorable names instead of full namespace paths. Aliases
    | provide convenient static interfaces to key application services.
    |
    | Why Doppar uses aliases:
    | - Provides clean, expressive syntax throughout your application
    | - Maintains consistency with common PHP framework conventions
    | - Offers easy access to frequently used services
    | - Abstracts complex instantiation logic behind simple static calls
    |
    */
    "aliases" => [
        "App" => \Phaseolies\Support\Facades\App::class,
        "Auth" => \Phaseolies\Support\Facades\Auth::class,
        "Abort" => \Phaseolies\Support\Facades\Abort::class,
        "Config" => \Phaseolies\Support\Facades\Config::class,
        "Crypt" => \Phaseolies\Support\Facades\Crypt::class,
        "Mail" => \Phaseolies\Support\Facades\Mail::class,
        "Redirect" => \Phaseolies\Support\Facades\Redirect::class,
        "Response" => \Phaseolies\Support\Facades\Response::class,
        "Route" => \Phaseolies\Support\Facades\Route::class,
        "Session" => \Phaseolies\Support\Facades\Session::class,
        "URL" => \Phaseolies\Support\Facades\URL::class,
        "Storage" => \Phaseolies\Support\Facades\Storage::class,
        "Cookie" => \Phaseolies\Support\Facades\Cookie::class,
        "Cache" => \Phaseolies\Support\Facades\Cache::class,
        "Schema" => \Phaseolies\Support\Facades\Schema::class,
        "Request" => \Phaseolies\Http\Request::class,
    ],
];
