<?php
session_start();

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

    $query = "INSERT INTO `SOCARD_CAMPAGNES_SMS`( `NOM_CAMPAGNE`, `MESSAGE_CAMPAGNE`, `DATE_CAMPAGNE`, `HEURE_CAMPAGNE`) VALUES ('$NOM_CAMPAGNE','$BLK_ZONE_MESSAGE', '$DATE_EMISSION','$HEURE_EMISSION')";

    try {
        $stmt = $dbh->prepare($query);
        $stmt->execute();
    } catch (PDOException $e) {
        $select["CODE_RETOUR"] = 'ERREUR';
        $select["MESSAGE_SQL"] = 'ERREUR DE TRAITEMENT : ' . $query;
    } finally {
        if ($select["CODE_RETOUR"] != 'ERREUR') {
            $select["CODE_RETOUR"]      = 'OK';
        }
    }
} else {
    $select["CODE_RETOUR"] = 'ANOMALIE';
    $select["MESSAGE_RETOUR"] = 'Les données de la campagne sont erronnées !';
}

// ------------------------------------------------------------------------------------------------------------------------------
// FIN DU TRAITEMENT
// ------------------------------------------------------------------------------------------------------------------------------

echo json_encode($select);
exit(0);
?>
