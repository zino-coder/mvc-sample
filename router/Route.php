<?php

class Route
{
    private $controller;
    private $action;
    private $params;
    private $uri;

    // magic method getter
    public function __get($var) {
        if (isset($this->{$var})) {
            return $this->{$var};
        }

        return null;
    }

    function __construct($uri) {
        $this->uri = $uri;
        if ($this->uri == '/') {
            $this->controller = 'task';
            $this->action = 'index';
            $this->params = [];

            return 0;
        }

        return $this->parse();
    }

    public function parse() {
        $uriArray = explode('/', $this->uri);
        $this->controller = $uriArray['1'];
        $this->action = $uriArray['2'];
        $this->params = array_slice($uriArray, 3);
    }
}