<?php
session_start();
//check if form has been submitted
if(!isset($_POST['signup'])){
    $_SESSION['error'] = "Please sign up or login";
    header("location:/");
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
   header("location: /");
   exit;
}
if($password != $cpassword){//confirm password
   $_SESSION['error'] = "Password does not math";
   header("location: /");
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
    header("location: /home");
    exit;
}
//get count of result
if($count>0){
    $_SESSION['error'] = "Username or Phone number already exists";
    header("location: /");
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
    header("location: /");
   exit;
}
catch (PDOException $e){
    // $_SESSION['error']= $e->getMessage();
    $_SESSION['error']= "Service unavailable, kindly message/email us to rectify this error";
    header("location: /home");
    exit;
}