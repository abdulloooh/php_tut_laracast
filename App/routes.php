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

$router->get('' , 'PagesController@home') ;
$router->get('home'  ,  'PagesController@home');
$router->get('about' , 'PagesController@about');
$router->get('contact' , 'PagesController@contact');
$router->post('signup' , 'UsersController@signup');
$router->post('login', 'UsersController@login');
$router->get("dashboard", 'PagesController@dashboard');
$router->get("logout","UsersController@logout");

// die(var_dump($router));