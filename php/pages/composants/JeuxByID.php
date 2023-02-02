<?php
    require_once("../../class/db.php");
    require_once("../../class/Jeux.php");
    $db = new Database();
    //need an object jeux
    $jeu = $db->getJeuxByID($Jeux);
    $jsonData = json_encode($jeu);
    echo($jsonData);
?>