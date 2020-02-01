<?php
$name = "Abdullah";
//fetch database content
  $tasks = App::get('database')->fetch_all("todos");

// die(var_dump($tasks));
$done = array_filter($tasks,function($task){
                        return ($task->completed == true);   //check if status is completed or pending
                                });
$not_done = array_filter($tasks,function($task){
                                    return ($task->completed == false);   //check if status is completed or pending
                                            });
$arrangement = [$not_done , $done];


require "views/index.view.php";