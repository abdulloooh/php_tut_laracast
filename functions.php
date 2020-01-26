<?php
function dd($to_dump){ // a dumping function is usually used for debugging
     echo "<pre>";
         die(var_dump($to_dump));
     echo "</pre>";
 }


function travel_abroad($age){
    if($age>=18){
        echo "<p>Fine, you can travel abroad too</p>";
    }
    else if($age < 18){
        echo "<p>Sorry, wait till you reach 18years of age</p>";
    }
}

function connect_db(){
    try{
         return new PDO('mysql:host=127.0.0.1;dbname=php', 'root', '');
        echo "<h3>Database connection successful</h3>";
    }
    catch(PDOExeption $e){
       
        }
}
require 'travel.php';
function fetch_all($db){
    $statement = $db->prepare('select * from table1');
    $statement->execute();
    return $statement->fetchAll(PDO::FETCH_CLASS, 'Travel');
    // return $statement->fetchAll(PDO::FETCH_CLASS, 'Travel');
}   
 ?>