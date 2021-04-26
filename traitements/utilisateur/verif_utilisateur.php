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

$email  = $_POST['email'];
$pwd    = $_POST['pwd'];

// ----------------------------------------------------------------------
// Vérification si les parametres sont renseignés
// ----------------------------------------------------------------------

if (!empty($_POST['email']) && !empty($_POST['pwd'])) {
    
    // ----------------------------------------------------------------------
    // Préparation de la requêtes SQL
    // ----------------------------------------------------------------------

    $query = "SELECT `ID_UTILISATEUR` FROM `SOCARD_UTILISATEUR` WHERE `EMAIL`='$email' AND `PWD`='$pwd'";

    try {
        $stmt = $dbh->prepare($query);
        $stmt->execute();
    } catch (PDOException $e) {
        $select["CODE_RETOUR"] = 'ERREUR';
        $select["MESSAGE_SQL"] = 'ERREUR DE TRAITEMENT : ' . $query;
    } finally {
        if ($select["CODE_RETOUR"] != 'ERREUR') {
            if ($stmt->rowCount() > 0) {
                $select["CODE_RETOUR"] = 'OK';

                // Création de la session utilisateur

                $_SESSION['EMAIL_UTILISATEUR'] = $email;
                $_SESSION['PWD_UTILISATEUR']   = sha1($pwd);
                
            } else {
                $select["CODE_RETOUR"] = 'ANOMALIE';
                $select["MESSAGE_RETOUR"] = 'L utilisateur n existe pas !';
            }
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
