<?php

namespace Tests\Feature;

use Tests\TestCase;

class ExampleTest extends TestCase
{
    public function test_application_is_bootstrapped(): void
    {
        $this->assertSame(\Phaseolies\Application::VERSION, $this->app()::VERSION);
    }
}
