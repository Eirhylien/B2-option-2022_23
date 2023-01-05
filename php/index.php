<?php
    require_once("connection.php");
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
        $sqlQuery = "SELECT * FROM `ethan`";
        $usersStatement = $pdo->prepare($sqlQuery);
        $usersStatement->execute();
        $users = $usersStatement->fetchAll();

        echo "<table>";
        echo "";
        echo "</table>";

        foreach ($users as $user) {
            ?>

    <p>Utilisateur: <?php echo $user['name']. " " .$user['libelle']; ?></p>

    <?php
        }
    ?>
</body>

</html>