<?php
include_once('../my-config.php');
session_start();

// On définie la timezone en France
date_default_timezone_set('Europe/Paris');
// Tableau des jours de la semaine en français
$DaysName = [1 =>'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche'];
$currDay = $DaysName[date('N')];
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- css -->
    <link rel="stylesheet" href="../style.css">
    <!-- js -->
    <script src="./assets/script.js"></script>
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>allPIX</title>
</head>

<body>
    <div class="wrapper">
        <div class="text-center mt-4 name">
            <p class="titre">allPix</p>
            <p>Bonjour, <?= $_SESSION['username']; ?></p>
        </div>
        <div class="text-center mt-3 name">
            <p>Quota : <?= TailleDossier("../img"); ?> Mo/50 Mo</p>
            <p>Total image(s) : <?= getNumberImg(); ?></p>
            <p style="margin-left: -65px;"><?= $currDay, date(" d/m/y H:i:s");  ?></p>
        </div>
        <form action="http://part1.test/controllers/dashboard-controller.php" method="post" enctype="multipart/form-data">
            <input style="margin-left: 40px;" type="file" name="fileToUpload" id="fileToUpload">
            <button type="submit" class="btn ">Upload</button>
        </form>
        <p style="margin-left: 70px;"><?= $imgError ?></p>
        <a href="http://part1.test/controllers/gallery-controller.php">
            <button style="margin-left: 90px;" type="submit" class="btn ">Gallery</button><br>
        </a>
        <br><a style="text-decoration: none; color:white; margin-left: 95px;" class="text-center mt-4" href="http://part1.test">Déconnexion</a>
    </div>
</body>

</html>