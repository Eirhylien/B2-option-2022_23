<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>

    <!-- Import CSS -->
    <link rel="stylesheet" href="../../styles/style.css">

    <!-- Import Icons -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
</head>

<body>
    <?php include("./composants/navigation.php") ?>
    <main>
        <div class="contact-block">
            <h1 class="subtitle-contact">Besoin d’un renseignement ?</h1>
            <p class="title-contact">NOUS CONTACTER</p>
            <p class="header-formulaire">Rien de plus simple,
                <br /> remplissez ce formulaire 👋
            </p>
            <div class="block-form">
                <form>
                    <div class="flex-form">
                        <div class="input-label nom">
                            <label for="fname">Votre Prénom:</label>
                            <input type="text" id="fname" name="fname">
                        </div>
                        <div class="input-label mail">
                            <label for="lname">Votre Mail</label>
                            <input type="text" id="lname" name="lname">
                        </div>
                    </div>
                    <div class="input-label message">
                        <label for="message">Message</label>
                        <textarea id="message" rows="15" name="message"></textarea>
                    </div>
                    <button type="submit" class="btn-form">
                        Envoyer le message
                        <img src="../../images/arrow-long-right.png" alt="">
                    </button>
                </form>
            </div>
        </div>
    </main>
    <?php include("./composants/footer.php") ?>
</body>

</html>