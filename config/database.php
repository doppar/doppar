<?php

/*
|--------------------------------------------------------------------------
| Database Configuration
|--------------------------------------------------------------------------
|
| This configuration file defines the database connection settings for the 
| application. It supports multiple database connections, with "mysql" set 
| as the default. Database credentials and settings are primarily loaded 
| from the ".env" file to maintain security and flexibility.
|
| Best Practices:
| - Always store sensitive credentials in the ".env" file.
| - Use different credentials for development and production environments.
| - Ensure the database connection is properly configured before deployment.
|
*/

return [
    'default' => 'mysql',
    'connections' => [
        'mysql' => [
            'host' => '127.0.0.1',
            'database' => env('DB_DATABASE') ?? 'doppar',
            'username' => env('DB_USERNAME') ?? 'root',
            'password' => env('DB_PASSWORD') ?? 'password',
        ],
    ],
];
