<?php

// ! ----------------------------------------------------------------------
// ! Connexion à la base de données
// ! ----------------------------------------------------------------------

include '../connexion_bdd/conn.php';

// ! ----------------------------------------------------------------------
// ! Initialisation des iables de sortie de la procédure
// ! ----------------------------------------------------------------------

$select                     = [];
$select["CODE_RETOUR"]      = '';
$select["MESSAGE_RETOUR"]   = '';
$select["MESSAGE_SQL"]      = '';

// ! ----------------------------------------------------------------------
// ! Lecture du fichier CSV
// ! ----------------------------------------------------------------------

// ! name , email , emailConsent , rating , country , tags , firstName , lastName
// ! XXXX

$csv = new SplFileObject('contacts.csv', 'r');
$csv->setFlags(SplFileObject::READ_CSV);
$csv->setCsvControl(',', '"', '"');
 
foreach($csv as $ligne)
{
    $email = $ligne[0];

    if (filter_($email, FILTER_VALIDATE_EMAIL))
    {

        $query = "SELECT `CD_CLIENT`, `EMAIL_CLIENT` FROM `CLIENTS`  WHERE `EMAIL_CLIENT`='$email'";

        try {
            $stmt = $dbh->prepare($query);
            $stmt->execute();
            $count = $stmt->rowCount();
        } catch (PDOException $e) {
            $select["CODE_RETOUR"] = 'ERREUR';
            $select["MESSAGE_SQL"] = 'ERREUR DE TRAITEMENT : ' . $query;
        } finally {
            if ($select["CODE_RETOUR"] != 'ERREUR') 
            {
                if ( $count == 0)
                {
                    $ajout_ORI_CLIENT           = 'TIDIO';
                    $ajout_EMAIL_CLIENT         = $email;
     
                    $query  = "INSERT INTO `CLIENTS`(`ORI_CLIENT`, `EMAIL_CLIENT`, `SUPPORT_COM`) VALUES ('$ajout_ORI_CLIENT', '$ajout_EMAIL_CLIENT', 'SOCARD')";
                    $stmt = $dbh->prepare($query);
                    $stmt->execute();
                }

            }
        }
    }
}
 
// ! ------------------------------------------------------------------------------------------------------------------------------
// ! FIN DU TRAITEMENT
// ! ------------------------------------------------------------------------------------------------------------------------------

echo json_encode($select);
exit(0);
?>