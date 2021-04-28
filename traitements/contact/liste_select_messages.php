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
// Préparation de la requêtes SQL
// ----------------------------------------------------------------------

$query = "SELECT `ID_MSG`, `DESC_COURT_MSG`, `DESC_MSG`, `ACTIF_MSG` FROM `SOCARD_MESSAGES` WHERE `ACTIF_MSG`=1 ORDER BY `ID_MSG`";

try {
    $stmt = $dbh->prepare($query);
    $stmt->execute();

    $code = "<select id='SOCARD' class='form-control select2' style='width: 100%;'>";
    $i = 1;
    while ($row = $stmt->fetch())
    {
        if ($i == 1)
        {
            $code .= "<option value='"  . $row[0] . "' selected='selected'>" . $row[1] . "</option>";

        }
        else {
            $code .= "<option value='"  . $row[0] . "' >" . $row[1] . "</option>";
        }
        $i++;
        
    }
    $code .= "</select>";

} catch (PDOException $e) {
    $select["CODE_RETOUR"] = 'ERREUR';
    $select["MESSAGE_SQL"] = 'ERREUR DE TRAITEMENT : ' . $query;
} finally {
    if ($select["CODE_RETOUR"] != 'ERREUR') {
        $select["CODE_RETOUR"]      = 'OK';
        $select["HTML"]             = $code;

    }
}
 
// ------------------------------------------------------------------------------------------------------------------------------
// FIN DU TRAITEMENT
// ------------------------------------------------------------------------------------------------------------------------------

echo json_encode($select);
exit(0);
?>
