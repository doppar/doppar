<?php

namespace App\Schedule;

use Phaseolies\Console\Schedule\InteractsWithSchedule;

class Schedule
{
    use InteractsWithSchedule;

    /**
     * Register commands to be scheduled.
     *
     * @param Schedule $schedule
     * @return void
     */
    public function schedule(Schedule $schedule): void
    {
        //
    }
}
