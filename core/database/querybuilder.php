<?php

class Querybuilder{
    protected $pdo;
    function __construct($pdo){
        $this->pdo = $pdo;
    }

     function fetch_all($table){
        $statement = $this->pdo->prepare("select * from {$table}");
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_CLASS);

    }
}