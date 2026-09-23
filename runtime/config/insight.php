<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Insight Configuration
    |--------------------------------------------------------------------------
    |
    | This configuration file controls the behavior of the application insight.
    | The insight collects request and performance data similar helping developers inspect and debug
    | application behavior in real time. You can enable and disable insight by make it true and false.
    |
    */

    'enabled' => true,
    'allow_production' => false,
    'sensitive_keys' => [
        'password',
        'token',
        'secret',
        'authorization',
        'cookie',
        'api_key',
        'client_secret',
        'access_token',
        'refresh_token',
        'credit_card',
        'ssn',
    ],
    'redact_sql_bindings' => true,
    'redact_raw_body' => true,

    /*
    |--------------------------------------------------------------------------
    | Data Retention
    |--------------------------------------------------------------------------
    |
    | The profiler automatically stores request and performance data as JSON
    | files under "storage/framework/profiler". To prevent excessive disk
    | usage, old entries are automatically removed after the specified number
    | of days.
    |
    | Default: 30 days
    |
    */

    'retention_days' => 30,
    'max_profile_bytes' => 1048576,
    'max_storage_bytes' => 104857600,

    /*
    |--------------------------------------------------------------------------
    | SQL Profiling
    |--------------------------------------------------------------------------
    |
    | These thresholds drive the query metadata exposed by Insight. Slow
    | queries are flagged per statement, while repeated select statements
    | with varying bindings can be highlighted as potential N+1 patterns.
    |
    */

    'sql_slow_threshold_ms' => 100,
    'sql_n_plus_one_threshold' => 3,
];
