<?php

namespace App\Constructors;

class Singleton
{
    private static array $instances = [];

    protected function __construct()
    {

    }

    public static function getInstance(mixed $constructor = null)
    {
        $subclass = static::class;

        if(!isset(self::$instances[$subclass])){
            self::$instances[$subclass] = new static($constructor);
        }

        return self::$instances[$subclass];
    }
}