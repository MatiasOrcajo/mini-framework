<?php

namespace App\Foundation;

use App\Contracts\Foundation\Application as Contract;
use App\Http\Router;

class Application implements Contract
{
    public static function build(string $basepath)
    {
        Router::getInstance()->load($basepath);
//        echo '<pre>';
//        print_r(Route::$getRoutesBag);
//        print_r(Route::$postRoutesBag);
//        echo '</pre>';
    }
}
