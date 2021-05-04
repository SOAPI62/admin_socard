<?php

// ! ! ----------------------------------------------------------------------
// ! ! Connexion à la base de données
// ! ! ----------------------------------------------------------------------

include '../../connexion_bdd/conn.php';

// ! ! ----------------------------------------------------------------------
// ! ! Lecture des parametres
// ! ! ----------------------------------------------------------------------


$mode = $_POST['mode'];

// ! ! ----------------------------------------------------------------------
// ! ! Initialisation des variables de sortie de la procédure
// ! ! ----------------------------------------------------------------------

$select                     = [];
$select["CODE_RETOUR"]      = 'OK';
$select["MESSAGE_RETOUR"]   = '';
$select["MESSAGE_SQL"]      = '';
$select["STRUCTURE_HTML"]   = '';

// ! ----------------------------------------------------------------------
// ! Lecture de la structure de la SOCARD
// ! ----------------------------------------------------------------------

$chemin   = "../../../structures/";
$filename = $chemin . "socard.html";
$contents = file_get_contents($filename);

// ! ----------------------------------------------------------------------
// ! Lecture de la structure NOUVEAUTES
// ! ----------------------------------------------------------------------

$query = "SELECT `ID_STRUCTURE`, `POS_STRUCTURE`, `NOM_STRUCTURE`, `HTML_STRUCTURE`, `ACTIF_STRUCTURE` FROM `SOCARD_STRUCTURE` WHERE `NOM_STRUCTURE`='NOUVEAUTES' ";
$stmt = $dbh->prepare($query);
$stmt->execute();
$row  = $stmt->fetch();

// ! ----------------------------------------------------------------------
// ! Lecture de la structure LOCALISATION
// ! ----------------------------------------------------------------------

$query = "SELECT `ID_STRUCTURE`, `POS_STRUCTURE`, `NOM_STRUCTURE`, `HTML_STRUCTURE`, `ACTIF_STRUCTURE` FROM `SOCARD_STRUCTURE` WHERE `NOM_STRUCTURE`='LOCALISATION' ";
$stmt_localisation = $dbh->prepare($query);
$stmt_localisation->execute();
$localisation  = $stmt_localisation->fetch();

// ! ----------------------------------------------------------------------
// ! Lecture des données : NOUVEAUTES
// ! ----------------------------------------------------------------------

$query = "SELECT `ID_NOUVEAUTE`, `TITRE_NOUVEAUTE`, `DESCRIPTION_NOUVEAUTE`, `IMG_NOUVEAUTE` FROM `SOCARD_NOUVEAUTE`";
$stmt1 = $dbh->prepare($query);
$stmt1->execute();
$row1  = $stmt1->fetch();

// ! ----------------------------------------------------------------------
// ! Lecture de la version actuelle de la SOCARD
// ! ----------------------------------------------------------------------

$query = "SELECT `id_card`, `nro_version` FROM `SOCARD_VERSION`";
$stmt2 = $dbh->prepare($query);
$stmt2->execute();
$version  = $stmt2->fetch();

$nouvelle_version = "Version " . (string)($version[1] + 1);

// ! ----------------------------------------------------------------------
// ! Génération du nouveau bloc : NOUVEAUTES à partir des données en BDD
// ! ----------------------------------------------------------------------

$block_nouveaute = html_entity_decode($row[3]); 
$block_nouveaute = str_replace("{{TITRE_NOUVEAUTE}}", $row1[1], $block_nouveaute ); 
$block_nouveaute = str_replace("{{DESCRIPTION_NOUVEAUTE}}", $row1[2], $block_nouveaute ); 
$block_nouveaute = str_replace("{{IMG_NOUVEAUTE}}", $row1[3], $block_nouveaute);

// ! ----------------------------------------------------------------------
// ! Génération du nouveau bloc : LOCALISATION à partir des données en BDD
// ! ----------------------------------------------------------------------

$block_localisation = html_entity_decode($localisation[3]); 
$block_localisation = str_replace("{{VERSION_SOCARD}}", $nouvelle_version, $block_localisation ); 

// ! ----------------------------------------------------------------------
// ! Génération de la SOCARD temporaire
// ! ----------------------------------------------------------------------

$block_socard = $contents;
$block_socard = str_replace("{{BLOC_NOUVEAUTE}}", $block_nouveaute, $block_socard);
$block_socard = str_replace("{{BLOC_LOCALISATION}}", $block_localisation, $block_socard);

// ! ----------------------------------------------------------------------
// ! Création du fichier temoraire de la SOCARD temporaire
// ! ----------------------------------------------------------------------

$filename  = $chemin . "socard-temporaire.html";
$contents  = file_put_contents($filename, $block_socard);

fclose($handle);

// ! ----------------------------------------------------------------------
// ! Gestion du mode : PRODUCTION
// ! ----------------------------------------------------------------------

if ($mode == 'production')
{
    $origine  = $chemin . "socard-temporaire.html";
    $destination  = "../../../socard.html";
    if (!copy($origine, $destination)) {
        $select["CODE_RETOUR"]      = 'ANOMALIE';
        $select["MESSAGE_RETOUR"]   = "La copie $file du fichier a échoué...\n";
    }

}


$select["SOCARD"]           =  $block_socard;

// ! ------------------------------------------------------------------------------------------------------------------------------
// ! FIN DU TRAITEMENT
// ! ------------------------------------------------------------------------------------------------------------------------------

//echo json_encode($select);
exit(0);
?>