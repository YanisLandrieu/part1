<?php
/**
 * Fonction qui vérifie l'image envoyer par l'utilisateur
 *
 * @return void
 */

function uploadImg() {
    include('../my-config.php');
    $imgError = 'Tout va bien';
    // On vérifie si $_FILES est définie ou si il n'y a pas d'erreur
    if (isset($_FILES['fileToUpload']) && $_FILES['fileToUpload']['error'] == 0) {
        $tmp = $_FILES['fileToUpload']['tmp_name'];
        $filename = $_FILES['fileToUpload']['name'];
        
        $dest = '../img/';
        $extensions_valides = array('jpg', 'jpeg', 'png');
        $filename = strtolower($filename);
        $fileExtension = explode(".", $filename);
        $uniqidImg = uniqid() . ".png";

        // On vérifie si l'extension de l'image est valide
        if (in_array($fileExtension[1], $extensions_valides)) {
            $imgError = 'Upload effectué avec succès !';

            // On vérifie si la taille de l'image est plus lourde que l'espace restant
            if(!(getFileSize() < $photoMaxSize - TailleDossier("../img"))) {
                $imgError = 'l\'image est trop lourde';
                require_once("../views/dashbord.php");
            }
            elseif (move_uploaded_file($tmp, $dest . $uniqidImg)){

                // On ajoute la taille de l'image au quota
                $informationLogin['quota'] = $Taille;

                require_once("../views/dashbord.php");
            }
        } // Sinon on renvoie un message d'erreur
        else {
            $imgError = 'Extension incorrecte. Vous ne pouvez utiliser comme image uniquement des fichiers jpg, jpeg ou png';
            require_once("../views/dashbord.php");
        }
    } // Sinon on ne fait rien
    else{
        require_once("../views/dashbord.php");
    }
}
/**
 * Fonction qui calcule la taille du dossier img
 *
 * @param [type] $Rep
 * @return int
 */
function TailleDossier($Rep)
    {
        $Racine=opendir($Rep);
        $Taille=0;
        while($Dossier = readdir($Racine))
        {
          if ( $Dossier != '..' And $Dossier !='.' )
          {
            //Ajoute la taille du sous dossier
            if(is_dir($Rep.'/'.$Dossier)) $Taille += TailleDossier($Rep.'/'.$Dossier);
            //Ajoute la taille du fichier
            else $Taille += filesize($Rep.'/'.$Dossier);

          }
        }
        closedir($Racine);
        return $Taille;
    }
// var_dump(TailleDossier("../img"));

/**
 * Fonction qui calcule le nombre d'image totale dans le fichier img
 *
 * @return int
 */
function getNumberImg() {
    $nbImg = 0;
    // On créer un tableau qui possède toute les images du dossier img
    $arrayImg = scandir("C:\Users\Utilisateur\Documents\GitHub\part1\img");
    // On retire les points du tableau
    $imgFolder = array_diff($arrayImg, array('..', '.'));
    // On utilise foreach pour compter le nombre de fichier existant
    foreach ($imgFolder as $value) {
        $nbImg++;
    } 
    $informationLogin['formule'] = $nbImg;
    return $nbImg;
}

/**
 * Récupère la taille d'une image
 *
 * @return int
 */

function getFileSize() {
    return $_FILES['fileToUpload']['size'];
}
// if(isset($_SESSION['username'])){
    uploadImg();
// } else {
    // header("Location: http://part1.test");
// }

?>