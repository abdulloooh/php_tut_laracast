<?php

class Router{
    protected $routes = [
        "GET"=> [],
        "POST"=>[]
    ];

    public static function load($file){ //pass in incoming arg wshich is $file containing routes.php
        $router = new static;
        require $file;// require incoming which is $file and this will initialise protected routes inside define
        return $router;
    }

    public function get($uri, $controller){
        $this->routes['GET'][$uri] = $controller;
    }

    public function post($uri, $controller){
        $this->routes['POST'][$uri] = $controller;
    } 

    public function direct($incoming_uri,$request_type){
        if (array_key_exists($incoming_uri, $this->routes[$request_type])){
            return $this->routes[$request_type][$incoming_uri];
            }
        throw new Exception("No defined route for this URI, 404 page here");
        }
}