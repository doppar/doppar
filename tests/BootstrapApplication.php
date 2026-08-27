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
        $app = require __DIR__ . '/../runtime/app.php';

        return $app;
    }
}
