<?php

namespace App\Http\Exceptions;

use Throwable;
use Phaseolies\Error\Contracts\ErrorHandlerInterface;

class BeforeExceptionHandler implements ErrorHandlerInterface
{
    /**
     * Handle logic to be executed before the application processes an exception
     *
     * @param Throwable $exception
     * @return void
     */
    public function handle(Throwable $exception): void
    {
        //
    }

    /**
     * Determine if this handler should run for the current context
     *
     * @return bool
     */
    public function supports(): bool
    {
        return true;
    }
}
