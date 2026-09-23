<?php

namespace App\Http\Exceptions;

use Doppar\Insight\Support\ErrorHistoryRecorder;
use Phaseolies\Error\Contracts\ErrorHandlerInterface;
use Throwable;

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
        app(ErrorHistoryRecorder::class)->record($exception);
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
