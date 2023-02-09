<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails</title>

    <!-- Import CSS -->
    <link rel="stylesheet" href="../../styles/style.css">

    <!-- Import Icons -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
</head>

<body>
    <?php include("./composants/navigation.php") ?>
    <main>
        <div class="details-jeux">
            <div class="slide-jeux">
                <div class="slider">
                    <div class="myslider" style="display: block;">
                        <div class="slider_details">
                            <div class="desc-details">
                                <p class="slider_title">Jeux de plateau</p>
                                <p class="slider_nom">Blanc Manger Coco</p>
                                <p class="slider_dispo">Disponible</p>
                            </div>
                            <a href="#" class="slide_btn">Louer</a>
                        </div>
                        <img src="../../images/img_grid_3.png" class="slider_img" alt="">
                    </div>

                    <div class="myslider">
                        <div class="slider_details">
                            <div class="desc-details">
                                <p class="slider_title">Jeux de plateau</p>
                                <p class="slider_nom">Blanc Manger Coco</p>
                                <p class="slider_dispo">Disponible</p>
                            </div>
                            <a href="#" class="slide_btn">Louer</a>
                        </div>
                        <img src="../../images/img_grid_3.png" class="slider_img" alt="">
                    </div>

                    <div class="myslider">
                        <div class="slider_details">
                            <div class="desc-details">
                                <p class="slider_title">Jeux de plateau</p>
                                <p class="slider_nom">Blanc Manger Coco</p>
                                <p class="slider_dispo">Disponible</p>
                            </div>
                            <a href="#" class="slide_btn">Louer</a>
                        </div>
                        <img src="../../images/img_grid_3.png" class="slider_img" alt="">
                    </div>

                    <div class="myslider">
                        <div class="slider_details">
                            <div class="desc-details">
                                <p class="slider_title">Jeux de plateau</p>
                                <p class="slider_nom">Blanc Manger Coco</p>
                                <p class="slider_dispo">Disponible</p>
                            </div>
                            <a href="#" class="slide_btn">Louer</a>
                        </div>
                        <img src="../../images/img_grid_3.png" class="slider_img" alt="">
                    </div>

                    <div class="navigation_slider_position">
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
                </div>
            </div>
            <div class="desc-jeux">
                <div class="description">
                    <p class="title-desc">C’est quoi ?</p>
                    <p class="texte-desc">Le principe de Blanc-manger Coco est très simple:</p>
                    <p class="texte-desc">
                        chaque joueur reçoit 11 cartes réponses pour commencer
                        un premier joueur (le « Question Master ») lit une carte question (texte à trou) prise dans la
                        pioche
                        les autres joueurs choisissent une de leurs cartes réponse et la posent face retournée sur la
                        table
                        le Question Master mélange les cartes réponses puis relit la carte question avec chaque carte
                        réponse. Il choisit la meilleure selon ses propres critères</p>
                </div>
                <div class="bon-savoir">
                    <p class="title-savoir">Bon à savoir</p>
                    <p class="desc-savoir">Ce jeu n’est pas conseillé à un public jeune.</p>
                </div>
                <div class="dispo-details-block">
                    <div class="title-dispo">Disponibilité</div>
                    <div class="block-etat">
                        <img src="../../images/verifier.png" alt="">
                        <div class="details-etat">
                            <p class="subtitle-etat">Satisfaisant</p>
                            <p class="texte-etat">4 cartes Déchirées</p>
                        </div>
                    </div>
                </div>
                <div class="block-lookbook">
                    <img src="../../images/lookbook.png" alt="">
                </div>
            </div>
        </div>
    </main>
    <?php include("./composants/footer.php") ?>
    <script src="../../js/slider.js"></script>
</body>

</html>