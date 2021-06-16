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

$csv = new SplFileObject('contacts.csv', 'r');
$csv->setFlags(SplFileObject::READ_CSV);
$csv->setCsvControl(',', '"', '"');


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
                    // ! RECHERCHE DU DERNIER NRO DE SEQUENCE CLIENT
                    // ! ------------------------------------------------------------------------------------------------------------------------------

                    $sql = "SELECT `NRO_SEQ` FROM `SEQUENCES` WHERE `TABLE_SEQ` = 'CLIENTS'";
                    $req = $dbh->prepare($sql);
                    $req->execute($tab);
                    $row = $req->fetch();

                    $nro_seq    = (int)$row['NRO_SEQ'] + 1;
                    $nro_seq_st = str_pad($nro_seq, 4, "0", STR_PAD_LEFT);
                    $cd_client  = date('Y') . '-' . $nro_seq_st;

                    // ! ------------------------------------------------------------------------------------------------------------------------------
                    // ! INSERT DU CONTACT
                    // ! ------------------------------------------------------------------------------------------------------------------------------

                    $ajout_ORI_CLIENT           = 'TIDIO';
                    $ajout_EMAIL_CLIENT         = $email;
     
                    $query  = "INSERT INTO `CLIENTS`(`CD_CLIENT`, `TYP_CLIENT`, `ORI_CLIENT`, `EMAIL_CLIENT`, `SUPPORT_COM`) VALUES ('$cd_client', 'P', '$ajout_ORI_CLIENT', '$ajout_EMAIL_CLIENT', 'SOCARD')";
                    $stmt = $dbh->prepare($query);
                    $stmt->execute();

                    $select["NB_INSERT"]++;

                    // ! ------------------------------------------------------------------------------------------------------------------------------
                    // ! MISE A JOUR DU NRO DE SEQUENCE  CLIENT
                    // ! ------------------------------------------------------------------------------------------------------------------------------

                    $sql 	= "UPDATE `SEQUENCES` SET `NRO_SEQ`=$nro_seq WHERE `TABLE_SEQ`='CLIENTS'";
                    $req 	= $dbh->prepare($sql);
                    $result = $req->execute($tab);

                }
            }
        }
    }
}
 
// ! ------------------------------------------------------------------------------------------------------------------------------
// ! FIN DU TRAITEMENT
// ! ------------------------------------------------------------------------------------------------------------------------------

$select["MESSAGE_RETOUR"] = (string)$select["NB_INSERT"] . ' contact(s ajouté(s) !';

echo json_encode($select);
exit(0);
?>