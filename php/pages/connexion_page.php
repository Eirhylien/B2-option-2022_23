<?php
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
<a href="/php/pages/index.php">back </a>

   conexion text
   <form method="post" action="connexion.php" >
        <div class="form-mdp">
            <input class="email" name="email" placeholder="email">
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