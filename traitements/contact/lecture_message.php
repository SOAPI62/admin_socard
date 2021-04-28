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

$id_message  = $_POST['id_message'];

// ----------------------------------------------------------------------
// Vérification si les parametres sont renseignés
// ----------------------------------------------------------------------

if (!empty($_POST['id_message'])) {
    
    // ----------------------------------------------------------------------
    // Préparation de la requêtes SQL
    // ----------------------------------------------------------------------

    $query = "SELECT `ID_MSG`, `DESC_COURT_MSG`, `DESC_MSG`, `ACTIF_MSG` FROM `SOCARD_MESSAGES` WHERE `ID_MSG`='$id_message'";

    try {
        $stmt = $dbh->prepare($query);
        $stmt->execute();
        $row = $stmt->fetch();
    } catch (PDOException $e) {
        $select["CODE_RETOUR"] = 'ERREUR';
        $select["MESSAGE_SQL"] = 'ERREUR DE TRAITEMENT : ' . $query;
    } finally {
        if ($select["CODE_RETOUR"] != 'ERREUR') {
            $select["CODE_RETOUR"]      = 'OK';
            $select["ID_MSG"]           = $row[0];
            $select["DESC_COURT_MSG"]   = $row[1];
            $select["DESC_LONG_MSG"]    = $row[2];
            $select["ACTIF_MSG"]        = $row[3];
        }
    }
} else {
    $select["CODE_RETOUR"] = 'ANOMALIE';
    $select["MESSAGE_RETOUR"] = 'Les données du formulaires sont erronnées !';
}

// ------------------------------------------------------------------------------------------------------------------------------
// FIN DU TRAITEMENT
// ------------------------------------------------------------------------------------------------------------------------------

echo json_encode($select);
exit(0);
?>
