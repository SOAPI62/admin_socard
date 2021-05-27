<?php

// ! ----------------------------------------------------------------------
// ! Connexion à la base de données
// ! ----------------------------------------------------------------------

include '../connexion_bdd/conn.php';

// ! ----------------------------------------------------------------------
// ! Initialisation des variables de sortie de la procédure
// ! ----------------------------------------------------------------------

$select                      = [];
$select["CODE_RETOUR"]       = '';
$select["MESSAGE_RETOUR"]    = '';
$select["MESSAGE_ERREUR"]    = '';
$select["NB_EMISSION"]       = 0;
$MESSAGE                     = '';
$id_campagne                 = $_POST['id_campagne'];

// ! ----------------------------------------------------------------------
// ! Recherche de la campagne du jour
// ! ----------------------------------------------------------------------

$query = "SELECT `ID_CAMPAGNE`, `NOM_CAMPAGNE`, `MESSAGE_CAMPAGNE`, `DATE_CAMPAGNE`, `HEURE_CAMPAGNE`, `NB_EMISSION`, `ACTIF_CAMPAGNE` FROM `SOCARD_CAMPAGNES_SMS` WHERE  `NB_EMISSION` = 0  AND `ACTIF_CAMPAGNE`=1 AND `ID_CAMPAGNE`='$id_campagne'";

try {
    $stmt = $dbh->prepare($query);
    $stmt->execute();
    while ($row = $stmt->fetch())
    {
        $ID_CAMPAGNE    = $row[0];
        $MESSAGE        = $row[2];
    }

} catch (PDOException $e) {
    $select["CODE_RETOUR"] = 'ERREUR';
    $select["MESSAGE_SQL"] = 'ERREUR DE TRAITEMENT : ' . $query;
    echo json_encode($select);
    exit(0);
}

if ($MESSAGE == '')
{
    $select["CODE_RETOUR"]       = 'KO';
    $select["MESSAGE_RETOUR"]    = 'Pas de campagne !';
    echo json_encode($select);
    exit(0);
}

$LISTE_CONTACTS = array(); 

// ! ----------------------------------------------------------------------
// ! Mémorisation de la liste des contacts actifs SOCARD
// ! ----------------------------------------------------------------------

$query = "SELECT `CD_CLIENT`, `ORI_CLIENT`, `TYP_CLIENT`, `CIV1_CLIENT`, `NOM1_CLIENT`, `PNOM1_CLIENT`, `CIV2_CLIENT`, `NOM2_CLIENT`, `PNOM2_CLIENT`, `ADR1_CLIENT`, `ADR2_CLIENT`, `VILLE_CLIENT`, `CPOSTAL_CLIENT`, `POR_CLIENT`, `TEL_CLIENT`, `EMAIL_CLIENT`, `CD_FIDELITE`, `IND_PROSP`, `ACTIF_Client`, `DTHR_CREATION`, `DTHR_MAJ`, `TYPE_CLIENT`, `EXCLU_MAILING`, `EXCLU_SMS`, `DT_TRF_CLT`, `CUSTOMER_ID_ECOM`, `ANNOTATION_CLIENT`, `SUPPORT_COM` FROM `CLIENTS` WHERE `SUPPORT_COM`='SOCARD' AND `ACTIF_Client`=1 AND `POR_CLIENT`<>''";

try {
    $stmt = $dbh->prepare($query);
    $stmt->execute();
    while ($row = $stmt->fetch())
    {
        $sous_chaine = substr($row[13],0,2);

        switch ($sous_chaine) {
            case '06':
                $telephone = '336' . substr($row[13],2,999);
                break;
            case '07':
                $telephone = '337' . substr($row[13],2,999);
            break;          
        }

        $LISTE_CONTACTS[] = $telephone;
    }

} catch (PDOException $e) {
    $select["CODE_RETOUR"] = 'ERREUR';
    $select["MESSAGE_SQL"] = 'ERREUR DE TRAITEMENT : ' . $query;
    echo json_encode($select);
    exit(0);
}

// ! ----------------------------------------------------------------------
// ! Envoi requete
// ! ----------------------------------------------------------------------

$ch = curl_init();

$url = 'https://apirest.isendpro.com/cgi-bin/smsmulti';
$params = array(
    'keyid'     =>  'fb7a50eae6922d075ba029702a3da002',
    'num'       =>  $LISTE_CONTACTS,
    'sms'       =>  $MESSAGE,
    'emetteur'  =>  'SOSHOOTING'
);
$params = json_encode($params);     
$options = array(
    CURLOPT_URL => $url,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_RETURNTRANSFER => TRUE,   
    CURLOPT_POSTFIELDS => $params,    
    CURLOPT_HTTPHEADER => array(                                                                          
        'Content-Type' => 'application/json',                                                                                
        'Content-Length: ' =>  strlen($params)                                                                       
    )
);
curl_setopt_array($ch, $options);

$response = curl_exec($ch);

curl_close($ch);

// ! ----------------------------------------------------------------------
// ! Traitement du retour
// ! ----------------------------------------------------------------------

$reponsejson=json_decode($response);
$repetatList=$reponsejson->etat->etat;
if(!is_array($repetatList)){
    $repetatList=array($repetatList);
}

$cpt=1;
foreach($repetatList as $repetat){
 
    // Erreur generale
    if (!isset($repetat->tel)){
        $select["CODE_RETOUR"]       = 'ANOMALIE';
        $select["MESSAGE_ERREUR"]    = 'Code erreur ' . $repetat->code . ' : ' . $repetat->message;
    // Erreur specifique au numero de telephone    
    }else if (isset($repetat->tel) && ($repetat->code!=0)){
        $select["CODE_RETOUR"]       = 'ANOMALIE';
        $select["MESSAGE_ERREUR"]   .= $repetat->tel . ' # ';
    // Envoi OK    
    }else if (isset($repetat->tel) && ($repetat->code==0)){
        $select["CODE_RETOUR"]       = 'OK';
        $select["NB_EMISSION"]++;
    }
    $cpt+=1;
}

// ! ----------------------------------------------------------------------
// ! Mise à jour du nombre d emission de la campagne
// ! ----------------------------------------------------------------------

$nb_emission = $select["NB_EMISSION"];

$query = "UPDATE `SOCARD_CAMPAGNES_SMS` SET `NB_EMISSION`='$nb_emission' WHERE `ID_CAMPAGNE`='$ID_CAMPAGNE'";

try {
    $stmt = $dbh->prepare($query);
    $stmt->execute();
} catch (PDOException $e) {
    $select["CODE_RETOUR"] = 'ERREUR';
    $select["MESSAGE_SQL"] = 'ERREUR DE TRAITEMENT : ' . $query;
    echo json_encode($select);
    exit(0);
}

// ! ------------------------------------------------------------------------------------------------------------------------------
// ! FIN DU TRAITEMENT
// ! ------------------------------------------------------------------------------------------------------------------------------

echo json_encode($select);
exit(0);
?>