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
    $nb_ligne++;

    if($nb_ligne > 1){
        $subscribed = $ligne[0];
        $last_active = $ligne[1];
        $first_session = $ligne[2];
        $channel = $ligne[3];
        $device = $ligne[4];
        $sessions = $ligne[5];
        $player_id = $ligne[6];
        $tags = $ligne[7];
        $country = $ligne[8];
        $language_code = $ligne[9];


        $query  = "INSERT INTO `ONESIGNAL`(`subscribed`, `last_active`, `first_session`, `channel`, `device`,`sessions`,`player_id`,`tags`,`country`,`language_code`) VALUES ('$subscribed', '$last_active', '$first_session', '$channel', '$device','$sessions','$player_id','$tags','$country','$language_code')";
        $stmt = $dbh->prepare($query);
        $stmt->execute();
    }

}
            
        
    

 
// ! ------------------------------------------------------------------------------------------------------------------------------
// ! FIN DU TRAITEMENT
// ! ------------------------------------------------------------------------------------------------------------------------------



echo json_encode($select);
exit(0);
?>