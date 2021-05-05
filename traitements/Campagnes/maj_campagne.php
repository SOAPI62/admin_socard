<?php

// ----------------------------------------------------------------------
// Connexion à la base de données
// ----------------------------------------------------------------------

include '../connexion_bdd/conn.php';

// ----------------------------------------------------------------------
// Initialisation des variables de sortie de la procédure
// ----------------------------------------------------------------------

$select                     = [];
$select["CODE_RETOUR"]      = '';
$select["MESSAGE_RETOUR"]   = '';
$select["MESSAGE_SQL"]      = '';

// ----------------------------------------------------------------------
// Leture des parametres en entrée
// ----------------------------------------------------------------------

$ID_CAMPAGNE        = $_POST['ID_CAMPAGNE'];
$NOM_CAMPAGNE       = $_POST['NOM_CAMPAGNE'];
$DATE_EMISSION      = $_POST['DATE_EMISSION'];
$HEURE_EMISSION     = $_POST['HEURE_EMISSION'];
$BLK_ZONE_MESSAGE   = $_POST['BLK_ZONE_MESSAGE'];

// ----------------------------------------------------------------------
// Vérification si les parametres sont renseignés
// ----------------------------------------------------------------------

if (!empty($_POST['NOM_CAMPAGNE']) && !empty($_POST['DATE_EMISSION']) && !empty($_POST['HEURE_EMISSION']) && !empty($_POST['BLK_ZONE_MESSAGE'])) {
    
    // ----------------------------------------------------------------------
    // Préparation de la requêtes SQL
    // ----------------------------------------------------------------------

    $query ="UPDATE `SOCARD_CAMPAGNES_SMS` SET `NOM_CAMPAGNE`='$NOM_CAMPAGNE',`MESSAGE_CAMPAGNE`='$BLK_ZONE_MESSAGE',`DATE_CAMPAGNE`='$DATE_EMISSION',`HEURE_CAMPAGNE`='$HEURE_EMISSION' WHERE `ID_CAMPAGNE`='$ID_CAMPAGNE'";
    $stmt = $dbh->prepare($query);
    $stmt->execute();

    $select["CODE_RETOUR"]      = 'OK';

} else {
    $select["CODE_RETOUR"]      = 'ANOMALIE';
    $select["MESSAGE_RETOUR"]   = 'Les données de la campagne sont erronnées !';
}

// ------------------------------------------------------------------------------------------------------------------------------
// FIN DU TRAITEMENT
// ------------------------------------------------------------------------------------------------------------------------------

echo json_encode($select);
exit(0);
?>
