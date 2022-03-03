<?php
function isLogged() {
    include('../my-config.php');
    if (!isset($_SESSION)) {
        session_start();
    }
    if (isset($_SESSION['username']) && isset($_SESSION['password'])) {
        if ($_SESSION['username'] == $informationLogin['login'] && hash_equals($_SESSION['password'], hash('md5',$informationLogin['mdp']))) {
            // echo 'if true';
            $logged = true;
        }
        else {
            // echo '2eme if false';
            $logged = false;
        }
    }
    else {
        // echo '1er if false';
        $logged = false;
    }
    return $logged;
}
?>