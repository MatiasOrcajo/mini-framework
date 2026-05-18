<?php

namespace App\Contracts\Http;

interface Router
{
    public static function get(string $path, callable $handler): void;

    public static function post(string $path, callable $handler): void;

    public function load(string $basepath): void;

}
