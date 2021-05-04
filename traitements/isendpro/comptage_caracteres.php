<?php

// ! ----------------------------------------------------------------------
// ! Initialisation des variables de sortie de la procédure
// ! ----------------------------------------------------------------------

$select                      = [];
$select["CODE_RETOUR"]       = '';
$select["NB_CARACTERES"]     = '';
$select["MESSAGE_ERREUR"]    = '';

// ! ----------------------------------------------------------------------
// ! Envoi requete
// ! ----------------------------------------------------------------------
$ch = curl_init();

$url = 'https://apirest.isendpro.com/cgi-bin/comptage';
$params = array(
    'keyid'     =>  'fb7a50eae6922d075ba029702a3da002',
    'num'       =>  '0685318827',
    'sms'       =>  'Bonjour! Bienvenue sur iSendPro! khd kqdjhq khjkqsh dkhqkjd jkqshxjkqsh dkjqhkj dhkjqsd kjqhskjd hqkjd kjqhd kjhqksjd hkqjdhkjqh dkjq dkjh kdjhqskj dh',
    'emetteur'  =>  'isendpro',
    'comptage'  =>  1
);
$options = array(
    CURLOPT_URL => $url,
    CURLOPT_HEADER => false,
    CURLOPT_RETURNTRANSFER => TRUE,   
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS => $params    
);
curl_setopt_array($ch, $options);

$response = curl_exec($ch);

curl_close($ch);

// ! ----------------------------------------------------------------------
// ! Traitement du retour
// ! ----------------------------------------------------------------------

$reponsejson=json_decode($response);
$repetat=$reponsejson->etat->etat;
if (!isset($repetat->code)){
    $repetat=$reponsejson->etat->etat[0];
}

// ! Erreur generale

if (!isset($repetat->tel)){

    $select["CODE_RETOUR"]       = 'ANOMALIE';
    $select["MESSAGE_ERREUR"]    = $repetat->code . ' ' . $repetat->message;
 
// ! Infos de comptage
}else{

    if ($repetat->nb_sms > 1)
    {
        $select["CODE_RETOUR"]       = 'ANOMALIE';
        $select["NB_CARACTERES"]     = $repetat->nb_caractere;
        $select["MESSAGE_ERREUR"]    = 'Le message doit couter 1 sms ! (' . $repetat->nb_sms . ')';

    }
    else {
        $select["CODE_RETOUR"]       = 'OK';
        $select["NB_CARACTERES"]     = $repetat->nb_caractere;
    }
}
// ! ------------------------------------------------------------------------------------------------------------------------------
// ! FIN DU TRAITEMENT
// ! ------------------------------------------------------------------------------------------------------------------------------

echo json_encode($select);
exit(0);

?>