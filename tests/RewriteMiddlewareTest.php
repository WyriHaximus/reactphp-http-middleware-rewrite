<?php declare(strict_types=1);

namespace WyriHaximus\React\Tests\Http\Middleware;

use ApiClients\Tools\TestUtilities\TestCase;
use Psr\Http\Message\ServerRequestInterface;
use React\Http\Io\ServerRequest;
use WyriHaximus\React\Http\Middleware\RewriteMiddleware;

final class RewriteMiddlewareTest extends TestCase
{
    public function provideRewrites()
    {
        $rewrites = [
            '/' => '/index.html',
        ];

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
     * @dataProvider provideRewrites
     */
    public function testRewrite(array $rewrites, string $path, string $expectedPath)
    {
        $passedPath = '';
        (new RewriteMiddleware($rewrites))(new ServerRequest('GET', $path), function (ServerRequestInterface $request) use (&$passedPath) {
            $passedPath = $request->getUri()->getPath();
        });

        self::assertSame($expectedPath, $passedPath);
    }
}
