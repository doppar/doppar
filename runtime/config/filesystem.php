<?php

/*
|--------------------------------------------------------------------------
| Default Filesystem Disk
|--------------------------------------------------------------------------
|
| This configuration file defines the file storage settings for the Doppar
| Framework. The default disk is set based on the "FILESYSTEM_DISK"
| environment variable, allowing flexibility between local and cloud storage.
|
| Available storage options:
| - "local": Stores files within the application's storage directory.
|
*/

return [

    'default' => env('FILESYSTEM_DISK', 'local'),

    /*
    |--------------------------------------------------------------------------
    | Filesystem Disks
    |--------------------------------------------------------------------------
    |
    | You can configure multiple storage disks here, each with different
    | drivers. This allows the application to manage files across various 
    | storage locations, whether local or external.
    |
    | Supported drivers: "local"
    |
    */

    'disks' => [
        'local' => [
            'driver' => 'local',
            'root' => storage_path('app'),
        ],

        'public' => [
            'driver' => 'local',
            'root' => storage_path('app/public'),
            'url' => env('APP_URL') . '/storage',
            'throw' => false,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Symbolic Links
    |--------------------------------------------------------------------------
    |
    | This section defines symbolic links that will be created when the 
    | `storage:link` command is executed. Symbolic links help serve storage 
    | files from public directories, making them accessible via URLs.
    |
    */

    'links' => [
        public_path('storage') => storage_path('app/public'),
        // add another like
        // public_path('avatars') => storage_path('app/avatars'),
    ],
];
