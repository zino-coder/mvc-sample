<?php

class Dispatcher
{
    private $route;

    private function route() {
        $uri = $_SERVER['REQUEST_URI'];

        return $this->route = new Route($uri);
    }

    public function dispatch() {
        $this->route();
        
        $controllerName = ucfirst($this->route->controller) . 'Controller';
        require_once '../Controllers/'. $controllerName . '.php';
        
        $controller = new $controllerName();
        $action = $this->route->action;
        $params = $this->route->params;

        return call_user_func_array([$controller, $action], $params);
    }
}