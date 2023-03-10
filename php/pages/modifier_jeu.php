<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un jeu</title>

    <!-- Import CSS -->
    <link rel="stylesheet" href="../../styles/style.css">

    <!-- Import Icons -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
</head>

<body>
    <?php include("./composants/navigation.php") ?>
    <main>
        <h1 class="title-lister">Modifier ton jeu</h1>
        <?php include("./composants/form_add_jeu.php") ?>
        <div class="block-add-btn">
            <a href="#">Modifier</a>
        </div>
    </main>
    <?php include("./composants/footer.php") ?>
</body>

</html>