<?php

class Connection{    
    public static function connect_db($config){
        try{
            // return new PDO('mysql:host=127.0.0.1;dbname=php', 'root', '');
            //  echo "<h3>Database connection successful</h3>"; 
            return new PDO(
                $config['connection'].';dbname='.$config['dbname'],
                $config['user'],
                $config['password']
            );
        }
        catch(PDOExeption $e){
        
            }
    }
}
?>
