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

$id_campagne  = $_POST['id_campagne'];

// ----------------------------------------------------------------------
// Vérification si les parametres sont renseignés
// ----------------------------------------------------------------------

if (!empty($_POST['id_campagne'])) {
    
    // ----------------------------------------------------------------------
    // Préparation de la requêtes SQL
    // ----------------------------------------------------------------------

    $query = "SELECT `ID_CAMPAGNE`, `NOM_CAMPAGNE`, `MESSAGE_CAMPAGNE`, `DATE_CAMPAGNE`, `NB_EMISSION`, `ACTIF_CAMPAGNE` FROM `SOCARD_CAMPAGNES_SMS`  WHERE `ID_CAMPAGNE`='$id_campagne'";

    try {
        $stmt = $dbh->prepare($query);
        $stmt->execute();
        $row = $stmt->fetch();
    } catch (PDOException $e) {
        $select["CODE_RETOUR"] = 'ERREUR';
        $select["MESSAGE_SQL"] = 'ERREUR DE TRAITEMENT : ' . $query;
    } finally {
        if ($select["CODE_RETOUR"] != 'ERREUR') {
            $select["CODE_RETOUR"]           = 'OK';
            $select["ID_CAMPAGNE"]           = $row[0];
            $select["NOM_CAMPAGNE"]          = $row[1];
            $select["MESSAGE_CAMPAGNE"]      = $row[2];
            $select["DATE_CAMPAGNE"]         = $row[3];
            $select["NB_EMISSION"]           = $row[4];
            $select["ACTIF_CAMPAGNE"]        = $row[5];
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
