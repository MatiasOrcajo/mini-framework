<?php

namespace App\Http;

use App\Constructors\Singleton;

class Request extends Singleton
{

    public string $method;
    public string $uri;
    public array $query;
    public array $server;

    public static function capture()
    {

    }

    private static function processGet()
    {

    }

    private static function method(): string
    {
        return $_SERVER['REQUEST_METHOD'];
    }

    private static function uri(): string
    {
        return $_SERVER['PHP_SELF'];
    }

    private function query(): array
    {
        return $_GET;
    }
}