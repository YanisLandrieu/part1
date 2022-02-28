<?php 
    include_once 'my-config.php';

    // Vérification des données de login

    // var_dump($_POST);
    // var_dump($informationLogin);
    echo $informationLogin['mdp'];

    // function verifyLogin() {
        if((isset($_POST['login'])) && (isset($_POST['password']))) {
            if(($_POST['login'] == $informationLogin['login']) && ($_POST['password'] == $informationLogin['mdp'])){
                echo 'correct';
            }
            else {
                if(!($_POST['password'] == $informationLogin['mdp'])){
                    echo 'password incorrect';
                }
                if(!($_POST['login'] == $informationLogin['login'])){
                    echo 'login incorrect';
                }
            }   
        }
        else {
            echo 'fail 1';
        }
    // }
?>