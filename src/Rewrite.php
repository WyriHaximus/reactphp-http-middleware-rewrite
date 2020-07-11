<?php

declare(strict_types=1);

namespace WyriHaximus\React\Http\Middleware;

final class Rewrite
{
    private string $from;
    private string $to;

    public function __construct(string $from, string $to)
    {
        $this->from = $from;
        $this->to   = $to;
    }

    public function from(): string
    {
        return $this->from;
    }

    public function to(): string
    {
        return $this->to;
    }
}
