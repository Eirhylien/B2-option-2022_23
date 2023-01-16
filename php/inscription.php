<?php
require("CrudUser.php");
$userArr=array("email"->$__POST["email"],"nom"->$__POST["user"],"prenom"->$__POST["prenom"],"username"->$__POST["username"],"mdp"->$__POST["mdp"],"etablissement"->false);
$user=(object)$userArr;
InsertUser($user);
echo "validé";








?>