<?php
    $port = '3308';
    $host = '127.0.0.1';
    $dbname = 'ludotechalea';
    $pdo;
    
    $dsn = 'mysql:host='.$host.';dbname='.$dbname.';port='.$port.';charset=utf8mb4';
    try {
     
        $pdo = new PDO($dsn, 'root' , '');
        echo "<script>console.log('test try' );</script>";
        
        }
        catch (PDOException $exception) {
         
         echo($exception->getMessage());
         
        }
        echo "<script>console.log('Debug Objects: good' );</script>";
    
?>