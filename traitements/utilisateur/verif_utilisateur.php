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

$EMAIL  = $_GET['EMAIL'];
$PWD    = $_GET['PWD'];

// ----------------------------------------------------------------------
// Vérification si les parametres sont renseignés
// ----------------------------------------------------------------------

if (!empty($_GET['EMAIL']) && !empty($_GET['PWD'])) {
    
    // ----------------------------------------------------------------------
    // Préparation de la requêtes SQL
    // ----------------------------------------------------------------------

    $query = "SELECT `ID_UTILISATEUR` FROM `SOCARD_UTILISATEUR` WHERE `EMAIL`='$EMAIL' AND `PWD`='$PWD'";

    try {
        $stmt = $dbh->prepare($query);
        $stmt->execute();
    } catch (PDOException $ex) {
        $select["CODE_RETOUR"] = 'ERREUR';
        $select["MESSAGE_SQL"] = $ex->getMessage();
    } finally {
        if ($select["CODE_RETOUR"] != 'ERREUR') {
            if ($stmt->rowCount() > 0) {
                $select["CODE_RETOUR"] = 'OK';
            } else {
                $select["CODE_RETOUR"] = 'ANOMALIE';
                $select["MESSAGE_RETOUR"] = 'L utilisateur n existe pas !';
            }
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
