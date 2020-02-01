<?php
session_start();
if(!isset($_SESSION['message'])){
    $_SESSION['message'] = "Please Log in";
    header("location:/");
}
if(isset($_SESSION['username'])){
    echo "<a href='/logout'>Logout</a>";
    // die(var_dump($_SESSION));
}
else{
    $message = "Your are not logged in";
    header("location:/home");
    exit;
}