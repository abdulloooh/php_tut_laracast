<?php

class Post{
    public $description;
    public $completed;
    function __construct($desc,$comp){
        $this->description = $desc;
        $this->completed = $comp;
    }
}

$arr = [
    new Post('hardwork', true),
    new Post('smartwork', true),
    new Post('greatwork', true),
    new Post('crazework', false),
    new Post('softwork', false)
];

$trues = array_filter($arr, function($ar){
    return ($ar->completed == true);
});
// var_dump($trues);

//let us alter the values of the array
// foreach($arr as $ar){  //foreach suffices here thou array_map can still be used
//     $ar->completed = true;
// }

//  array_map(function($ar){
//     return $ar->completed = true;  //just as foreach above, it alters arr array
// }, $arr);

//but best use case for array_map is if like trying to change the data type of the arrays e.g.
// $modified = array_map(function($ar){
//     return (array)$ar;
//     // return ['title'=>$ar->description];
// },$arr);
// var_dump($modified);

//array_column
$title = array_column($arr, 'description');
var_dump($title);