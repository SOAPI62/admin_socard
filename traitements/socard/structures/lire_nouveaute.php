<?php

// ----------------------------------------------------------------------
// Connexion à la base de données
// ----------------------------------------------------------------------

include '../../connexion_bdd/conn.php';

// ----------------------------------------------------------------------
// Initialisation des variables de sortie de la procédure
// ----------------------------------------------------------------------

$select                     = [];
$select["CODE_RETOUR"]      = '';
$select["MESSAGE_RETOUR"]   = '';
$select["MESSAGE_SQL"]      = '';
    
// ----------------------------------------------------------------------
// Préparation de la requêtes SQL
// ----------------------------------------------------------------------

$query = "SELECT `ID_NOUVEAUTE`, `TITRE_NOUVEAUTE`, `DESCRIPTION_NOUVEAUTE`, `IMG_NOUVEAUTE` FROM `SOCARD_NOUVEAUTE`";

$stmt = $dbh->prepare($query);
$stmt->execute();
$result = $stmt->fetch();

$select["CODE_RETOUR"]              = 'OK';
$select["TITRE_NOUVEAUTE"]          =  $result[1];
$select["DESCRIPTION_NOUVEAUTE"]    =  $result[2];
$select["IMG_NOUVEAUTE"]            =  $result[3];

// ------------------------------------------------------------------------------------------------------------------------------
// FIN DU TRAITEMENT
// ------------------------------------------------------------------------------------------------------------------------------

echo json_encode($select);
exit(0);
?>
