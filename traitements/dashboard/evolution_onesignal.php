<?php

// Connexion à la base de données
include '../connexion_bdd/conn.php';


// Initialisation des variables de sortie de la procédure

$select = array();
$select["REPONSE"] = 'OK';
$select["CODE_ERR"] = 0;
$select["MESS_ERR"] = '';
$select["CODE_SQL"] = '';


$periodicite =  ['Jan', 'Fev', 'Mar', 'Avr', 'Mai', 'Jui', 'Jui', 'Aou', 'Sep', 'Oct', 'Nov', 'Dec'];


$sql = "SELECT `MOIS_PER`, SUM(`sessions`) FROM `SOCARD_ONESIGNAL`, `PERIODES` WHERE SUBSTRING(`first_session`,1,10) <>'0000-00-00' AND SUBSTRING(`first_session`,1,10) = `DATE_PER` AND `subscribed` = 'Yes' GROUP BY `MOIS_PER`";
$req = $dbh->prepare($sql);
$req->execute();

$mois = [0,0,0,0,0,0,0,0,0,0,0,0];

while ($row = $req->fetch())
{
    $indice = $row[0];
    $mois[$indice-1] = $row[1];
}

$select["SESSIONS"]             = $mois;
$select["PERIODICITE"]          = $periodicite;


$sql = "SELECT `MOIS_PER`, COUNT(*) FROM `SOCARD_ONESIGNAL`, `PERIODES` WHERE SUBSTRING(`first_session`,1,10) <>'0000-00-00' AND SUBSTRING(`first_session`,1,10) = `DATE_PER` AND `subscribed` = 'Yes' GROUP BY `MOIS_PER`";
$req = $dbh->prepare($sql);
$req->execute();

$mois = [0,0,0,0,0,0,0,0,0,0,0,0];

while ($row = $req->fetch())
{
    $indice = $row[0];
    $mois[$indice-1] = $row[1];
}

$select["NB_SOUSCRIT"]       = $mois;



echo json_encode($select);
exit(0);
?>