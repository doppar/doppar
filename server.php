<?php

/**
 * Doppar - A PHP Framework
 *
 * @package Doppar
 * @author Mahedi Hasan <mahedi@doppar.com>
 */

$uri = urldecode(
    parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)
);

// This file allows us to emulate Apache's "mod_rewrite" functionality from the
// built-in PHP web server. This provides a convenient way to test a Doppar
// application without having installed a "real" web server software here.
// When you run `php pool start` (which uses PHP's built-in server)
// In production environments (using Apache/Nginx), this file isn't used
// Web server configurations directly route requests to public/index.php
// Static files are served directly by the web server for better performance.
if ($uri !== '/' && file_exists(__DIR__ . '/public' . $uri)) {
    return false;
}

require_once __DIR__ . '/public/index.php';
