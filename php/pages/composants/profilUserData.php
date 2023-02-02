<?php
    require_once("../../class/db.php");
    require_once("../../class/Jeux.php");
    require_once("../../class/User.php");
    $db = new Database();
    //need a user with an id
    $user = $db->getUserById($user);
    $jsonData = json_encode($user);
    echo($jsonData);
    
?>