<?php
class Travel{
    public $age;
    public $description;
    protected $pass_interview = false;
    // public function __construct($age, $name){
    //     $this->age  = $age;
    //     $this->name = $name;
    // }
    public function interview($result){
        $this->pass_interview = $result;
    }
    private function check(){
        if ($this->pass_interview == true and $this->age > 20){
            return true;
        }
        else{return false;}
    } 
    public function response(){
        if ($this->check() == true){return true;}
        else{return false;}
    }   
}


?>