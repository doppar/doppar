<?php

namespace App\Http\Middleware;

use Phaseolies\Middleware\Contracts\Middleware;
use Phaseolies\Http\Support\InteractsWithTrustedProxies;
use Phaseolies\Http\Response;
use Phaseolies\Http\Request;
use Closure;

class TrustProxies implements Middleware
{
    use InteractsWithTrustedProxies;

    /**
     * The trusted proxies for this application
     *
     * @var array|string
     */
    protected $proxies = [];

    /**
     * The proxy headers to trust
     *
     * @var int
     */
    protected $headers = Request::HEADER_X_FORWARDED_FOR |
        Request::HEADER_X_FORWARDED_HOST |
        Request::HEADER_X_FORWARDED_PORT |
        Request::HEADER_X_FORWARDED_PROTO;

    /**
     * Private IP subnets that can be trusted
     *
     * @var array
     */
    protected $privateSubnets = [];

    /**
     * Handle an incoming request
     *
     * @param Request $request
     * @param Closure $next
     * @return Response
     */
    public function __invoke(Request $request, Closure $next): Response
    {
        $request::setTrustedProxies(
            $this->getTrustedProxies(),
            $this->getTrustedHeaders()
        );

        return $next($request);
    }
}
