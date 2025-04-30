<?php

/*
|--------------------------------------------------------------------------
| Database Configuration
|--------------------------------------------------------------------------
|
| This configuration file defines the database connection settings for the 
| application. It supports multiple database connections (MySQL, PostgreSQL)
| with "mysql" set as the default. Database credentials and settings are primarily 
| loaded from the ".env" file to maintain security and flexibility.
|
| Supported Drivers: mysql, pgsql
|
*/

return [
    'default' => env('DB_CONNECTION', 'mysql'),
    'timezone' => env('DB_TIMEZONE', '+00:00'),
    'connections' => [
        'mysql' => [
            'driver' => 'mysql',
            'host' => env('DB_HOST', '127.0.0.1'),
            'port' => env('DB_PORT', '3306'),
            'database' => env('DB_DATABASE', 'doppar'),
            'username' => env('DB_USERNAME', 'root'),
            'password' => env('DB_PASSWORD', ''),
            'charset' => env('DB_CHARSET', 'utf8mb4'),
            'collation' => env('DB_COLLATION', 'utf8mb4_unicode_ci'),
            'prefix' => env('DB_PREFIX', ''),
            'strict' => env('DB_STRICT_MODE', true),
            'engine' => env('DB_ENGINE', null),
            'options' => extension_loaded('pdo_mysql') ? [
                PDO::MYSQL_ATTR_SSL_CA => env('MYSQL_ATTR_SSL_CA'),
                PDO::MYSQL_ATTR_INIT_COMMAND => "SET time_zone = '" . env('DB_TIMEZONE', '+00:00') . "'",
            ] : [],
        ],
        'pgsql' => [
            'driver' => 'pgsql',
            'host' => env('DB_HOST', '127.0.0.1'),
            'port' => env('DB_PORT', '5432'),
            'database' => env('DB_DATABASE', 'doppar'),
            'username' => env('DB_USERNAME', 'postgres'),
            'password' => env('DB_PASSWORD', ''),
            'charset' => env('DB_CHARSET', 'utf8'),
            'schema' => env('DB_SCHEMA', 'public'),
            'sslmode' => env('DB_SSL_MODE', 'prefer'),
        ],
    ],
];
