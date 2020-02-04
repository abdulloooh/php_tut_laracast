<?php

class PagesController{
    public function about(){
        // require "views/about.view.php";
        $name = "Laplace";
        $business = "Telecommunication";
        return views('about', [ //better and faster mtd is compact
            "name"=>$name,
            "business" => $business
        ]);
    }

    public function contact(){
        // require "views/contact.view.php";
        return views("contact");
    }
    public function home(){
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
        // require "views/index.view.php"; //this is perfectly fine and I think the simplicity is even the best but then, we move to the hard on next line
        return views('index', compact("name", "arrangement"));
    
    }
    public function dashboard(){
        session_start();
        if(isset($_SESSION['username']) && isset($_SESSION['id'])){
            // echo $_SESSION['username'];
            // echo $_SESSION['id'];
            echo "<a href='/logout'>Logout</a>";
            // die(var_dump($_SESSION));
        }
        else{
            $_SESSION['message'] = "Your are not logged in";
            redirect();
            exit;
        }
    }

}