# A internal path rewrite middleware for react/http

[![Build Status](https://travis-ci.com/WyriHaximus/reactphp-http-middleware-rewrite.svg?branch=master)](https://travis-ci.com/WyriHaximus/reactphp-http-middleware-rewrite)
[![Latest Stable Version](https://poser.pugx.org/WyriHaximus/react-http-middleware-rewrite/v/stable.png)](https://packagist.org/packages/WyriHaximus/react-http-middleware-rewrite)
[![Total Downloads](https://poser.pugx.org/WyriHaximus/react-http-middleware-rewrite/downloads.png)](https://packagist.org/packages/WyriHaximus/react-http-middleware-rewrite)
[![Code Coverage](https://scrutinizer-ci.com/g/WyriHaximus/reactphp-http-middleware-rewrite/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/WyriHaximus/reactphp-http-middleware-rewrite/?branch=master)
[![License](https://poser.pugx.org/WyriHaximus/react-http-middleware-rewrite/license.png)](https://packagist.org/packages/WyriHaximus/react-http-middleware-rewrite)
[![PHP 7 ready](http://php7ready.timesplinter.ch/WyriHaximus/reactphp-http-middleware-rewrite/badge.svg)](https://travis-ci.com/WyriHaximus/reactphp-http-middleware-rewrite)

# Install

To install via [Composer](http://getcomposer.org/), use the command below, it will automatically detect the latest version and bind it with `^`.

```
composer require wyrihaximus/react-http-middleware-rewrite
```

# Usage

While [`wyrihaximus/react-http-middleware-webroot-preload`](https://github.com/WyriHaximus/reactphp-http-middleware-webroot-preload)
is great for serving static files. It doesn't (and won't) support serving `/index.html` as `/`. Enter the rewrite middleware,
underwater it will change the path from `/` to `/index.html`  so that the webroot preload middleware can serve `/index.html` as `/`.

```php
$server = new Server([
    /** Other middleware */
    new RewriteMiddleware(
        new Rewrite('/', '/index.html'),
    ),
    new WebrootPreloadMiddleware(/** args */),
    /** Other middleware */
]);
```

# License

The MIT License (MIT)

Copyright (c) 2018 Cees-Jan Kiewiet

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.
