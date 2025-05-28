<?php

namespace App\Schedule\Commands;

use Phaseolies\Console\Schedule\Command;

class AnotherCommand extends Command
{
    /**
     * The name of the console command.
     *
     * @var string
     */
    protected $name = 'user:test {user_id?} {--user_id=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Manage users';

    /**
     * Execute the console command.
     *
     * @return int
     */
    protected function handle(): int
    {
        info('Cron running from another command class');
        return Command::SUCCESS;
    }
}
