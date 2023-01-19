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

<body>
    <?php include("./composants/navigation.php") ?>
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
    <script src="../../js/slider.js"></script>
</body>

</html>