<?php
    require_once("../../class/db.php");
    require_once("../../class/Jeux.php");
    require_once("../../class/FDJ.php");
    $db = new Database();
    $listeJeux = $db->getJeuxALL();
    $jsonData = json_encode($listeJeux);
    print_r($jsonData);


    
?>