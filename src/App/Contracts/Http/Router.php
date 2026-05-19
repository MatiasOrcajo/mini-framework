<?php

namespace App\Contracts\Http;

interface Router
{
    public static function get(string $path, callable $handler): void;

    public static function post(string $path, callable $handler): void;

    public static function loadRoutes(string $basepath): void;
}
