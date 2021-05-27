<?php
session_start();

// ! ----------------------------------------------------------------------
// ! Connexion à la base de données
// ! ----------------------------------------------------------------------

include '../../connexion_bdd/conn.php';

// ! ----------------------------------------------------------------------
// ! Initialisation des variables de sortie de la procédure
// ! ----------------------------------------------------------------------

$select                     = [];
$select["CODE_RETOUR"]      = '';
$select["MESSAGE_RETOUR"]   = '';
$select["MESSAGE_SQL"]      = '';

// ! ----------------------------------------------------------------------
// ! Leture des parametres en entrée
// ! ----------------------------------------------------------------------

$id_promotion   = 1;
$titre          = $_POST['titre'];
$lien_url       = $_POST['lien_url'];
$file_1         = $_POST['file_1'];
$file_2         = $_POST['file_2'];
$file_3         = $_POST['file_3'];

// ! ----------------------------------------------------------------------
// ! Vérification si les parametres sont renseignés
// ! ----------------------------------------------------------------------

if (!empty($_POST['titre']) && !empty($_POST['file_1'])) {
    
    // ? --- Préparation de la requêtes SQL

     $query  = "INSERT INTO `SOCARD_PROMOTIONS`(`ID_PROMOTION`, `TITRE_PROMOTION`, `LIEN_PROMOTION`, `IMG_PROMOTION_1`, `IMG_PROMOTION_2`, `IMG_PROMOTION_3`) VALUES ('$id_promotion' ,'$titre', '$lien_url', '$file_1', '$file_2', '$file_3') ";
     $query .= "ON DUPLICATE KEY UPDATE `TITRE_PROMOTION`='$titre', `LIEN_PROMOTION`='$lien_url', `IMG_PROMOTION_1`='$file_1', `IMG_PROMOTION_2`='$file_2', `IMG_PROMOTION_3`='$file_3'";
 
    try {
        $stmt = $dbh->prepare($query);
        $stmt->execute();
        $select["CODE_RETOUR"]      = 'OK';
    } catch (PDOException $e) {
        $select["CODE_RETOUR"] = 'ERREUR';
        $select["MESSAGE_SQL"] = 'ERREUR DE TRAITEMENT : ' . $e->getMessage() . '*' . $query;
    } 

} else {
    $select["CODE_RETOUR"] = 'ANOMALIE';
    $select["MESSAGE_RETOUR"] = 'Les données du formulaires sont erronnées !';
}

// ! ------------------------------------------------------------------------------------------------------------------------------
// ! FIN DU TRAITEMENT
// ! ------------------------------------------------------------------------------------------------------------------------------

echo json_encode($select);
exit(0);
?>