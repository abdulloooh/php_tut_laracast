<?php
$name = "Abdullah";
//fetch database content
 $tasks = $app['database']->fetch_all("todos");

require "views/index.view.php";