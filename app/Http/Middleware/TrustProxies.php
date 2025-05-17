<?php

namespace App\Http\Middleware;

use Phaseolies\Middleware\Contracts\Middleware;
use Phaseolies\Http\Response;
use Phaseolies\Http\Request;
use Closure;

class TrustProxies implements Middleware
{
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

    /**
     * Get the trusted proxies
     *
     * @return array
     */
    protected function getTrustedProxies(): array
    {
        if (is_string($this->proxies)) {
            return $this->resolveSpecialProxies($this->proxies);
        }

        return $this->proxies;
    }

    /**
     * Resolve special proxy values
     *
     * @param string $proxies
     * @return array
     */
    protected function resolveSpecialProxies(string $proxies): array
    {
        switch ($proxies) {
            case '*':
                return ['*'];

            case '**':
                return $this->privateSubnets;

            default:
                return [$proxies];
        }
    }

    /**
     * Get the proxy header configuration
     *
     * @return int
     */
    protected function getTrustedHeaders(): int
    {
        return $this->headers;
    }

    /**
     * Set the trusted proxies
     *
     * @param array|string $proxies
     * @return self
     */
    public function setProxies($proxies): self
    {
        $this->proxies = $proxies;
        return $this;
    }

    /**
     * Set the trusted headers
     *
     * @param int $headers
     * @return self
     */
    public function setHeaders(int $headers): self
    {
        $this->headers = $headers;
        return $this;
    }

    /**
     * Set private subnets
     *
     * @param array $subnets
     * @return self
     */
    public function setPrivateSubnets(array $subnets): self
    {
        $this->privateSubnets = $subnets;
        return $this;
    }
}
