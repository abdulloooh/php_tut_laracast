<?php
session_start();
if(isset($_SESSION['username']) && isset($_SESSION['id'])){
    // echo $_SESSION['username'];
    // echo $_SESSION['id'];
    echo "<a href='/logout'>Logout</a>";
    // die(var_dump($_SESSION));
}
else{
    $message = "Your are not logged in";
    header("location:/home");
    exit;
}