<?php
// ! ----------------------------------------------------------------------
// ! Connexion à la base de données
// ! ---------------------------------------------------------------------

include '../../connexion_bdd/conn.php';

// ! ----------------------------------------------------------------------
// ! Initialisation des variables de sortie de la procédure
// ! ----------------------------------------------------------------------

$select = array();
$select["CODE_RETOUR"]  = 'OK';
$select["CODE_ERR"] = 0;
$select["MESS_ERR"] = '';
$select["CODE_SQL"] = ''; 
$select["VERSION"]  = 0;

// ! ----------------------------------------------------------------------
// ! LECTURE DE LA VERSION ACTUELLE DE LA SOCARD
// ! ----------------------------------------------------------------------

$sql = "SELECT `id_card`, `nro_version` FROM `SOCARD_VERSION` WHERE `id_card`=1";
$req = $dbh->prepare($sql);
$req->execute($tab);
$row = $req->fetch();
$version_actuelle = $row[1];

$select["VERSION"] = $version_actuelle;

// ! ----------------------------------------------------------------------
// ! FIN DE TRAITEMENT
// ! ----------------------------------------------------------------------

echo json_encode($select);
exit(0);
?>