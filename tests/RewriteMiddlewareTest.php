<?php

declare(strict_types=1);

namespace WyriHaximus\React\Tests\Http\Middleware;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use React\Http\Message\Response;
use React\Http\Message\ServerRequest;
use WyriHaximus\AsyncTestUtilities\AsyncTestCase;
use WyriHaximus\React\Http\Middleware\Rewrite;
use WyriHaximus\React\Http\Middleware\RewriteMiddleware;

use function React\Promise\resolve;

/**
 * @internal
 */
final class RewriteMiddlewareTest extends AsyncTestCase
{
    /**
     * @return iterable<array<array<Rewrite>|string>>
     */
    public function provideRewrites(): iterable
    {
        $rewrites = [new Rewrite('/', '/index.html')];

        yield [
            $rewrites,
            '/',
            '/index.html',
        ];

        yield [
            $rewrites,
            '/blog/',
            '/blog/',
        ];
    }

    /**
     * @param Rewrite[] $rewrites
     *
     * @dataProvider provideRewrites
     */
    public function testRewrite(array $rewrites, string $path, string $expectedPath): void
    {
        $response = $this->await(resolve((new RewriteMiddleware(...$rewrites))(new ServerRequest('GET', $path), static function (ServerRequestInterface $request): ResponseInterface {
            return new Response(200, [], $request->getUri()->getPath());
        })));

        self::assertSame($expectedPath, (string) $response->getBody());
    }
}
