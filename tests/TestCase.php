<?php

namespace Tests;

use PHPUnit\Framework\TestCase as PHPUnitBaseTest;

abstract class TestCase extends PHPUnitBaseTest
{
    use BootstrapApplication;
}
