<?php
    $port = '3308';
    $host = '127.0.0.1';
    $dbname = 'testdb';
    
    $dsn = 'mysql:host='.$host.';dbname='.$dbname.';port='.$port.';charset=utf8mb4';
    try {
     
        $pdo = new PDO($dsn, 'root' , '');
        
        }
        catch (PDOException $exception) {
         
         echo($exception->getMessage());
         
        }
    
?>