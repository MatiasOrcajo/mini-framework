<?php

namespace App\Http;

class Middleware
{

    public function __construct()
    {

    }

    public function group(callable $callback)
    {
        dd($callback);
    }
}