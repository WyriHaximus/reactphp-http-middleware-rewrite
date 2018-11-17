<?php declare(strict_types=1);

namespace WyriHaximus\React\Http\Middleware;

use Psr\Http\Message\ServerRequestInterface;

final class RewriteMiddleware
{
    /** @var array */
    private $rewrites;

    public function __construct(array $rewrites)
    {
        $this->rewrites = $rewrites;
    }

    public function __invoke(ServerRequestInterface $request, callable $next)
    {
        $uri = $request->getUri();

        if (isset($this->rewrites[$uri->getPath()])) {
            $request = $request->withUri($uri->withPath($this->rewrites[$uri->getPath()]));
        }

        return $next($request);
    }
}
