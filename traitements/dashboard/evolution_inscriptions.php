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
$sql = "SELECT `MOIS_PER`, count(*) FROM `SOCARD_INSTAL`, `PERIODES` WHERE `date_creation`= `DATE_PER`  GROUP BY `MOIS_PER`";
$req = $dbh->prepare($sql);
$req->execute($tab);

$mois = [0,0,0,0,0,0,0,0,0,0,0,0];
$max  = 0;

$mois_encours   = $today = date("m"); 
$mois_precedent = $mois_encours -1;

$nb_inscrit_m   = 0;
$nb_inscrit_m_1 = 0;

while ($row = $req->fetch())
{
    $indice = $row[0];
    $mois[$indice-1] = $row[1];

    if ($max < $row[1] ) {
        $max = $row[1];
    }

    if ( $mois_encours == $row[0] )
    {
        $nb_inscrit_m = $row[1];
    }

    if ( ($mois_precedent + 1) == $row[0] )
    {
        $nb_inscrit_m_1 = $row[1];
    }


}
$select["INSCRIPTIONS"] = $mois;
$select["MAX_INSCRIPTIONS"] = $max;
$select["EVOLUTION_INSCRIPTIONS"] = $nb_inscrit_m_1 / $nb_inscrit_m *100;

echo json_encode($select);
exit(0);
?>