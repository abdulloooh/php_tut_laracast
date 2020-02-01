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

    function insertUser($full,$user,$phone,$pass,$cpass,$table){
        $statement = $this->pdo->prepare("INSERT INTO {$table} (fullname,username,phone,pass,cpassword) VALUES(?,?,?,?,?)");
        return $statement->execute([$full,$user,$phone,$pass,$cpass]);
    }

    function selectLogin($user,$pass,$table){
        $statement = $this->pdo->prepare("Select * from {$table} where username = ? and pass = ?");
        $statement->execute([$user, $pass]);
        return $statement->rowCount();
        // return $statement->fetchAll(PDO::FETCH_CLASS);
    }
    function checkSignup($user,$phone,$table){
        $statement=$this->pdo->prepare("Select * from {$table} where username = ? or phone = ?");
        $statement->execute([$user,$phone]);
        return $statement->rowCount();
    }
}