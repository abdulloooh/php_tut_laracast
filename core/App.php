<?php
namespace App\core;
class App{
    protected static $directory= [
        
    ];
    public static function bind($key,$value){
        static::$directory[$key] = $value;
    }
    public static function get($key){
        if(!array_key_exists($key,static::$directory)){
            $_SESSION['error'] = "404";
            // throw new Exception("404");
        }
        return static::$directory[$key];
    }
}