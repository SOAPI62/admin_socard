<?php

// ! ----------------------------------------------------------------------
// ! Initialisation des variables de sortie de la procédure
// ! ----------------------------------------------------------------------

$select                      = [];
$select["CODE_RETOUR"]       = '';
$select["NB_CARACTERES"]     = '';
$select["MESSAGE_ERREUR"]    = '';

// ! ----------------------------------------------------------------------
// ! Chargement des parametres de l URL
// ! ----------------------------------------------------------------------

$MESSAGE = $_POST['message'];

// ! ----------------------------------------------------------------------
// ! Envoi requete
// ! ----------------------------------------------------------------------

$ch = curl_init();

$url = 'https://apirest.isendpro.com/cgi-bin/sms';
$params = array(
    'keyid'     =>  'fb7a50eae6922d075ba029702a3da002',
    'num'       =>  '+33685318827',
    'sms'       =>  $MESSAGE,
    'emetteur'  =>  'SOSHOOTING'
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

// Erreur generale
if (!isset($repetat->tel)){
    $select["CODE_RETOUR"]       = 'ANOMALIE';
    $select["MESSAGE_ERREUR"]    = 'Code erreur ' . $repetat->code . ' : ' . $repetat->message;
// Erreur specifique au numero de telephone 
}else if (isset($repetat->tel) && ($repetat->code!=0)){
    $select["CODE_RETOUR"]       = 'ANOMALIE';
    $select["MESSAGE_ERREUR"]    = $repetat->code . ' ' . $repetat->message;
// Envoi OK    
}else if (isset($repetat->tel) && ($repetat->code==0)){
    $select["CODE_RETOUR"]       = 'OK';
}

// ! ------------------------------------------------------------------------------------------------------------------------------
// ! FIN DU TRAITEMENT
// ! ------------------------------------------------------------------------------------------------------------------------------

echo json_encode($select);
exit(0);


?>