<?php
include_once('../my-config.php');
session_start();


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
            <p>Quota : <?= $informationLogin['quota']; ?> / 50000 ko</p>
            <p>Total image(s) : <?= $informationLogin['formule']; ?></p>
        </div>
        <form action="http://part1.test/controllers/dashboard-controller.php" method="post" enctype="multipart/form-data">
            <input style="margin-left: 40px;" type="file" name="fileToUpload" id="fileToUpload">
            <button type="submit" class="btn ">Upload</button>
        </form>
        <p style="margin-left: 90px;">vos message icI</p>
        <p style="margin-left: 90px;">- upload ok</p>
        <p style="margin-left: 90px;">- upload ok</p>
        <a href="http://part1.test/views/gallery.php">
            <button style="margin-left: 90px;" type="submit" class="btn ">Gallery</button><br>
        </a>
        <br><a style="text-decoration: none; color:white; margin-left: 95px;" class="text-center mt-4" href="http://part1.test">Déconnexion</a>
    </div>
</body>

</html>