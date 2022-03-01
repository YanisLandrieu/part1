<?php 
include_once('../my-config.php');
session_start();

/**
 * Fonction qui vérifie l'image envoyer par l'utilisateur
 *
 * @return void
 */
function uploadImg() {
    include_once('../my-config.php');
    if (isset($_FILES['fileToUpload']) && $_FILES['fileToUpload']['error'] == 0) {
        $tmp = $_FILES['fileToUpload']['tmp_name'];
        $filename = $_FILES['fileToUpload']['name'];
        // droit min sur le dossier img 733 (rwx-wx-wx)
        $dest = 'img/';
        $extensions_valides = array('jpg', 'jpeg', 'png');
        $filename = strtolower($filename);
        $fileExtension = explode(".", $filename);
        if(!(getFileSize() <= $informationLogin['quota'])){
            echo 'l\'image est trop lourde';
        }
        if (in_array($fileExtension, $extensions_valides)) {
            echo 'Upload effectué avec succès !';
        } else {
            echo 'Extension incorrecte. Vous ne pouvez utiliser comme image uniquement des fichiers jpg, jpeg ou png';
        }
    }

    if (move_uploaded_file($tmp, $dest . uniqid() . ".PNG"))
        echo 'téléchargement réussi'; 
}

function getFileSize() {
    return $_FILES['fileToUpload']['size'];
}

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- css -->
    <link rel="stylesheet" href="../assets/style.css">
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
            <p>Quota : <?= $informationLogin['quota']; ?> / 50 Mo</p>
            <p>Total image(s) : <?= $informationLogin['formule']; ?></p>
        </div>
        <form action="" method="post" enctype="multipart/form-data">
            <button type="submit" class="btn ">Upload</button>
            <input style="margin-left: 60px;" type="file" name="fileToUpload" id="fileToUpload">
        </form>
        <p style="margin-left: 90px;">vos message icI</p>
        <p style="margin-left: 90px;">- upload ok</p>
        <p style="margin-left: 90px;">- upload ok</p>
        <button style="margin-left: 90px;" type="submit" class="btn ">Gallery</button><br>
        <br><a style="text-decoration: none; color:white; margin-left: 105px;" class="text-center mt-4" href="http://part1.test">Déconnexion</a>
    </div>
</body>

</html>