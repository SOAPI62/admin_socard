<?php

// !----------------------------------------------------------------------
// ! Connexion à la base de données
// !----------------------------------------------------------------------

include '../connexion_bdd/conn.php';

// !----------------------------------------------------------------------
// ! Initialisation des variables de sortie de la procédure
// !----------------------------------------------------------------------

$select                     = [];
$select["CODE_RETOUR"]      = '';
$select["MESSAGE_RETOUR"]   = '';
$select["MESSAGE_SQL"]      = '';

// ! ----------------------------------------------------------------------
// ! Lecture des parametres en entrée
// ! ----------------------------------------------------------------------

$id_campagne  = $_POST['id_campagne'];

// ! ----------------------------------------------------------------------
// ! Vérification si les parametres sont renseignés
// ! ----------------------------------------------------------------------

if (!empty($_POST['id_campagne'])) {
    
    // ! ----------------------------------------------------------------------
    // ! Lecture de l etat du client : actif ou inactif
    // ! ----------------------------------------------------------------------

    $query = "SELECT `ACTIF_CAMPAGNE` FROM `SOCARD_CAMPAGNES_SMS` WHERE `ID_CAMPAGNE`='$id_campagne'";
 
    $stmt = $dbh->prepare($query);
    $stmt->execute();
    $result = $stmt->fetch();

    // ! ----------------------------------------------------------------------
    // ! Mise à jour de l'état du client
    // ! ----------------------------------------------------------------------

    $etat = $result[0] ? '0' : '1';

    $query = "UPDATE `SOCARD_CAMPAGNES_SMS` SET `ACTIF_CAMPAGNE`='$etat' WHERE `ID_CAMPAGNE`='$id_campagne'";
 
    $stmt = $dbh->prepare($query);
    $stmt->execute();

    $select["CODE_RETOUR"]      = 'OK';

} else {
    $select["CODE_RETOUR"]      = 'ANOMALIE';
    $select["MESSAGE_RETOUR"]   = 'Le numero de campagne est erronné !';
}

// ! ------------------------------------------------------------------------------------------------------------------------------
// ! FIN DU TRAITEMENT
// ! ------------------------------------------------------------------------------------------------------------------------------

echo json_encode($select);
exit(0);
?>