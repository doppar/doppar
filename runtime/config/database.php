<?php

/*
|--------------------------------------------------------------------------
| Database Configuration
|--------------------------------------------------------------------------
|
| This configuration file defines the database connection settings for the
| application. It supports database connections MySQL, SQLite and PostgreSQL. Database credentials and settings are primarily
| loaded from the ".env" file to maintain security and flexibility.
|
| Supported Drivers: mysql, sqlite, pgsql
|
*/

return [
    'default' => env('DB_CONNECTION', 'sqlite'),

    'connections' => [

        'sqlite' => [
            'driver' => 'sqlite',
            'url' => env('DATABASE_URL'),
            'database' => env('DB_DATABASE', database_path('database.sqlite')),
            'prefix' => '',
            'foreign_key_constraints' => env('DB_FOREIGN_KEYS', true),
        ],

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
            'options' => extension_loaded('pdo_mysql') ? (function () {
                $sslCa = env('MYSQL_ATTR_SSL_CA');

                if (!$sslCa) {
                    return [];
                }

                if (defined('Pdo\Mysql::ATTR_SSL_CA')) {
                    return [
                        \Pdo\Mysql::ATTR_SSL_CA => $sslCa,
                    ];
                }

                return [
                    \PDO::MYSQL_ATTR_SSL_CA => $sslCa,
                ];
            })() : [],
        ],

        'pgsql' => [
            'driver' => 'pgsql',
            'host' => env('DB_HOST', '127.0.0.1'),
            'port' => env('DB_PORT', '5432'),
            'database' => env('DB_DATABASE', 'doppar'),
            'username' => env('DB_USERNAME', 'root'),
            'password' => env('DB_PASSWORD', ''),
            'charset' => env('DB_CHARSET', 'utf8'),
            'prefix' => '',
            'prefix_indexes' => true,
            'search_path' => 'public',
            'sslmode' => 'prefer',
        ],
    ],
];
