<?php

use App\TestController;
use Config\lib\Routes;

$router = new Routes();

$router->get('/', function(){
    header('Content-Type: html');
});

$router->get('/teste', function($param = null){
    echo json_encode(['teste'=>'ok']);
});

$router->post('/post', function($param = null){
    echo json_encode(['teste'=> $param]);
});

$router->get('/primeiro', TestController::class . '::testePrimeiro');

$router->post('/post-primeiro', TestController::class . '::postPrimeiro');

$router->run();