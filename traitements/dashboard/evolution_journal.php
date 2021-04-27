<?php

// Connexion à la base de données
include '../connexion_bdd/conn.php';

// Initialisation des variables de sortie de la procédure

$select = array();
$select["REPONSE"] = 'OK';
$select["CODE_ERR"] = 0;
$select["MESS_ERR"] = '';
$select["CODE_SQL"] = '';

// Préparation de la requêtes SQL
$sql = "SELECT `MOIS_PER`, count(*) FROM `SOCARD_JOURNAL`, `PERIODES` WHERE `date_connexion`= `DATE_PER`  GROUP BY `MOIS_PER`";
$req = $dbh->prepare($sql);
$req->execute($tab);

$mois = [0,0,0,0,0,0,0,0,0,0,0,0];
$max  = 0;

$mois_encours   = $today = date("m"); 
$mois_precedent = $mois_encours -1;

$nb_connexions_m   = 0;
$nb_connexions_m_1 = 0;

while ($row = $req->fetch())
{
    $indice = $row[0];
    $mois[$indice-1] = $row[1];

    if ($max < $row[1] ) {
        $max = $row[1];
    }

    if ( $mois_encours == $row[0] )
    {
        $nb_connexions_m = $row[1];
    }

    if ( ($row[0] + 1) ==  $mois_encours)
    {
        $nb_connexions_m_1 = $row[1];
    }


}

$select["CONNEXIONS"] = $mois;
$select["MAX_CONNEXIONS"] = $max;
$select["EVOLUTION_CONNEXIONS"] = ((float)$nb_connexions_m - (float)$nb_connexions_m_1) / (float)$nb_connexions_m_1 * 100;
$select["nb_connexions_m_1"] = $nb_connexions_m_1;
$select["nb_connexions_m"] = $nb_connexions_m;

echo json_encode($select);
exit(0);
?>