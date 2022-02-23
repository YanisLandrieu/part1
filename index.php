<?php 

if(isset($_FILES['fileToUpload']) && $_FILES['fileToUpload']['error'] ==0){
    rename("./img/" . $_FILES['fileToUpload']['name'], "./img/" . uniqid().".PNG");
    $tmp = $_FILES['fileToUpload']['tmp_name'];
    $filename = $_FILES['fileToUpload']['name'];
    // droit min sur le dossier img 733 (rwx-wx-wx)
    $dest = 'img/';
    // à faire lorsque que "tous" les risquesont été évalués
    if(move_uploaded_file($tmp, $dest . $filename))
        echo 'téléchargement réussi';   
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
    <title>Modules d'enregistrement d'image</title>
</head>
<body>
    <label for="fileToUpload">Veuillez choisir une image :</label>
    <img id="imgPreview">
    <form action="" method="post" enctype="multipart/form-data">
        <input type="file" name="fileToUpload" id="fileToUpload"><br>
        <button type="submit">Upload</button>
    </form>
</body>
</html>