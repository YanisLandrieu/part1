<?php 


?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- css -->
    <link rel="stylesheet" href="./style.css">
    <!-- js -->
    <script src="./assets/script.js"></script>
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>allPIX</title>
</head>

<body>
    <div class="wrapper">
        <div class="text-center mt-4 name"> allPIX </div>
        <form method="POST" class="p-3 mt-3" action="./controllers/index-controller.php">
            <label for="login">Login</label>
            <div class="form-field d-flex align-items-center"> <span class="far fa-user"></span> <input type="text" name="login" id="login" class="<?= ($_POST['login'] == $informationLogin['login']) ? 'correct' : 'incorrect'; ?>"></div>
            <label for="pwd">Password</label>
            <div class="form-field d-flex align-items-center"> <span class="fas fa-key"></span> <input type="password" name="password" id="pwd"  class="<?= ($_POST['password'] == $informationLogin['mdp']) ? 'correct' : 'incorrect'; ?>"></div><br>
            <button type="submit" class="btn mt-3">Connexion</button>
        </form>
        </div>
</body>

</html>