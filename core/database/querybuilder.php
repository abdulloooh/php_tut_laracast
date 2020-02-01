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

    function insertUser($table, $parameters){   //dynamically insert table
        // die(var_dump( ':' .implode(', :', array_keys($parameters))));
        $sql = sprintf("INSERT INTO %s (%s) VALUES(%s)",
            $table,
            implode(', ',array_keys($parameters)), 
            ':' .implode(', :', array_keys($parameters))
        );
        $statement = $this->pdo->prepare($sql);
        return $statement->execute($parameters);
    }

    function check($table,$relation, $parameters){ //relations: a "or" b to confirm if user already reg, a "and" b to confirm login data=>a:username,b=>password or phone
        $sql = sprintf("Select * from %s where %s = ? {$relation} %s = ?", 
            $table,array_keys($parameters)[0],
            array_keys($parameters)[1]
        );
        $statement = $this->pdo->prepare($sql);
        $statement->execute(array_values($parameters));
        return [$statement->rowCount(), $statement->fetchAll(PDO::FETCH_CLASS)];  //row count and the content itself
        // return $statement->fetchAll(PDO::FETCH_CLASS);
    }
    // function checkSignup($user,$phone,$table){
    //     $statement=$this->pdo->prepare("Select * from {$table} where username = ? or phone = ?");
    //     $statement->execute([$user,$phone]);
    //     return $statement->rowCount();
    // }
}