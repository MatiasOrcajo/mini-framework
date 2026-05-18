<?php

use App\Http\Router;

$router = Router::getInstance()

$router->get('/', function(){
    return 'Hola desde web.php';
});

$router->get('/products', function(){
    return 'vista productos';
});

$router->post('/products', function(){
    return 'producto guardado';
});
