<?php
//load all required in cores so index can fetch from here
require "core/database/Connection.php";
require "core/database/Querybuilder.php";

require "Request.php";
require "Router.php";

$app =[];
$app['config'] = require "config.php"; //get config file
$app['database'] =  new Querybuilder(Connection::connect_db($app['config']['database']));


