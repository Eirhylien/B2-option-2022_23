<?php
    require_once("../../class/db.php");
    require_once("../../class/Jeux.php");
    require_once("../../class/FDJ.php");
    $db = new Database();
    //need an object jeux
    $fdj = $db->getFdjByJeux($Jeux);
    $jsonData = json_encode($fdj);
    echo($jsonData);
?>