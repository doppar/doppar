<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Hash Driver
    |--------------------------------------------------------------------------
    |
    | Defines the default algorithm for hashing passwords. "argon2id" is used 
    | for enhanced security, but you can switch to "bcrypt" or "argon" if needed.
    |
    | Supported drivers:
    | - "bcrypt"   → Slower but widely supported, uses work factor (rounds).
    | - "argon"    → More secure, uses memory-hard functions (Argon2i).
    | - "argon2id" → Strongest option, resistant to side-channel attacks.
    |
    */

    'driver' => 'bcrypt',

    /*
    |--------------------------------------------------------------------------
    | Bcrypt Configuration
    |--------------------------------------------------------------------------
    |
    | Bcrypt is a widely used hashing algorithm. The "rounds" setting determines
    | the computational cost (higher is more secure but slower).
    |
    */

    'bcrypt' => [
        'rounds' => env('BCRYPT_ROUNDS', 10),
    ],

    /*
    |--------------------------------------------------------------------------
    | Argon2 Configuration
    |--------------------------------------------------------------------------
    |
    | Argon2 is a modern password hashing algorithm that is memory-hard, making 
    | brute-force attacks significantly more difficult. The following settings 
    | control its security level and performance.
    |
    | - "memory"  → Memory cost in KB (higher = more secure but slower).
    | - "threads" → Number of CPU threads used for hashing.
    | - "time"    → Number of iterations (higher = more secure but slower).
    |
    */

    'argon' => [
        'memory' => 65536, // 64MB
        'threads' => 1,
        'time' => 4,
    ],

];
