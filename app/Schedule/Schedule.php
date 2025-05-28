<?php

namespace App\Schedule;

use Phaseolies\Console\Schedule\InteractsWithSchedule;

class Schedule
{
    use InteractsWithSchedule;

    /**
     * Register commands to be scheduled.
     *
     * This method sets up multiple commands with various scheduling intervals
     * and execution configurations (e.g., background execution, no overlap).
     *
     * @param Schedule $schedule
     * @return void
     */
    public function schedule(Schedule $schedule): void
    {
        //
    }
}
