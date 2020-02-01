<?php
// return router->define([routes array])
// return $router->define([
//     '' => 'controllers/home.php',
//     'home'=> 'controllers/home.php',
//     'about' => 'controllers/about.php', 
//     'contact'=> 'controllers/contact.php',
//     'form' => 'controllers/form.php'
//     // 'array'=> 'array.php'
// ]);

$router->get('' , 'controllers/home.php') ;
$router->get('home'  ,  'controllers/home.php');
$router->get('about' , 'controllers/about.php');
$router->get('contact' , 'controllers/contact.php');
$router->post('signup' , 'controllers/signup.php');
$router->post('login', 'controllers/login.php');
$router->get("dashboard", 'controllers/dashboard.php');
$router->get("logout","controllers/logout.php");

// die(var_dump($router));