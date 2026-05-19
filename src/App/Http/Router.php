<?php

namespace App\Http;

use App\Contracts\Http\Router as Contract;
use App\Constructors\Singleton;

class Router extends Singleton implements Contract
{
    public static array $getRoutesBag = [];
    public static array $postRoutesBag = [];

    public static function get(string $path, callable $handler): void
    {
        self::$getRoutesBag[] = ['route' => $path, 'method' => 'GET', 'handler' => $handler];
    }

    public static function post(string $path, callable $handler): void
    {
        self::$postRoutesBag[] = ['route' => $path, 'method' => 'POST', 'handler' => $handler];
    }

    public static function loadRoutes(string $basepath): void
    {
        require $basepath.'/routes/web.php';
    }
}
