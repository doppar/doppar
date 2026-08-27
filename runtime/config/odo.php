<?php

/**
 * =========================================
 * ODO TEMPLATE ENGINE CONFIGURATION
 * =========================================
 *
 * This configuration file allows you to customize the syntax
 * of odo template engine beyond standard syntax.
 */

return [
    /*
    |--------------------------------------------------------------------------
    | Directive Prefix
    |--------------------------------------------------------------------------
    |
    | The character used to prefix directives. Default to '#'.
    | You can change this to any single character like '#', '$', '%', '~', etc.
    |
    | Example: '#if', '$foreach', '%include'
    |
    */
    'directive_prefix' => '#',

    /*
    |--------------------------------------------------------------------------
    | Echo Tags
    |--------------------------------------------------------------------------
    |
    | Configure the opening and closing tags for outputting variables.
    |
    | Example: [[ $variable ]]
    |
    */
    'open_echo' => '[[',
    'close_echo' => ']]',

    /*
    |--------------------------------------------------------------------------
    | Raw Echo Tags
    |--------------------------------------------------------------------------
    |
    | Configure tags for unescaped output (raw HTML).
    |
    | Example: [[! $html !]]
    |
    */
    'open_raw_echo' => '[[!',
    'close_raw_echo' => '!]]',

    /*
    |--------------------------------------------------------------------------
    | Escaped Echo Tags
    |--------------------------------------------------------------------------
    |
    | Configure tags for explicitly escaped output.
    |
    | Example: [[[ $variable ]]]
    |
    */
    'open_escaped_echo' => '[[[',
    'close_escaped_echo' => ']]]',

    /*
    |--------------------------------------------------------------------------
    | Comment Tags
    |--------------------------------------------------------------------------
    |
    | Configure tags for template comments.
    |
    | Example: [[-- This is a comment --]]
    |
    */
    'open_comment' => '[[--',
    'close_comment' => '--]]',
];
