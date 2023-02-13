<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>

    <!-- Import CSS -->
    <link rel="stylesheet" href="../../styles/style.css">

    <!-- Import Icons -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
</head>

<body>
    <?php include("./composants/navigation.php") ?>
    <main class="profile">
        <div class="banner-profile">
            <img src="../../images/banner.png" alt="">
        </div>
        <div class="profile-details">
            <div class="card-user-profile">
                <img src="../../images/DBProfile.png" alt="Photo de profile">
                <div class="name-user">Denis Brogniart</div>
                <div class="mail-user">
                    <i class="uil uil-envelope"></i>
                    <p>denis.lebrowni@x.com</p>
                </div>
                <div class="pays-user">
                    <i class="uil uil-globe"></i>
                    <p>France</p>
                </div>
                <div class="ville-user">
                    <i class="uil uil-map-marker"></i>
                    <p>Vannes</p>
                </div>
            </div>
            <div class="card-user-details">
                <div class="card-about-user">
                    <div class="title-card-about">À Propos</div>
                    <div class="card-about-details">
                        <p class="subtitle-card-user">À propos :</p>
                        <p class="desc-card-user">Bonjour, je m’appelle Denis, reconverti après mes nombreux passage à
                            la télé, je souhaite maintenant passer mon temps à jouer à des jeux de sociétés, pour
                            profiter du temps, et m’amuser avec mes amis</p>
                    </div>
                    <div class="card-about-details">
                        <p class="subtitle-card-user">Style de jeux :</p>
                        <div class="desc-card-user-list">
                            <p>Carte</p>
                            <p>Plateaux</p>
                            <p>Stratégie</p>
                        </div>
                    </div>
                    <div class="card-about-details">
                        <p class="subtitle-card-user">Fréquentation :</p>
                        <p class="desc-card-user">Habitué</p>
                    </div>
                    <div class="card-about-details">
                        <p class="subtitle-card-user">Actif depuis :</p>
                        <p class="desc-card-user">6 mois</p>
                    </div>
                    <div class="card-about-details">
                        <p class="subtitle-card-user">Rôle :</p>
                        <p class="desc-card-user">Adhérant</p>
                    </div>
                    <div class="card-about-details">
                        <p class="subtitle-card-user">Bio :</p>
                        <p class="desc-card-user">Adepte des jeux de cartes et de plateaux, je serais partager mon
                            univers, et vous faire découvrir de très nombreux jeux. Si vous chercher des jeux innovants,
                            et peu connu du public, n’hésitez pas à chercher dans ma bibliothèque.</p>
                    </div>
                </div>
                <div class="card-bibli-user">
                    <div class="title-bibli-about">En bibliothèque</div>
                    <div class="block-bibli-jeu">
                        <div class="left-jeu">
                            <img src="../../images/mrmono.png" alt="">
                            <div class="left-jeu-desc">
                                <p class="title-left-jeu">Monopoly</p>
                                <p class="subtitle-left-jeu">Jeux de plateau</p>
                                <p class="dispo-left-jeu">Disponible</p>
                            </div>
                        </div>
                        <div class="right-jeu">
                            <img src="../../images/mrdoodle.png" alt="">
                            <div class="right-jeu-desc">
                                <p class="title-right-jeu">Dobble</p>
                                <p class="subtitle-right-jeu">Jeux de cartes</p>
                                <p class="dispo-right-jeu">Disponible</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php include("./composants/footer.php") ?>
</body>

</html>