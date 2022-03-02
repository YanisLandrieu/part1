<?php 

/**
 * Fonction qui affiche le nombre d'image necessaire
 *
 * @return void
 */
function buildGallery() {

    // On créer un tableau qui possède toute les images du dossier img
    $arrayImg = scandir("C:\Users\Utilisateur\Documents\GitHub\part1\img");
    // On retire les points du tableau
    $imgFolder = array_diff($arrayImg, array('..', '.'));
    // On utilise foreach pour afficher le nombre d'image existant
    foreach ($imgFolder as $value) {
        echo '<a class="example-image-link" href="../img/' . $value . '" data-lightbox="example-set" data-title="' . $value . '"><img class="example-image" height="100" width="100" src="../img/' . $value . '" alt="' . $value . '" /></a>';
    }
}
require_once('../views/gallery.php');
?>