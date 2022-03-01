<?php
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