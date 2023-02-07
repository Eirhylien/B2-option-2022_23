<?php
    //require("CrudUser.php");
    require("../class/User.php");
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


    <h1> TEST CONNEXION DB</h1>
    


    inscription text
    <form method="post" action="./inscription.php">
        <div class="form-user">
            <input class="user" name="user" placeholder="Nom">
        </div>
        <div class="form-mdp">
            <input class="prenom" name="prenom" placeholder="Prenom">
        </div>
        <div class="form-mdp">
            <input class="email" name="email" placeholder="email">
        </div>
        <div class="form-mdp">
            <input class="username" name="username" placeholder="Nom d'utilisateur">
        </div>
        <div class="form-mdp">
            <input class="mdp" name="mdp" placeholder="Mot de passe">
        </div>
        <div class="button-valider-div">
            <button class="button-valider" type="submit">Valider</button>
        </div>
    </form>
</body>

</html>