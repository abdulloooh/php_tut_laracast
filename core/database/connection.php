<?php

class Connection{
    public function connect_db($config){
       try{
        return new PDO(
            $config['connection'].";dbname=".$config['dbname'],
            $config['username'],
            $config['password'],
            $config['options']
        );
       }
       catch (PDOException $e){
           die($e->getMessage());
       }
    }
}