<?php

namespace App\Http;

use App\Constructors\Singleton;
use App\Contracts\Http\Request as Contract;

class Request extends Singleton implements Contract
{

    public string $method;
    public string $uri;
    public array $formDataBag;
    public array $queryBag;
    public array $serverBag;

    protected function __construct()
    {
        parent::__construct();
        $this->setBags(
            $this->method(),
            $this->uri(),
            $this->query(),
            $this->formData(),
            $this->server());
    }

    public static function capture(): self
    {
        return self::getInstance();
    }

    private function setBags(string $method, string $uri, array $query, array $formData, array $server)
    {
        $this->method = $method;
        $this->uri = $uri;
        $this->queryBag = $query;
        $this->formDataBag = $formData;
        $this->serverBag = $server;
    }

    private function method(): string
    {
        return $_SERVER['REQUEST_METHOD'];
    }

    private function uri(): string
    {
        return $_SERVER['REQUEST_URI'];
    }

    private function query(): array
    {
        return $_GET;
    }

    private function formData(): array
    {
        return $_POST;
    }

    private function server(): array
    {
        return $_SERVER;
    }
}