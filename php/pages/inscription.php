<?php
    require_once("../class/db.php");
    require_once("../class/User.php");
    $db = new Database();
    $user = new User($_POST["user"],$_POST["prenom"],$_POST["username"],$_POST["email"],$_POST["mdp"],false);
    if($db->getUsersByEmail($user)){
        echo("utilisateurs déja présent");
    }
    else{
        $db->InsertUser($user);
        echo "validé";
    }
    
    
?>