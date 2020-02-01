<?php
session_start();
if(!isset($_POST['login'])){
    $_SESSION['message'] = "Please sign up or login";
    header("location:/");
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
        header("location:/");
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
        header("location:/dashboard");
        exit();
    }
    else{
        $_SESSION['message'] = "Wrong login data";
        header("location:/");
        exit();
    }
}
catch(PDOException $e){
    // $_SESSION['message'] = $e->getMessage();
    $_SESSION['error']= "Service unavailable, kindly message/email us to rectify this error";
    header("location:/");
    exit();
}