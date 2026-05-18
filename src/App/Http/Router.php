<?php

namespace App\Http;

use App\Contracts\Http\Router as Contract;
use App\Constructors\Singleton;

class Router extends Singleton implements Contract
{
    public static $getRoutesBag = [];
    public static $postRoutesBag = [];

    public static function get(string $path, callable $handler): void
    {
        array_push(self::$getRoutesBag, ['route' => $path, 'handler' => $handler]);
    }

    public static function post(string $path, callable $handler): void
    {
        array_push(self::$postRoutesBag, ['route' => $path, 'handler' => $handler]);
    }

    public function load(string $basepath): void
    {
        require $basepath.'/routes/web.php';
    }
}
