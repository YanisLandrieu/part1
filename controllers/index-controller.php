<?php 
    // Vérification des données de login

/**
 * Fonction qui vérifie le mot de passe
 *
 * @return void
 */
    function verifyLogin() {
        include_once('../my-config.php');
        if(isset($_POST['login']) && isset($_POST['password'])) {
            if($_POST['login'] == $informationLogin['login'] && $_POST['password'] == $informationLogin['mdp']){
                createSession($_POST['login'], $_POST['password']);
                header("location: http://part1.test/controllers/dashboard-controller.php");
            }
            else{
                header("Location: http://part1.test");
            }
        }
    }

/**
 * Fonction qui créer la session en récupérant le nom d'utilisateur et le mot de passe
 *
 * @param [type] $username
 * @param [type] $password
 * @return void
 */
    function createSession($username, $password) {
        session_start();
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
    }

    verifyLogin();
?>