<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Log Channel
    |--------------------------------------------------------------------------
    |
    | Defines the default logging channel for recording application logs. 
    | The selected channel should match one of the configured channels below.
    |
    | Options:
    | - "single" → Logs everything to a single file.
    | - "daily"  → Creates a new log file for each day.
    | - "stack"  → Combines multiple log channels.
    | - "slack"  → Slack channel
    */

    'default' => env('LOG_CHANNEL', 'daily'),

    /*
    |--------------------------------------------------------------------------
    | Log Channels
    |--------------------------------------------------------------------------
    |
    | Configures various log channels used for storing logs. Doppar uses
    | the Monolog PHP logging library, which provides flexible handlers
    | and formatters to manage log storage and levels.
    |
    | Available drivers: "single", "daily", "stack"
    |
    */

    'channels' => [
        'stack' => [
            'driver' => 'stack',
            'channels' => ['single', 'daily'],
            'firephp' => true,
        ],

        'single' => [
            'driver' => 'single',
            'path' => storage_path('logs/doppar.log'),
            'level' => \Monolog\Level::Debug,
        ],

        'daily' => [
            'driver' => 'daily',
            'path' => storage_path('logs/doppar.log'),
            'level' => \Monolog\Level::Info,
        ],

        'slack' => [
            'driver' => 'slack',
            'url' => env('SLACK_WEBHOOK_URL'),
            'username' => 'Doppar Log',
            'emoji' => ':boom:',
            'level' => env('LOG_LEVEL', 'debug'),
            'replace_placeholders' => true,
        ],
    ],
];
