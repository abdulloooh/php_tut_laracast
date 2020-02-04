<?php
//this is the entry point
require 'vendor/autoload.php';
require "core/bootstrap.php"; //bring all required files from core via bootstrap

// Request::load() //basically to get Router object
Router::load('routes.php')      //so routes.php file should return $router->define([routes array]), the $router object would come from load after delaring $router to be new static in load and in load, I will just require the incoming
                            ->direct(Request::uri(),Request::method());


// $router = Router::load();
// $router->define(require 'routes.php'); //cos routes.php is a file, I cannot just pass it as string but to be executes as file
// //now direct incoming URI with direct method
// require ($router -> direct(Request::uri())); //then require the file and that is it