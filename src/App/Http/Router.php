<?php

namespace App\Http;

use App\Contracts\Http\Router as Contract;
use App\Constructors\Singleton;

class Router extends Singleton implements Contract
{
    public static array $getRoutesBag = [];
    public static array $postRoutesBag = [];
    private static array $activeMiddlewares = [];

    public static function get(string $path, callable $handler): void
    {
        self::$getRoutesBag[] = [
            'route' => $path,
            'method' => 'GET',
            'handler' => $handler,
            'middleware' => self::$activeMiddlewares];
    }

    public static function post(string $path, callable $handler): void
    {
        self::$postRoutesBag[] = [
            'route' => $path,
            'method' => 'POST',
            'handler' => $handler,
            'middleware' => self::$activeMiddlewares];
    }

    public static function loadRoutes(string $basepath): array
    {
        require $basepath.'/routes/web.php';
        return array("GET" => self::$getRoutesBag, "POST" => self::$postRoutesBag);
    }

    public function middleware(array $middlewares, callable $callback): void
    {
        self::$activeMiddlewares = $middlewares;
        call_user_func($callback);
    }
}
