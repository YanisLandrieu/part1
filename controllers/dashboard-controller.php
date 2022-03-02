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

        // On vérifie si l'extension de l'image est valide
        if (in_array($fileExtension[1], $extensions_valides)) {
            $imgError = 'Upload effectué avec succès !';

            // On vérifie si la taille de l'image est plus lourde que l'espace restant
            if(!(getFileSize() < 50000 - TailleDossier("../img"))) {
                $imgError = 'l\'image est trop lourde';
                require_once("../views/dashbord.php");
            }
            elseif (move_uploaded_file($tmp, $dest . uniqid() . ".png")){

                // On ajoute la taille de l'image au quota
                $informationLogin['quota'] = $informationLogin['quota'] + getFileSize();

                // On ajoute 1 au compteur d'image
                $informationLogin['formule'] = $informationLogin['formule'] + 1;
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
var_dump(TailleDossier("../img"));
/**
 * Récupère la taille d'une image
 *
 * @return int
 */

function getFileSize() {
    return $_FILES['fileToUpload']['size'];
}
if(isset($_SESSION['username'])){
    uploadImg();
} else {
    header("Location: http://part1.test");
}

?>