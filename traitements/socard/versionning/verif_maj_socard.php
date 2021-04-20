<?php

// Connexion à la base de données
include '../../inc/conn.php';

// Initialisation des variables de sortie de la procédure

$select = array();

// Préparation de la requêtes SQL
$sql = "SELECT `id_card`, `nro_version` FROM `SOCARD_VERSION` WHERE `id_card`=1";
$req = $dbh->prepare($sql);
$req->execute($tab);
$row = $req->fetch();
$version_actuelle = $row[1];

// Récupération des variables URL
$version         = $_GET['version'];

if ($version < $version_actuelle)
{
    $select["REPONSE"]  = 'OK';
    $select["VERSION"]   = $version_actuelle;
}
else
{
    $select["REPONSE"]  = 'KO';
}

// ------------------------------------------------------------------------------------------------------------------------------
// CREATION D UN NOUVEAU SOCARD
// ------------------------------------------------------------------------------------------------------------------------------

// Test de la requête : Cas d'une erreur SQL        

$select["CODE_ERR"] = 0;
$select["MESS_ERR"] = '';
$select["CODE_SQL"] = ''; 

echo json_encode($select);
exit(0);
?>