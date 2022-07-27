<?php

namespace Config\lib;

class Routes {

    private array $handlers;

    public function get(String $path, $handler): void
    {
        $this->addHandlers('GET',$path,$handler);
    }

    private function addHandlers(string $method, string $path, $handler): void
    {
        $this->handlers[$method.$path] = [
            'path' => $path,
            'method' => $method,
            'handler' => $handler
        ];
    }

    public function run() 
    {
        $requestUri = parse_url($_SERVER['REQUEST_URI']);
        $requestPath = $requestUri['path'];
        $method = $_SERVER['REQUEST_METHOD'];
        
        $callback = null;
        foreach($this->handlers as $handler) {
            if($handler['path'] === $requestPath && $method === $handler['method'])
            {
                $callback = $handler['handler'];
            }
        }

        if(!$callback) {
            return header('HTTP/1.0 404 Not Found');
        }

        call_user_func_array($callback, [
            array_merge($_GET, $_POST)
        ]);
        
    }

}