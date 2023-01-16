<?php
require("CrudUser.php");
$userArr=array("email"->$_POST["email"],"nom"->$_POST["user"],"prenom"->$_POST["prenom"],"username"->$_POST["username"],"mdp"->$_POST["mdp"],"etablissement"->false);
$user=(object)$userArr;
InsertUser($user);
echo "validé";








?>