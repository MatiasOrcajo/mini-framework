<?php

namespace App\Constructors;

class Singleton
{
    private static array $instances = [];

    protected function __construct()
    {

    }

    public static function getInstance()
    {
        $subclass = static::class;

        if(!isset(self::$instances[$subclass])){
            self::$instances[$subclass] = new static();
        }

        return self::$instances[$subclass];
    }
}