<?php
    require_once("../class/db.php");
    require_once("../class/User.php");
    $db = new Database();
    $user = new User(1,$_POST["user"],$_POST["prenom"],$_POST["username"],$_POST["email"],$_POST["mdp"],false);
    if($db->IsExistEmail($user)){
        echo("utilisateurs déja présent");
    }
    else{
        $db->InsertUser($user);
        echo "validé";
    }
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>

    <!-- Import CSS -->
    <link rel="stylesheet" href="../../styles/style.css">

    <!-- Import Icons -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
</head>

<body></body>
<?php include("./composants/navigation.php") ?>
