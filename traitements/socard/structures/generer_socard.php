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
$select["STRUCTURE_HTML"]   = '';

// ----------------------------------------------------------------------
// Préparation de la requêtes SQL
// ----------------------------------------------------------------------

$query = "SELECT `POS_STRUCTURE`, `NOM_STRUCTURE`, `HTML_STRUCTURE`, `ACTIF_STRUCTURE` FROM `SOCARD_STRUCTURE` WHERE `ACTIF_STRUCTURE`=1 ORDER BY `POS_STRUCTURE`";

$stmt = $dbh->prepare($query);
$stmt->execute();

$fichier_socard = '';

while ($row = $stmt->fetch()) {
    $fichier_socard .= $row[2];
}

$select["CODE_RETOUR"]      = 'OK';
$select["SOCARD"]           =  $fichier_socard;

// ------------------------------------------------------------------------------------------------------------------------------
// FIN DU TRAITEMENT
// ------------------------------------------------------------------------------------------------------------------------------

echo json_encode($select);
exit(0);
?>
