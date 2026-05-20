<?php

namespace App\Contracts\Foundation;

use App\Http\Request;

interface Application
{
    public static function build(string $basepath);

    public function handleRequest(Request $request);
}
