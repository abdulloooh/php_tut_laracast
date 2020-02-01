<?php
//load all required in cores so index can fetch from here
// require "core/database/Connection.php";
// require "core/database/Querybuilder.php";

// require "Request.php";
// require "Router.php";

App::bind('config', require 'config.php');
App::bind('database', new Querybuilder(Connection::connect_db(App::get('config')['database'])));




