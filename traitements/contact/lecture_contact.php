<?php
session_start();

// ----------------------------------------------------------------------
// Connexion à la base de données
// ----------------------------------------------------------------------

include '../connexion_bdd/conn.php';

// ----------------------------------------------------------------------
// Initialisation des variables de sortie de la procédure
// ----------------------------------------------------------------------

$select                     = [];
$select["CODE_RETOUR"]      = '';
$select["MESSAGE_RETOUR"]   = '';
$select["MESSAGE_SQL"]      = '';

// ----------------------------------------------------------------------
// Leture des parametres en entrée
// ----------------------------------------------------------------------

$id_contact  = $_POST['id_contact'];

// ----------------------------------------------------------------------
// Vérification si les parametres sont renseignés
// ----------------------------------------------------------------------

if (!empty($_POST['id_contact'])) {
    
    // ----------------------------------------------------------------------
    // Préparation de la requêtes SQL
    // ----------------------------------------------------------------------

    $query = "SELECT `CD_CLIENT`, `ORI_CLIENT`, `TYP_CLIENT`, `CIV1_CLIENT`, `NOM1_CLIENT`, `PNOM1_CLIENT`, `CIV2_CLIENT`, `NOM2_CLIENT`, `PNOM2_CLIENT`, `ADR1_CLIENT`, `ADR2_CLIENT`, `VILLE_CLIENT`, `CPOSTAL_CLIENT`, `POR_CLIENT`, `TEL_CLIENT`, `EMAIL_CLIENT`, `CD_FIDELITE`, `IND_PROSP`, `ACTIF_Client`, `DTHR_CREATION`, `DTHR_MAJ`, `TYPE_CLIENT`, `EXCLU_MAILING`, `EXCLU_SMS`, `DT_TRF_CLT`, `CUSTOMER_ID_ECOM`, `ANNOTATION_CLIENT`, `SUPPORT_COM` FROM `CLIENTS`  WHERE `CD_CLIENT`='$id_contact'";

    try {
        $stmt = $dbh->prepare($query);
        $stmt->execute();
        $row = $stmt->fetch();
    } catch (PDOException $e) {
        $select["CODE_RETOUR"] = 'ERREUR';
        $select["MESSAGE_SQL"] = 'ERREUR DE TRAITEMENT : ' . $query;
    } finally {
        if ($select["CODE_RETOUR"] != 'ERREUR') {
            $select["CODE_RETOUR"]           = 'OK';
            $select["ORI_CLIENT"]            = $row[1];
            $select["NOM1_CLIENT"]           = $row[4];
            $select["PNOM1_CLIENT"]          = $row[5];
            $select["POR_CLIENT"]            = $row[13];
            $select["EMAIL_CLIENT"]          = $row[15];
            $select["ANNOTATION_CLIENT"]     = $row[26];
        }
    }
} else {
    $select["CODE_RETOUR"] = 'ANOMALIE';
    $select["MESSAGE_RETOUR"] = 'Les données du formulaires sont erronnées !';
}

// ------------------------------------------------------------------------------------------------------------------------------
// FIN DU TRAITEMENT
// ------------------------------------------------------------------------------------------------------------------------------

echo json_encode($select);
exit(0);
?>
