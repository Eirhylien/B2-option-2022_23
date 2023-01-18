<?php
    require_once("../class/db.php");
    require_once("../class/User.php");
    $db = new Database();
    $user = new User($__POST["user"],$__POST["prenom"],$__POST["username"],$__POST["email"],$__POST["mdp"],false);
    $db->InsertUser($user);
    echo "validé";
?>