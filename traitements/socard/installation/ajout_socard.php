<?php

// Connexion à la base de données
include '../../connexion_bdd/conn.php';

// Récupération des variables URL
$id_socard           = $_GET['id_socard'];
$id_origine 		 = $_GET['id_origine'];
$agent				 = $_GET['agent'];
$app_install		 = $_GET['app_install'];
$date_creation       = $_GET['date_creation'];
$heure_creation      = $_GET['heure_creation'];
$nb_visites          = $_GET['nb_visites'];
$url_socard			 = $_GET['url_socard'];
$version			 = $_GET['version'];

// Initialisation des variables de sortie de la procédure

$select = array();
$select["REPONSE"]      = '';
$select["CODE_ERR"]     = '';
$select["MESS_ERR"]     = '';
$select["CODE_SQL"]     = '';

// ------------------------------------------------------------------------------------------------------------------------------
// CREATION D UN NOUVEAU SOCARD
// ------------------------------------------------------------------------------------------------------------------------------

$sql  = "INSERT INTO `SOCARD_INSTAL`(`id_socard`, `id_origine`, `agent`, `app_install`, `date_creation`, `heure_creation`, `nb_visites`,`url_socard`,`version`) VALUES ";
$sql .= "('$id_socard','$id_origine','$agent','$app_install','$date_creation','$heure_creation',$nb_visites,'$url_socard','$version') ";
$sql .= "ON DUPLICATE KEY UPDATE `nb_visites`=$nb_visites, `app_install`=$app_install, `version`=$version";

try {
	$req 	= $dbh->prepare($sql);
	$result = $req->execute($tab);
} catch(Exception $e){
    // en cas d'erreur :
	$select["REPONSE"]  = 'ERREUR';
	$select["CODE_ERR"] = 0;
	$select["MESS_ERR"] = 'ERREUR TECHNIQUE : CREATION / MAJ DE LA SOCARD';
	$select["CODE_SQL"] = $sql; 
	$select["VALEUR"]   = '0';       

	echo json_encode($select);
	exit(0);
}

// Test de la requête : Cas d'une erreur SQL        

$select["REPONSE"]  = 'OK';
$select["CODE_ERR"] = 0;
$select["MESS_ERR"] = '';
$select["CODE_SQL"] = 0; 
$select["VALEUR"]   = 1;
echo json_encode($select);
exit(0);
?>