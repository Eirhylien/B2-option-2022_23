<?php
    require_once("./class/db.php");
    $db = new Database();
    $userArr = array("email"=>$__POST["email"],"nom"=>$__POST["user"],"prenom"=>$__POST["prenom"],"username"=>$__POST["username"],"mdp"=>$__POST["mdp"],"etablissement"=>false);
    $user = (object)$userArr;
    $db->InsertUser($user);
    echo "validé";
?>