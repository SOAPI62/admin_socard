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

$id_message  = $_POST['id_message'];

// ----------------------------------------------------------------------
// Vérification si les parametres sont renseignés
// ----------------------------------------------------------------------

if (!empty($_POST['id_message'])) {
    
    // ----------------------------------------------------------------------
    // Préparation de la requêtes SQL
    // ----------------------------------------------------------------------

    $query = "SELECT `ID_MSG`, `DESC_COURT_MSG`, `DESC_MSG`, `ACTIF_MSG` FROM `SOCARD_MESSAGES` WHERE `ID_MSG`='$id_message'";
 
    $stmt = $dbh->prepare($query);
    $stmt->execute();
    $result = $stmt->fetch();

    $etat = $result[3] ? '0' : '1';

    $query = "UPDATE `SOCARD_MESSAGES` SET  `ACTIF_MSG`= '$etat' WHERE `ID_MSG`='$id_message'";
    $stmt = $dbh->prepare($query);
    $stmt->execute();

    $select["CODE_RETOUR"]      = 'OK';

} else {
    $select["CODE_RETOUR"] = 'ANOMALIE';
    $select["MESSAGE_RETOUR"] = 'Le numero du message est erronné !';
}

// ------------------------------------------------------------------------------------------------------------------------------
// FIN DU TRAITEMENT
// ------------------------------------------------------------------------------------------------------------------------------

echo json_encode($select);
exit(0);
?>
