<?php

namespace App\Http\Middleware;

use Phaseolies\Middleware\Contracts\Middleware;
use Phaseolies\Http\Support\InteractsWithVerifyTwoFactorUser;
use Phaseolies\Http\Response;
use Phaseolies\Http\Request;
use Phaseolies\Http\Exceptions\InvalidTwoFactorSessionException;
use Closure;

class VerifyTwoFactorUser implements Middleware
{
    use InteractsWithVerifyTwoFactorUser;

    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param \Closure(\Phaseolies\Http\Request): Response $next
     * @return Response
     */
    public function __invoke(Request $request, Closure $next): Response
    {
        $result = $this->validateTwoFactorSession($request->session());

        if ($result === false) {
            throw new InvalidTwoFactorSessionException('Invalid or expired 2FA session.');
        }

        return $next($request);
    }
}
