<?php

namespace App\Http\Middleware;

use Phaseolies\Support\Facades\Auth;
use Phaseolies\Middleware\Contracts\Middleware;
use Phaseolies\Http\Response;
use Phaseolies\Http\Request;
use Closure;
use Phaseolies\Http\Exceptions\HttpResponseException;

class Authenticate implements Middleware
{
    /**
     * Handle an incoming request
     *
     * @param Request $request
     * @param \Closure(\Phaseolies\Http\Request) $next
     * @return Phaseolies\Http\Response
     */
    public function __invoke(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            return $next($request);
        }

        if ($request->isAjax() || $request->wantsJson()) {
            throw new HttpResponseException('Unauthenticated', 401);
        }

        $this->setIntendedUrl($request);

        return redirect('/login');
    }

    /**
     * Stores the current full URL in the session to allow redirection
     *
     * @param Request $request
     * @return void
     */
    public function setIntendedUrl(Request $request): void
    {
        if ($request->getMethod() === 'GET') {
            // Save the full URL to the session under 'url.intended'
            // for future redirection (e.g., after login)
            $request->session()->put('url.intended', $request->fullUrl());
        }
    }
}
