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
// ! Lecture de la structure PROMOTIONS
// ! ----------------------------------------------------------------------

$query = "SELECT `ID_STRUCTURE`, `POS_STRUCTURE`, `NOM_STRUCTURE`, `HTML_STRUCTURE`, `ACTIF_STRUCTURE` FROM `SOCARD_STRUCTURE` WHERE `NOM_STRUCTURE`='PROMOTIONS' ";
$stmt = $dbh->prepare($query);
$stmt->execute();
$promotion          = $stmt->fetch();
$bloc_promotion     = html_entity_decode($promotion[3]);

// ! ----------------------------------------------------------------------
// ! Lecture des données : NOUVEAUTES
// ! ----------------------------------------------------------------------

$query = "SELECT `ID_NOUVEAUTE`, `TITRE_NOUVEAUTE`, `DESCRIPTION_NOUVEAUTE`, `IMG_NOUVEAUTE` FROM `SOCARD_NOUVEAUTE`";
$stmt1 = $dbh->prepare($query);
$stmt1->execute();
$row1  = $stmt1->fetch();

// ! ----------------------------------------------------------------------
// ! Lecture des données : PROMOTIONS
// ! ----------------------------------------------------------------------

$query = "SELECT `ID_PROMOTION`, `TITRE_PROMOTION`, `LIEN_PROMOTION`, `IMG_PROMOTION_1`, `IMG_PROMOTION_2`, `IMG_PROMOTION_3` FROM `SOCARD_PROMOTIONS`";
$stmt1 = $dbh->prepare($query);
$stmt1->execute();
$promotion  = $stmt1->fetch();

// ! ----------------------------------------------------------------------
// ! Génération du nouveau bloc : NOUVEAUTES à partir des données en BDD
// ! ----------------------------------------------------------------------

$bloc_nouveaute = html_entity_decode($row[3]); 
$bloc_nouveaute = str_replace("{{TITRE_NOUVEAUTE}}", $row1[1], $bloc_nouveaute ); 
$bloc_nouveaute = str_replace("{{DESCRIPTION_NOUVEAUTE}}", $row1[2], $bloc_nouveaute ); 
$bloc_nouveaute = str_replace("{{IMG_NOUVEAUTE}}", $row1[3], $bloc_nouveaute);

// ! ----------------------------------------------------------------------
// ! Génération du nouveau bloc : PROMOTIONS à partir des données en BDD
// ! ----------------------------------------------------------------------

$bloc_promotion = html_entity_decode($bloc_promotion); 
$bloc_promotion = str_replace("{{TITRE_PROMOTION}}", $promotion[1], $bloc_promotion ); 

if ($promotion[3]!='#')
{
    $ligne = "<div class='slide w-slide'><img src='" . $promotion[3] . "' loading='lazy' alt='' class='image-9'></div>";
}
else
{
    $ligne = "";
}
$bloc_promotion = str_replace("{{PROMOTION_1}}", $ligne, $bloc_promotion);

if ($promotion[4]!='#')
{
    $ligne = "<div class='slide w-slide'><img src='" . $promotion[4] . "' loading='lazy' alt='' class='image-9'></div>";
}
else
{
    $ligne = "";
}
$bloc_promotion = str_replace("{{PROMOTION_2}}", $ligne, $bloc_promotion);

if ($promotion[5]!='#')
{
    $ligne = "<div class='slide w-slide'><img src='" . $promotion[5] . "' loading='lazy' alt='' class='image-9'></div>";
}
else
{
    $ligne = "";
}
$bloc_promotion = str_replace("{{PROMOTION_3}}", $ligne, $bloc_promotion);

$bloc_promotion = str_replace("{{LIEN_URL}}", $promotion[2], $bloc_promotion ); 

// ! ----------------------------------------------------------------------
// ! Génération de la SOCARD temporaire
// ! ----------------------------------------------------------------------

$bloc_socard = $contents;
$bloc_socard = str_replace("{{BLOC_NOUVEAUTE}}", $bloc_nouveaute, $bloc_socard);
$bloc_socard = str_replace("{{BLOC_PROMOTIONS}}", $bloc_promotion , $bloc_socard);
$bloc_socard = str_replace("{{BLOC_BOUTIQUE}}", $bloc_boutique , $bloc_socard);
 
// ! ----------------------------------------------------------------------
// ! Création du fichier temoraire de la SOCARD temporaire
// ! ----------------------------------------------------------------------

//$filename  = "../../../../socard-temporaire.html";
$filename  = "./socard-temporaire.html";
$contents  = file_put_contents($filename, $bloc_socard);

fclose($handle);

// ! ----------------------------------------------------------------------
// ! Gestion du mode : PRODUCTION
// ! ----------------------------------------------------------------------

if ($mode == 'production')
{
    $origine  = $filename;
    //$destination  = "../../../../socard-xxxx.html";
    //$destination  = "../../../../index.html";
    $destination  = "socard-xxxx.html";
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

$select["SOCARD"]           =  $bloc_socard;

// ! ------------------------------------------------------------------------------------------------------------------------------
// ! FIN DU TRAITEMENT
// ! ------------------------------------------------------------------------------------------------------------------------------

echo json_encode($select);
exit(0);
?>