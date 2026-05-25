<?php

namespace App\Contracts\Http;

interface Request
{
    public static function capture(): self;
}
