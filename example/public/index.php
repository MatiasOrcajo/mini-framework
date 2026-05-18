<?php
// Esto simula el index.php de una aplicación que usa tu framework
require __DIR__ . '/../../vendor/autoload.php';

require_once __DIR__.'/../bootstrap/app.php';

use App\Foundation\Router;

$router = new Router();

// Rutas de prueba
$router->get('/', function() {
    return 'Hola';
});

$router->get('/hello/{name}', function(string $name) {
    return "Hello, $name!";
});

// Obtener la respuesta y mostrarla
$response = $router->resolve($_SERVER['REQUEST_METHOD'], $_SERVER['REQUEST_URI']);
echo $response;
