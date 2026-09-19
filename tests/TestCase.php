<?php

namespace Tests;

use Phaseolies\Application;
use Phaseolies\Facade\BaseFacade;
use PHPUnit\Framework\TestCase as PHPUnitBaseTest;

abstract class TestCase extends PHPUnitBaseTest
{
    use BootstrapApplication;

    protected static ?Application $app = null;

    public static function setApplication(Application $app): void
    {
        static::$app = $app;
    }

    protected function setUp(): void
    {
        parent::setUp();

        if (static::$app === null) {
            static::$app = $this->buildApplication();
            BaseFacade::setFacadeApplication(static::$app);
        }
    }

    protected function app(): Application
    {
        if (static::$app === null) {
            throw new \RuntimeException('Application has not been bootstrapped.');
        }

        return static::$app;
    }
}
