<?php

// ----------------------------------------------------------------------
// Connexion à la base de données
// ----------------------------------------------------------------------

include '../../connexion_bdd/conn.php';

// ----------------------------------------------------------------------
// Initialisation des variables de sortie de la procédure
// ----------------------------------------------------------------------

$select                     = [];
$select["CODE_RETOUR"]      = '';
$select["MESSAGE_RETOUR"]   = '';
$select["MESSAGE_SQL"]      = '';
$select["STRUCTURE_HTML"]   = '';

// ----------------------------------------------------------------------
// Préparation de la requêtes SQL
// ----------------------------------------------------------------------

$chemin   = "../../../structures/";
$filename = $chemin . "socard.html";
$contents = file_get_contents($filename);

$query = "SELECT `ID_STRUCTURE`, `POS_STRUCTURE`, `NOM_STRUCTURE`, `HTML_STRUCTURE`, `ACTIF_STRUCTURE` FROM `SOCARD_STRUCTURE` WHERE `NOM_STRUCTURE`='NOUVEAUTES' ";
$stmt = $dbh->prepare($query);
$stmt->execute();
$row  = $stmt->fetch();

$query = "SELECT `ID_NOUVEAUTE`, `TITRE_NOUVEAUTE`, `DESCRIPTION_NOUVEAUTE`, `IMG_NOUVEAUTE` FROM `SOCARD_NOUVEAUTE`";
$stmt1 = $dbh->prepare($query);
$stmt1->execute();
$row1  = $stmt1->fetch();

$block_nouveaute = html_entity_decode($row[3]); 
$block_nouveaute = str_replace("{{TITRE_NOUVEAUTE}}", $row1[1], $block_nouveaute ); 
$block_nouveaute = str_replace("{{DESCRIPTION_NOUVEAUTE}}", $row1[2], $block_nouveaute ); 
$block_nouveaute = str_replace("{{IMG_NOUVEAUTE}}", $row1[3], $block_nouveaute);

$block_socard = $contents;
$block_socard = str_replace("{{BLOC_NOUVEAUTE}}", $block_nouveaute, $block_socard);

$filename  = $chemin . "socard-temporaire.html";
$contents  = file_put_contents($filename, $block_socard);

fclose($handle);

$select["CODE_RETOUR"]      = 'OK';
$select["SOCARD"]           =  $block_socard;

// ------------------------------------------------------------------------------------------------------------------------------
// FIN DU TRAITEMENT
// ------------------------------------------------------------------------------------------------------------------------------

echo json_encode($select);
exit(0);
?>