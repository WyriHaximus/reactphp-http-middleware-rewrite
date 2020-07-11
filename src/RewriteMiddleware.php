<?php

declare(strict_types=1);

namespace WyriHaximus\React\Http\Middleware;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use React\Promise\PromiseInterface;

use function array_key_exists;

final class RewriteMiddleware
{
    /** @var array<string, string> */
    private array $rewrites = [];

    public function __construct(Rewrite ...$rewrites)
    {
        foreach ($rewrites as $rewrite) {
            $this->rewrites[$rewrite->from()] = $rewrite->to();
        }
    }

    /**
     * @return PromiseInterface|ResponseInterface
     */
    public function __invoke(ServerRequestInterface $request, callable $next)
    {
        $uri = $request->getUri();

        if (array_key_exists($uri->getPath(), $this->rewrites)) {
            $request = $request->withUri($uri->withPath($this->rewrites[$uri->getPath()]));
        }

        return $next($request);
    }
}
