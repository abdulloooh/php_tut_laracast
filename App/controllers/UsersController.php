<?php

namespace App\controllers;
use App\core\App;
class UsersController{
    public function signup(){
        session_start();
//check if form has been submitted
        if(!isset($_POST['signup'])){
            $_SESSION['error'] = "Please sign up or login";
            redirect();
            exit();
        }
        if( //check all fields are filled
            !($fullname = $_POST["fullname"])||
            !($username = $_POST["username"])||
            !($phone = $_POST["phone"])||
            !($password = $_POST["password"])||
            !($cpassword= $_POST["cpassword"])
        ){
            $_SESSION['error'] = "ALL fields are required";
            redirect();
            exit;
        }
        if($password != $cpassword){//confirm password
        $_SESSION['error'] = "Password does not math";
        redirect();
        exit;
        }
        //check if username or phone number exists
        try{
            $return=App::get('database')->check("users",'or',[
                "username"=>$username,
                "phone"=>$phone,
            ]);
            $count = $return[0];
        }
        catch (PDOException $e){
            // $_SESSION['error']= $e->getMessage();
            $_SESSION['error']= "Service unavailable, kindly message/email us to rectify this error";
            redirect();
            exit;
        }
        //get count of result
        if($count>0){
            $_SESSION['error'] = "Username or Phone number already exists";
            redirect();
        exit;
        }
        //if user not exist, insert into database
        try{
            App::get('database')->insertUser("users",[
                "fullname"=>$fullname,
                "username"=>$username,
                "phone"=>$phone,
                "pass"=>$password
            ]);
            $_SESSION['error'] = "Signup successful, Please login";
            redirect();
        exit;
        }
        catch (PDOException $e){
            // $_SESSION['error']= $e->getMessage();
            $_SESSION['error']= "Service unavailable, kindly message/email us to rectify this error";
            redirect();
            exit;
        }
    }
    public function login(){
        session_start();
        if(!isset($_POST['login'])){
            $_SESSION['message'] = "Please sign up or login";
            redirect();
            exit();
        }
        try{
            $username = $_POST["user"];
            $password = $_POST["pass"];
            if( //check all fields are filled
                !($username)||
                !($password)
            ){
                $_SESSION['message'] = "empty fields";
                redirect();
                exit();
            }
            
            $return = App::get('database')->check('users','and',[
                'username'=>$username,
                'pass'=>$password
            ]); 
            //count returns
            $count = $return[0];
            if($count == 1){
                $_SESSION['username'] = $username;
                $_SESSION['id'] = $return[1][0]->id;
                redirect("dashboard");
                exit();
            }
            else{
                $_SESSION['message'] = "Wrong login data";
                redirect();
                exit();
            }
        }
        catch(PDOException $e){
            // $_SESSION['message'] = $e->getMessage();
            $_SESSION['error']= "Service unavailable, kindly message/email us to rectify this error";
            redirect();
            exit();
        }
    }
    public function logout(){
        session_start();
        session_destroy();
        redirect();
    }
}