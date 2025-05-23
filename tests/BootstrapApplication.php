<?php

namespace Tests;

use Phaseolies\Application;

trait BootstrapApplication
{
    /**
     * Bootstrap application and get the instance
     *
     * @return \Phaseolies\Application
     */
    public function buildApplication(): Application
    {
        $app = require __DIR__ . '/../bootstrap/app.php';

        return $app;
    }
}
