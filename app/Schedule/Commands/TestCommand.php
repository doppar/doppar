<?php

namespace App\Schedule\Commands;

use Phaseolies\Console\Schedule\Command;

class TestCommand extends Command
{
    /**
     * The name of the console command.
     *
     * @var string
     */
    protected $name = 'user:manage {user_id?} {--user_id=}';

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
        info('Cron running from test command class');
        return Command::SUCCESS;
    }
}
