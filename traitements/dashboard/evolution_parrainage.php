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

$sql = "SELECT `MOIS_PER`, count(*) FROM `SOCARD_INSTAL`, `PERIODES` WHERE `date_creation` <>'0000-00-00' AND `date_creation`= `DATE_PER` AND `app_install`=1 GROUP BY `MOIS_PER`";
$req = $dbh->prepare($sql);
$req->execute();

$mois = [0,0,0,0,0,0,0,0,0,0,0,0];
$max  = 0;

while ($row = $req->fetch())
{
    $indice = $row[0];
    $mois[$indice-1] = $row[1];

    if ($max < $row[1] ) {
        $max = $row[1];
    }
}
$select["TELECHARGEMENT"]       = $mois;
$select["MAX_TELECHARGEMENTS"]  = $max;
$select["PERIODICITE"]          = $periodicite;

$sql = "SELECT `MOIS_PER`, count(*) FROM `SOCARD_INSTAL`, `PERIODES` WHERE `date_creation` <>'0000-00-00' AND `date_creation`= `DATE_PER` AND `id_origine`<>'/' GROUP BY `MOIS_PER`";
$req = $dbh->prepare($sql);
$req->execute();

$mois = [0,0,0,0,0,0,0,0,0,0,0,0];
$max  = 0;

while ($row = $req->fetch())
{
    $indice = $row[0];
    $mois[$indice-1] = $row[1];

    if ($max < $row[1] ) {
        $max = $row[1];
    }
}
$select["PARRAINAGE"]       = $mois;
$select["MAX_PARRAINAGE"]   = $max;


echo json_encode($select);
exit(0);
?>