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

$titre          = $_POST['titre'];
$description    = $_POST['description'];
$file           = $_POST['file-nouveaute'];

// ! ----------------------------------------------------------------------
// ! Vérification si les parametres sont renseignés
// ! ----------------------------------------------------------------------

if (!empty($_POST['titre']) && !empty($_POST['description']) && !empty($_POST['file-nouveaute'])) {
    
    // ? --- Préparation de la requêtes SQL

     $query  = "INSERT INTO `SOCARD_NOUVEAUTE`(`TITRE_NOUVEAUTE`, `DESCRIPTION_NOUVEAUTE`, `IMG_NOUVEAUTE`) VALUES ('$titre', '$description', '$file') ";
     $query .= "ON DUPLICATE KEY UPDATE `DESCRIPTION_NOUVEAUTE`='$description', `TITRE_NOUVEAUTE`='$titre', `IMG_NOUVEAUTE`='$file'";
 
    try {
        $stmt = $dbh->prepare($query);
        $stmt->execute();
        $select["CODE_RETOUR"]      = 'OK';
    } catch (PDOException $e) {
        $select["CODE_RETOUR"] = 'ERREUR';
        $select["MESSAGE_SQL"] = 'ERREUR DE TRAITEMENT : ' . $query;
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