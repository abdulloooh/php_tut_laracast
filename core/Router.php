<?php

class Router{
    protected $routes;

    public static function load($file){ //pass in incoming arg which is $file containing routes.php
        $router = new static;
        require $file;// require incoming which is $file and this will initialise protected routes inside define
        return $router;
    }

    public function define($routes){
        $this->routes = $routes;
    }
    public function direct($incoming_uri){
        if (array_key_exists($incoming_uri, $this->routes)){
            return $this->routes[$incoming_uri];
        throw new Exception("No defined route for this URI");
        }
    }
}