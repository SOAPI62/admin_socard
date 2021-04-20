<?php

// Connexion à la base de données
include '../../inc/conn.php';

// Initialisation des variables de sortie de la procédure

$select = array();
$select["REPONSE"]      = '';
$select["CODE_ERR"]     = '';
$select["MESS_ERR"]     = '';
$select["CODE_SQL"]     = '';
$select["VALEUR"]       = 0;

// Récupération des variables URL
$liste_socard          = $_GET['liste_socard'];

$liste_obj = explode(",", $liste_socard);

$nb_elements = count($liste_obj);

for ($i=0; $i < $nb_elements; $i++) { 

    $obj= explode("@", $liste_obj[$i]);
    $id = $obj[0];
    $date_connexion = $obj[1];
    $heure_connexion = $obj[2];

    $sql =  "INSERT INTO `SOCARD_JOURNAL`(`id_socard`, `date_connexion`, `heure_connexion`) VALUES ";
    $sql .= "('$id','$date_connexion','$heure_connexion')";

    try {
        $req 	= $dbh->prepare($sql);
        $result = $req->execute($tab);
    } catch(Exception $e){
        // en cas d'erreur :
        $select["REPONSE"]  = 'ERREUR';
        $select["CODE_ERR"] = 0;
        $select["MESS_ERR"] = 'ERREUR TECHNIQUE : CREATION DE LA SOCARD';
        $select["CODE_SQL"] = $sql; 
        $select["VALEUR"]   =  0;       

        echo json_encode($select);
        exit(0);
}

}

// ------------------------------------------------------------------------------------------------------------------------------
// CREATION D UN NOUVEAU SOCARD
// ------------------------------------------------------------------------------------------------------------------------------

// Test de la requête : Cas d'une erreur SQL        

$select["REPONSE"]  = 'OK';
$select["CODE_ERR"] = 0;
$select["MESS_ERR"] = '';
$select["CODE_SQL"] = ''; 
$select["VALEUR"]   = $nb_elements;
echo json_encode($select);
exit(0);
?>