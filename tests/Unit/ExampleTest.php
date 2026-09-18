<?php

namespace Tests\Unit;

use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * Test that Doppar version is greater than or equal to 4.0.0.
     */
    public function testDopparVersion(): void
    {
        $this->assertGreaterThanOrEqual('4.0.0', \Phaseolies\Application::VERSION);
    }
}
