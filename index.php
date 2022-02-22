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
    <img id="imgPreview">
    <form action="" method="post" enctype="multipart/form-data">
        <input type="file" name="fileToUpload" id="fileToUpload"><br>
        <button type="submit">Upload</button>
    </form>
</body>
</html>