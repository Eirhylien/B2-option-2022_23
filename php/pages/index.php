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
<main>
    <div class="slider">
        <div class="myslider" style="display: block;">
            <div class="slider_details">
                <p class="slider_title">Jeux de plateau</p>
                <p class="slider_nom">Monopoly</p>
                <p class="slider_dispo">Disponible</p>
                <a href="#" class="slider_btn">Louer</a>
            </div>
            <img src="../../images/mr_mono.png" class="slider_img" alt="">
        </div>

        <div class="myslider" style="display: block;">
            <div class="slider_details">
                <p class="slider_title">Jeux de plateau</p>
                <p class="slider_nom">Monopoly</p>
                <p class="slider_dispo">Disponible</p>
                <a href="#" class="slider_btn">Louer</a>
            </div>
            <img src="../../images/mr_mono.png" class="slider_img" alt="">
        </div>

        <div class="myslider" style="display: block;">
            <div class="slider_details">
                <p class="slider_title">Jeux de plateau</p>
                <p class="slider_nom">Monopoly</p>
                <p class="slider_dispo">Disponible</p>
                <a href="#" class="slider_btn">Louer</a>
            </div>
            <img src="../../images/mr_mono.png" class="slider_img" alt="">
        </div>

        <div class="myslider" style="display: block;">
            <div class="slider_details">
                <p class="slider_title">Jeux de plateau</p>
                <p class="slider_nom">Monopoly</p>
                <p class="slider_dispo">Disponible</p>
                <a href="#" class="slider_btn">Louer</a>
            </div>
            <img src="../../images/mr_mono.png" class="slider_img" alt="">
        </div>

        <div class="slider_logo">
            <img src="../../images/logo.png" alt="Logo de l'association">
        </div>

        <div class="navigation_slider">
            <a class="prev" onclick="plusSlides(-1)"><i class="uil uil-angle-left-b"></i></a>

            <div class="dotsbox">
                <span class="dot" onclick="currentSlide(1)"></span>
                <span class="dot" onclick="currentSlide(2)"></span>
                <span class="dot" onclick="currentSlide(3)"></span>
                <span class="dot" onclick="currentSlide(4)"></span>
            </div>

            <a class="next" onclick="plusSlides(1)"><i class="uil uil-angle-right-b"></i></a>
        </div>
    </div>
    <div class="grid-jeux">
        <h1><span>Jouer ?</span> C'est si simple</h1>
        <div class="grid-container">
            <div class="grid-item item-1">
                <p class="title">Uno</p>
                <img src="../../images/img_grid_1.png" alt="">
                <a href="./detailsJeux.php" class="btn-details-jeu">
                    <p>Détails</p>
                    <i class="uil uil-arrow-right"></i>
                </a>
            </div>
            <div class="grid-item item-2">
                <p class="title">Dobble</p>
                <img src="../../images/img_grid_2.png" alt="">
                <a href="./detailsJeux.php" class="btn-details-jeu">
                    <p>Détails</p>
                    <i class="uil uil-arrow-right"></i>
                </a>

            </div>
            <div class="grid-item item-3">
                <p class="title">Blanc Manger Coco</p>
                <img src="../../images/img_grid_3.png" alt="">
                <a href="./detailsJeux.php" class="btn-details-jeu">
                    <p>Détails</p>
                    <i class="uil uil-arrow-right"></i>
                </a>
            </div>
            <div class="grid-item item-4">
                <p class="title">Bonne Paye</p>
                <div class="long-part-placement">
                    <img src="../../images/img_grid_4.png" alt="">
                    <a href="./detailsJeux.php" class="long-btn-details-jeu">
                        <p>Détails</p>
                        <i class="uil uil-arrow-right"></i>
                    </a>
                </div>
            </div>
            <div class="grid-item item-5">
                <p class="title">Bataille</p>
                <img src="../../images/img_grid_5.png" alt="">
                <a href="./detailsJeux.php" class="btn-details-jeu">
                    <p>Détails</p>
                    <i class="uil uil-arrow-right"></i>
                </a>
            </div>
            <div class="grid-item item-6">
                <p class="title">Domino</p>
                <img src="../../images/img_grid_6.png" alt="">
                <a href="./detailsJeux.php" class="btn-details-jeu">
                    <p>Détails</p>
                    <i class="uil uil-arrow-right"></i>
                </a>
            </div>
            <div class="grid-item item-7">
                <p class="title">Destin</p>
                <div class="long-part-placement">
                    <img src="../../images/img_grid_7.png" alt="">
                    <a href="./detailsJeux.php" class="long-btn-details-jeu">
                        <p>Détails</p>
                        <i class="uil uil-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="btn-grid"><a href="#">Voir plus</a></div>
</main>
<?php include("./composants/footer.php") ?>
<script src="../../js/slider.js"></script>
<!-- <nav>
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
?> -->
</body>

</html>