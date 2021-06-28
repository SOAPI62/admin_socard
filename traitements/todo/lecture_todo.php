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

$client  = $_POST['client'];


// ----------------------------------------------------------------------
// Vérification si les parametres sont renseignés
// ----------------------------------------------------------------------

if (!empty($_POST['client'])) {
    
    // ----------------------------------------------------------------------
    // Préparation de la requêtes SQL
    // ----------------------------------------------------------------------

    $query = "SELECT `POR_CLIENT` FROM `TODO`,`CLIENTS` WHERE `CD_CLIENT`= '$client' LIMIT 1";

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
            $select["NRO_CLIENT"]            = $row[0];
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
