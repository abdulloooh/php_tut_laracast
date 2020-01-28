<?php

class Request{
    public static function uri(){
        return trim($_SERVER['REQUEST_URI'], '/'); //_server is a superglobal variable
    }

}