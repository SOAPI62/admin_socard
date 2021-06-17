<?php
// ! ----------------------------------------------------------------------
// ! Connexion à la base de données
// ! ----------------------------------------------------------------------

include '../connexion_bdd/conn.php';

// ! ----------------------------------------------------------------------
// ! Initialisation des iables de sortie de la procédure
// ! ----------------------------------------------------------------------

$select                     = [];
$select["CODE_RETOUR"]      = 'OK';
$select["MESSAGE_RETOUR"]   = '';
$select["MESSAGE_SQL"]      = '';
$select["NB_INSERT"]        = 0;

// ! ----------------------------------------------------------------------
// ! Lecture du fichier CSV
// ! ----------------------------------------------------------------------

// ! subscribed , last_active , first_session , channel , device , sessions , player_id , tags , country , language_code 
// ! XXXX

$csv = new SplFileObject('users_export_onesignal_users_2021-06-16T08:51:36+00:00.csv', 'r');
$csv->setFlags(SplFileObject::READ_CSV);
$csv->setCsvControl(',', '"', '"');

$nb_ligne = 0;


foreach($csv as $ligne)
{
    $email = $ligne[0];

    if (filter_var($email, FILTER_VALIDATE_EMAIL))
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
                    // ! ------------------------------------------------------------------------------------------------------------------------------
                    // ! INSERT DU CONTACT
                    // ! ------------------------------------------------------------------------------------------------------------------------------

                    $ajout_ORI_CLIENT           = 'TIDIO';
                    $ajout_EMAIL_CLIENT         = $email;
     
                    $query  = "INSERT INTO `CLIENTS`(`CD_CLIENT`, `TYP_CLIENT`, `ORI_CLIENT`, `EMAIL_CLIENT`, `SUPPORT_COM`) VALUES ('$cd_client', 'P', '$ajout_ORI_CLIENT', '$ajout_EMAIL_CLIENT', 'SOCARD')";
                    $stmt = $dbh->prepare($query);
                    $stmt->execute();

                    $select["NB_INSERT"]++;

 
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