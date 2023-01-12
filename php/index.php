<?php
    require("CrudUser.php");
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bibliothèque</title>
</head>

<body>
    <?php

    echo test();
    $users=GetUsers();
    foreach ($users as $user) {
            ?>

    <p>Utilisateur: <?php echo $user['nom']. " " .$user['prenom']; ?></p>

    <?php
        }
    $newUserArr = array("email"=>"testInsert", "nom"=>"marc", "prenom"=>"balavoine","username"=>"balmar","mdp"=>"test3","etablissement"=>"false");
    $newUser=(object)$newUserArr;
    InsertUser($newUser);
    $id=2;
    UpdateUser($id,$newUser);
    $idd=1;
    DeleteUser($idd);


    
    ?>
</body>

</html>