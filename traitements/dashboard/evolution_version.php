<?php

// Connexion à la base de données
include '../connexion_bdd/conn.php';


// Initialisation des variables de sortie de la procédure

$select = array();
$select["REPONSE"] = 'OK';
$select["CODE_ERR"] = 0;
$select["MESS_ERR"] = '';
$select["CODE_SQL"] = '';


$version = [];
$nombre_version = [];
$nombre_version_temporaire = [];
$first = 100;

$sql = "SELECT `version`, count(*) FROM `SOCARD_INSTAL` GROUP BY SUBSTRING(`version`,1,1)";

$req = $dbh->prepare($sql);
$req->execute();

while ($row = $req->fetch())
{
    array_push($version, $first);
    array_push($nombre_version, $row[1]);
    $first = $first +100;
}


$select["NOMBRE"]             = $nombre_version;
$select["VERSION"]            = $version;


echo json_encode($select);
exit(0);
?>