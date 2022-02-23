<?php

if (isset($_FILES['fileToUpload']) && $_FILES['fileToUpload']['error'] == 0) {
     /* rename("./img/" . $_FILES['fileToUpload']['name'], "./img/" . uniqid() . ".PNG"); */
    $tmp = $_FILES['fileToUpload']['tmp_name'];
    $filename = $_FILES['fileToUpload']['name'];
    // droit min sur le dossier img 733 (rwx-wx-wx)
    $dest = 'img/';

}

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- css -->
    <link rel="stylesheet" href="./assets/uploadPreview.css">
    <!-- js -->
    <script src="./assets/uploadPreview.js" async></script>
    <!-- bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Modules d'enregistrement d'image</title>
</head>

<body>
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4">Module d'enregistrement d'images.</h1>
            <p class="lead">Mise en pratique PHP : Upload d'images </p>
        </div>
    </div>
    <div style="margin-left: 15px;" ><?php // à faire lorsque que "tous" les risquesont été évalués
            if (move_uploaded_file($tmp, $dest . uniqid().".PNG"))
                echo 'téléchargement réussi'; ?>
    </div>
    <label style="margin-left: 15px;" for="fileToUpload">Veuillez choisir une image :</label>
    <img id="imgPreview">
    <form action="" method="post" enctype="multipart/form-data" style="margin-left: 15px;">
        <input type="file" name="fileToUpload" id="fileToUpload"><br>
        <br><button type="submit" style="background-color: black; color:white" class="btn btn-secondary btn-sm">Upload</button>
    </form>
</body>

</html>