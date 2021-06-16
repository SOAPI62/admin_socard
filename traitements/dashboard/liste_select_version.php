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
// Préparation de la requêtes SQL
// ----------------------------------------------------------------------

$query = "SELECT DISTINCT `version` FROM SOCARD_INSTAL where `version`<>'' ORDER BY `version` DESC";

try {
    $stmt = $dbh->prepare($query);
    $stmt->execute();

    $code = "<label >avec la version </label>";
    $code .= "<select id='nro_version' style='margin-left: 5px;'>";
    $code .= "<option value='-1' >Toutes</option>";
    while ($row = $stmt->fetch())
    {
        $code .= "<option value='"  . $row[0] . "' >" . $row[0] . "</option>";
        
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
