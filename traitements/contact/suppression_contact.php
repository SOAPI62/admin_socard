<?php

// !----------------------------------------------------------------------
// ! Connexion à la base de données
// !----------------------------------------------------------------------

include '../connexion_bdd/conn_crm.php';

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

$id_contact  = $_POST['id_contact'];

// ! ----------------------------------------------------------------------
// ! Vérification si les parametres sont renseignés
// ! ----------------------------------------------------------------------

if (!empty($_POST['id_contact'])) {
    
    // ! ----------------------------------------------------------------------
    // ! Lecture de l etat du client : actif ou inactif
    // ! ----------------------------------------------------------------------

    $query = "SELECT `CD_CLIENT`, `ACTIF_Client`, `SUPPORT_COM` FROM `CLIENTS` WHERE `CD_CLIENT`='$id_contact'";
 
    $stmt = $dbh_crm->prepare($query);
    $stmt->execute();
    $result = $stmt->fetch();

    // ! ----------------------------------------------------------------------
    // ! Mise à jour de l'état du client
    // ! ----------------------------------------------------------------------

    $etat = $result[1] ? '0' : '1';

    $query = "UPDATE `CLIENTS` SET  `ACTIF_Client`= '$etat' WHERE `CD_CLIENT`='$id_contact'";

    $stmt = $dbh_crm->prepare($query);
    $stmt->execute();

    $select["CODE_RETOUR"]      = 'OK';

} else {
    $select["CODE_RETOUR"]      = 'ANOMALIE';
    $select["MESSAGE_RETOUR"]   = 'Le numero du contact est erronné !';
}

// ! ------------------------------------------------------------------------------------------------------------------------------
// ! FIN DU TRAITEMENT
// ! ------------------------------------------------------------------------------------------------------------------------------

echo json_encode($select);
exit(0);
?>