<?php
    require_once("../../class/db.php");
    require_once("../../class/Jeux.php");
    $db = new Database();
    $listeJeux = $db->getJeuxALL();
    $jsonData = json_encode($listeJeux);
    echo($jsonData);
    
?>