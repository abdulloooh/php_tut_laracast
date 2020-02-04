<?php
namespace App\core;
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
        // die(var_dump(explode('@',$this->routes[$request_type][$incoming_uri])));
        if (array_key_exists($incoming_uri, $this->routes[$request_type])){
            return $this->callAction(...explode('@',$this->routes[$request_type][$incoming_uri]));         //splat operator
            }
        throw new Exception("No defined route for this URI, 404 page here");
        }

    protected function callAction($controller, $action){
        $controller = "App\\controllers\\{$controller}"; //  single front slash is gonna escape the curly bracket thus not treating it as a special char
        // die(var_dump($controller));
        $controller = new $controller;
        if(!method_exists($controller, $action)){
            throw new Exception("custom 404 error");
        }
        return $controller->$action();
    }
}