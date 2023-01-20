<?php
session_start();
$username = $_SESSION['username'];


?>



<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bibliothèque</title>

    <!-- Import CSS -->
    <link rel="stylesheet" href="../../styles/style.css">

    <!-- Import Icons -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
</head>

<body></body>
<?php include("./composants/navigation.php") ?>

<nav>
    <div class="navigation">
        <div class="logo">ALEAS</div>
        <ul>
            <li><a href="#" class="nav-select">Accueil</a></li>
            <li><a href="#">Contact</a></li>
            <li><a href="#" class="btn-link">Ajouter un jeu</a></li>
            <li><a href="#"><i class="uil uil-user"></i></a></li>
            <a href="/php/pages/index_test.php">Inscription</a>
            <?php
                if (isset($_SESSION['username'])){
                    echo('<a href="/php/pages/deconnexion.php">Se deconnecter</a>');
                }
                else {
                    echo('<a href="/php/pages/connexion_page.php">Connexion</a>');
                }
                





                ?>
        </ul>
    </div>
</nav>
<?php
echo($username);


?>
</body>

</html>