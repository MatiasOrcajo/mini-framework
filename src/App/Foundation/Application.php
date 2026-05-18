<?php

namespace App\Foundation;

use App\Contracts\Foundation\Application as Contract;

class Application implements Contract
{
    public static function build()
    {
        var_dump("Llegaste a Application");
        die();
    }
}
