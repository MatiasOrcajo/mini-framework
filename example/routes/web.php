<?php

use App\Http\Router;

$router = Router::getInstance();

$router->post('/products', function(){
    return 'producto guardado';
});

$router->middleware(['first', 'second'], function() use ($router) {
    $router->get('/', function(){
        return 'Hola desde web.php';
    });

    $router->get('/products', function(){
        return 'vista productos';
    });
});

$router->middleware(['third'], function () use ($router) {
    $router->post('/products', function (){
        return 'post con middleware';
    });
});
