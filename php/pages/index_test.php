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
    <?php
        try {
            $db = new PDO('mysql:host=db5011603677.hosting-data.io:3306;dbname=dbs9782335;', 'dbu913389', 'NsU2iLPyJ5kRM4h');
            //select user
            $valeurs = false;
            $converted_res = $valeurs ? 'true' : 'false';
            echo ($converted_res);
            $user = new User(1, "user", "prenom", "username", "email", "mdp", $converted_res);

            $sqlQuery = "INSERT INTO user (email,nom,prenom,username,mdp,etablissement) VALUES ('" . $user->email . "','" . $user->nom . "','" . $user->prenom . "','" . $user->username . "','" . $user->mdp . "'," . $user->etablissement . ")";
            echo ($sqlQuery);
            $usersStatement = $db->prepare($sqlQuery);
            $usersStatement->execute();
        } catch (PDOException $e) {
            print "Il y a une erreur ici, j'ai rajouté des trucs pour ne plus avoir l'erreur et voir à la correction après";
        }
    ?>


    inscription text
    <form method="post" action="inscription.php">
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