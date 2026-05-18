<?php
namespace App\Foundation;

class Router
{
    private array $routes = [];

    public function get(string $path, callable $handler): void
    {
        $this->routes['GET'][$path] = $handler;
    }

    public function resolve(string $method, string $uri): string
    {

        echo '<pre>';
        print_r($_GET);
        echo '</pre>';
        die();
        $method = strtoupper($method);
        $uri = parse_url($uri, PHP_URL_PATH);

        // Buscar coincidencia simple
        foreach ($this->routes[$method] ?? [] as $route => $handler) {
            // Convertir {param} en regex
            $pattern = preg_replace('/\{([a-zA-Z_]+)\}/', '([a-zA-Z0-9_]+)', $route);
            $pattern = "#^" . $pattern . "$#";

            if (preg_match($pattern, $uri, $matches)) {
                array_shift($matches); // quitar la coincidencia completa
                return call_user_func_array($handler, $matches);
            }
        }

        return '404 Not Found';
    }
}