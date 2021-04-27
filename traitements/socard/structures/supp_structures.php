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
// Leture des parametres en entrée
// ----------------------------------------------------------------------

$id_structure  = $_POST['id_structure'];

// ----------------------------------------------------------------------
// Vérification si les parametres sont renseignés
// ----------------------------------------------------------------------

if (!empty($_POST['id_structure'])) {
    
    // ----------------------------------------------------------------------
    // Préparation de la requêtes SQL
    // ----------------------------------------------------------------------

    $query = "SELECT `ID_STRUCTURE`, `POS_STRUCTURE`, `NOM_STRUCTURE`, `ACTIF_STRUCTURE` FROM `SOCARD_STRUCTURE` WHERE `ID_STRUCTURE`='$id_structure'";
 
    $stmt = $dbh->prepare($query);
    $stmt->execute();
    $result = $stmt->fetch();

    $etat = $result[3] ? '0' : '1';

    $query = "UPDATE `SOCARD_STRUCTURE` SET  `ACTIF_STRUCTURE`= '$etat' WHERE `ID_STRUCTURE`='$id_structure'";
    $stmt = $dbh->prepare($query);
    $stmt->execute();

    $select["CODE_RETOUR"]      = 'OK';

} else {
    $select["CODE_RETOUR"] = 'ANOMALIE';
    $select["MESSAGE_RETOUR"] = 'Le numero de structure est erronné !';
}

// ------------------------------------------------------------------------------------------------------------------------------
// FIN DU TRAITEMENT
// ------------------------------------------------------------------------------------------------------------------------------

echo json_encode($select);
exit(0);
?>
