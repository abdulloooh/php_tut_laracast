<?php
class fetchContent{
    protected $db;
    function __construct($db){
        $this->db = $db;
    }
    function fetch_all($table){
        $statement = $this->db->prepare("select * from {$table}");
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_CLASS, 'Travel');
    // return $statement->fetchAll(PDO::FETCH_CLASS, 'Travel');
    }   
    }
?>