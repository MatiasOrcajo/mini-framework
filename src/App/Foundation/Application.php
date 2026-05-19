<?php

namespace App\Foundation;

use App\Constructors\Singleton;
use App\Contracts\Foundation\Application as Contract;
use App\Http\Router;

class Application extends Singleton implements Contract
{
    public string $basepath;

    protected function __construct(string $basepath)
    {
        parent::__construct();
        $this->basepath = $basepath;
    }

    public static function build(string $basepath): self
    {
        return self::getInstance()
                ->withRoutes();
    }

    private function withRoutes(): void
    {
        Router::getInstance()::loadRoutes($this->basepath);
    }

    public function handleRequest()
    {

    }
}
