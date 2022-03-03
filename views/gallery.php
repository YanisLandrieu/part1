<?php

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
    <!-- lightbox css -->
    <link href="../node_modules/lightbox2/dist/css/lightbox.min.css" rel="stylesheet" />
    <!-- lightbox js -->
    <script src="../node_modules/lightbox2/dist/js/lightbox-plus-jquery.js" async></script>
    <title>allPIX</title>
</head>

<body>
    <div class="wrapper">
        <div class="text-center mt-4 name">
            <p class="titre">allPix</p>
            <p>Bonjour, <?= $_SESSION['username']; ?></p>
        </div>
        <div class="text-center mt-4 name" style="background-color: white; width: 90%; height: auto; margin-left: 15px;">
            <?= buildGallery(); ?>
        </div>
        <br><a style="text-decoration: none; color:white; margin-left: 105px;" class="text-center mt-4" href="http://part1.test/controllers/dashboard-controller.php">Dashboard</a>
    </div>
</body>


</html>