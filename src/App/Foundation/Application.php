<?php

namespace App\Foundation;

use App\Constructors\Singleton;
use App\Contracts\Foundation\Application as Contract;
use App\Http\Request;
use App\Http\Router;

class Application extends Singleton implements Contract
{
    public string $basepath;
    public array $routes = [];

    protected function __construct(string $basepath)
    {
        parent::__construct();
        $this->basepath = $basepath;
    }

    public static function build(string $basepath): self
    {
        return self::getInstance($basepath)
            ->withRoutes();
    }

    private function withRoutes(): self
    {
        $this->routes = Router::loadRoutes($this->basepath);
        return self::getInstance();
    }

    public function handleRequest(Request $request)
    {
        dd($request);
    }
}
