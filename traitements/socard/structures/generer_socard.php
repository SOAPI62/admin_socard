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
// ! Lecture de la structure BOUTIQUE
// ! ----------------------------------------------------------------------

$query = "SELECT `ID_STRUCTURE`, `POS_STRUCTURE`, `NOM_STRUCTURE`, `HTML_STRUCTURE`, `ACTIF_STRUCTURE` FROM `SOCARD_STRUCTURE` WHERE `NOM_STRUCTURE`='BOUTIQUE' ";
$stmt = $dbh->prepare($query);
$stmt->execute();
$boutique       = $stmt->fetch();
$bloc_boutique  = html_entity_decode($boutique[3]);

// ! ----------------------------------------------------------------------
// ! Lecture des données : NOUVEAUTES
// ! ----------------------------------------------------------------------

$query = "SELECT `ID_NOUVEAUTE`, `TITRE_NOUVEAUTE`, `DESCRIPTION_NOUVEAUTE`, `IMG_NOUVEAUTE` FROM `SOCARD_NOUVEAUTE`";

$stmt1 = $dbh->prepare($query);
$stmt1->execute();
$row1  = $stmt1->fetch();

// ! ----------------------------------------------------------------------
// ! Génération du nouveau bloc : NOUVEAUTES à partir des données en BDD
// ! ----------------------------------------------------------------------

$block_nouveaute = html_entity_decode($row[3]); 
$block_nouveaute = str_replace("{{TITRE_NOUVEAUTE}}", $row1[1], $block_nouveaute ); 
$block_nouveaute = str_replace("{{DESCRIPTION_NOUVEAUTE}}", $row1[2], $block_nouveaute ); 
$block_nouveaute = str_replace("{{IMG_NOUVEAUTE}}", $row1[3], $block_nouveaute);

// ! ----------------------------------------------------------------------
// ! Génération de la SOCARD temporaire
// ! ----------------------------------------------------------------------

$block_socard = $contents;
$block_socard = str_replace("{{BLOC_NOUVEAUTE}}", $block_nouveaute, $block_socard);
$block_socard = str_replace("{{BLOC_BOUTIQUE}}", $bloc_boutique , $block_socard);

// ! ----------------------------------------------------------------------
// ! Création du fichier temoraire de la SOCARD temporaire
// ! ----------------------------------------------------------------------

$filename  = "../../../../socard-temporaire.html";
$contents  = file_put_contents($filename, $block_socard);

fclose($handle);

// ! ----------------------------------------------------------------------
// ! Gestion du mode : PRODUCTION
// ! ----------------------------------------------------------------------

if ($mode == 'production')
{
    $origine  = $filename;
    //$destination  = "../../../../socard-xxxx.html";
    $destination  = "../../../../index.html";
    if (!copy($origine, $destination)) {
        $select["CODE_RETOUR"]      = 'ANOMALIE';
        $select["MESSAGE_RETOUR"]   = "La copie $file du fichier a échoué...\n";
    }

    // ! ----------------------------------------------------------------------
    // ! Lecture de la version actuelle de la SOCARD
    // ! ----------------------------------------------------------------------

    $query = "SELECT `id_card`, `nro_version` FROM `SOCARD_VERSION`";
    $stmt2 = $dbh->prepare($query);
    $stmt2->execute();
    $version  = $stmt2->fetch();

    $version_actuelle = $version[1];
    $nouvelle_version = $version_actuelle + 1;

    $query = "UPDATE `SOCARD_VERSION` SET `nro_version`='$nouvelle_version'";
    $stmt2 = $dbh->prepare($query);
    $stmt2->execute();
}

$select["SOCARD"]           =  $block_socard;

// ! ------------------------------------------------------------------------------------------------------------------------------
// ! FIN DU TRAITEMENT
// ! ------------------------------------------------------------------------------------------------------------------------------

echo json_encode($select);
exit(0);
?>