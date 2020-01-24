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
 ?>