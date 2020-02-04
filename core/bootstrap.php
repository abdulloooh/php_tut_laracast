<?php
//load all required in cores so index can fetch from here
// require "core/database/Connection.php";
// require "core/database/Querybuilder.php";

// require "Request.php";
// require "Router.php";
use App\core\App;
App::bind('config', require 'config.php');
App::bind('database', new Querybuilder(Connection::connect_db(App::get('config')['database'])));

//this honestly is absolutely not needed, coming from controller classes   but they are called helper functions
function views($path,$data = []){
    extract($data);
    require "App/views/{$path}.view.php" ;
}
function redirect($path=''){
    header("location: /{$path}");
}


