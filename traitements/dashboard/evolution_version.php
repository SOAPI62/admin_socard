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


$sql = "SELECT `version`, count(*) FROM `SOCARD_INSTAL` GROUP BY `version`";

$req = $dbh->prepare($sql);
$req->execute();

while ($row = $req->fetch())
{
    array_push($version, $row[0]);
    array_push($nombre_version, $row[1]);
}


$select["NOMBRE"]             = $nombre_version;
$select["VERSION"]            = $version;


echo json_encode($select);
exit(0);
?>