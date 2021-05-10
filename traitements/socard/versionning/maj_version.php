<?php
// ! ----------------------------------------------------------------------
// ! Connexion à la base de données
// ! ---------------------------------------------------------------------

include '../../connexion_bdd/conn.php';

// ! ----------------------------------------------------------------------
// ! LECTURE DES PARAMETRES EN ENTRÉE
// ! ----------------------------------------------------------------------

$nro_version = $_POST['NRO_VERSION'];

// ! ----------------------------------------------------------------------
// ! Initialisation des variables de sortie de la procédure
// ! ----------------------------------------------------------------------

$select = array();
$select["CODE_RETOUR"]  = 'OK';
$select["CODE_ERR"] = 0;
$select["MESS_ERR"] = '';
$select["CODE_SQL"] = ''; 
$select["VERSION"]  = 0;

// ! ----------------------------------------------------------------------
// ! LECTURE DE LA VERSION ACTUELLE DE LA SOCARD
// ! ----------------------------------------------------------------------

$sql = "UPDATE `SOCARD_VERSION` SET  `nro_version`='$nro_version'";
$req = $dbh->prepare($sql);
$req->execute($tab);

// ! ----------------------------------------------------------------------
// ! FIN DE TRAITEMENT
// ! ----------------------------------------------------------------------

echo json_encode($select);
exit(0);
?>