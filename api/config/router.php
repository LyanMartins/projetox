<?php

use Config\lib\Routes;

$router = new Routes();

$router->get('/', function(){
    echo "home";
});

$router->run();