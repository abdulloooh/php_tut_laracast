<?php
require 'functions.php';
$greeting = "Hello ".htmlspecialchars($_GET['name']);
 
$language = ['Javascript','Python','php'];   //to add an item to this array; $language[] = 'English'
// foreach($language as $lang){
//     if ($lang != 'php')
//     { echo $lang. ' , ';}
//     else{ echo $lang; }
// }
$likes = [    //to add an item to this associative array:       $likes['worship'] = 'sadaqah' , to edit: $likes['food'] =>'Fried egg'    to remove unset($likes['fruit])
    'language'=>'python',
    'food'=>'fried egg',
    'sport'=>'table tennis',
    'person'=>"Honestly don't know",
];  
//edit and add to an associative array
$likes['worship'] = 'sadaqah';
$likes['sport'] = 'football';
unset($likes['food']);
echo (var_dump($likes));
//preformatted

echo "<pre>";
    var_dump($language);
echo    "</pre>";
// die();

$todo=[
    'title'=>'learn react',
    'due date'=> '3 weeks time',
    'assigned to' => 'me',
    'what for' => 'My data website',
    'completed' => false,
    'started' => true,
    'trying hard' => false
];

//functions   /we can create a reusable function file
// function dd($to_dump){ // a dumping function
//     echo "<pre>";
//         die(var_dump($to_dump));
//     echo "</pre>";
// }
// dd('Hello World');
travel_abroad(30);
travel_abroad(18);
travel_abroad(9);
// dd([1,2,3,4]);

// require 'travel.php';
// $travel = array();
// foreach($travelData as $entity){
//     array_push($travel, new Travel($entity->age , $entity->description));
// }
// $travel = [
    //     new Travel(18, "Abdullah"),
    //     new Travel(20, "Yusuf"),
    //     new Travel(25, "Ibrahim"),
    //     new Travel(35, "Waliyy"),
    // ];
    // foreach($travel as $travel){
//     $travel->interview(true);
//     if($travel->response() == true){echo "Entry granted for {$travel->name}</br>";}
//     else {echo "Rejected for {$travel->name}</br>";}
// }
require 'database/connection.php';
require 'database/fetch.php';
$config = require 'config.php';
$db = Connection::connect_db($config['database']);
$travelData = new fetchContent($db);
$travelData = $travelData->fetch_all('table1');

require 'views\index.view.php';
?>
 
<!-- 
 $sth = array_map(funtion($task){
    $map = new Task($db); //create instance of the class Task
    $map->description = $task['description];
    $map->age = $task['age'];
 }, $tasks) -->