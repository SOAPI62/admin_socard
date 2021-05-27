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
// Préparation de la requêtes SQL
// ----------------------------------------------------------------------

$query = "SELECT `ID_PROMOTION`, `TITRE_PROMOTION`, `LIEN_PROMOTION`, `IMG_PROMOTION_1`, `IMG_PROMOTION_2`, `IMG_PROMOTION_3` FROM `SOCARD_PROMOTIONS`";

$stmt = $dbh->prepare($query);
$stmt->execute();
$result = $stmt->fetch();

$select["CODE_RETOUR"]              = 'OK';
$select["ID_PROMOTION"]             =  $result[0];
$select["TITRE_PROMOTION"]          =  $result[1];
$select["LIEN_PROMOTION"]           =  $result[2];
$select["IMG_PROMOTION_1"]          =  $result[3];
$select["IMG_PROMOTION_2"]          =  $result[4];
$select["IMG_PROMOTION_3"]          =  $result[5];

if ($result[3]!='#') { $select["NB_PROMOTIONS"] ++; }
if ($result[4]!='#') { $select["NB_PROMOTIONS"] ++; }
if ($result[5]!='#') { $select["NB_PROMOTIONS"] ++; }

// ------------------------------------------------------------------------------------------------------------------------------
// FIN DU TRAITEMENT
// ------------------------------------------------------------------------------------------------------------------------------

echo json_encode($select);
exit(0);
?>
