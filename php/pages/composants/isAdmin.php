<?php
    require_once("../../class/db.php");
    require_once("../../class/Jeux.php");
    require_once("../../class/User.php");
    $db = new Database();
    //need a user with an id
    $user = $db->isAdmin($user);
    if ($user) {
        echo("yes");
    }
    else{
        echo("no");
    }

?>