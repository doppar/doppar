<?php

/**
 * Boot the application once for the PHPUnit process.
 * Avoids per-test set_error_handler noise under PHPUnit 13+.
 */
require __DIR__ . '/../vendor/autoload.php';

use Phaseolies\Facade\BaseFacade;
use Tests\TestCase;

$app = require __DIR__ . '/../runtime/app.php';

BaseFacade::setFacadeApplication($app);
TestCase::setApplication($app);
