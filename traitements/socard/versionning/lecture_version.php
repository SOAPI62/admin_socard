<?php

// !----------------------------------------------------------------------
// ! Connexion à la base de données
// ! ---------------------------------------------------------------------

include '../../inc/conn.php';

// !----------------------------------------------------------------------
// ! Initialisation des variables de sortie de la procédure
// !----------------------------------------------------------------------

$select = array();
$select["REPONSE"]  = 'OK';
$select["CODE_ERR"] = 0;
$select["MESS_ERR"] = '';
$select["CODE_SQL"] = ''; 
$select["VERSION"]  = '';

// !----------------------------------------------------------------------
// ! LECTURE DE LA VERSION ACTUELLE DE LA SOCARD
// !----------------------------------------------------------------------

$sql = "SELECT `nro_version` FROM `SOCARD_VERSION`";
$req = $dbh->prepare($sql);
$req->execute($tab);
$row = $req->fetch();
$select["VERSION"] = $row[0];

// !----------------------------------------------------------------------
// ! CREATION D UN NOUVEAU SOCARD
// !----------------------------------------------------------------------

echo json_encode($select);
exit(0);
?>