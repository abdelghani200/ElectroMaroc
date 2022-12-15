<?php

namespace Router;

class Router 
{
    public $url;
    public $routes =[];

    public function __construct($url)
    {
        $this->url = $url;
    }

    // public function show()
    // {
    //     echo $this->url;
    // }

    public function get(string $path ,string $action)
    {
        $this->routes['GET'][] = new Route($path,$action);
    }
}