<?php

// ! ----------------------------------------------------------------------
// ! Initialisation des variables de sortie de la procédure
// ! ----------------------------------------------------------------------

$select                      = [];
$select["CODE_RETOUR"]       = '';
$select["NB_CREDITS"]        = '';
$select["MESSAGE_ERREUR"]    = '';

// ! ------------------------------------------------------------------------------------------------------------------------------
// ! Envoi requete
// ! ------------------------------------------------------------------------------------------------------------------------------

$ch = curl_init();

$url = 'https://apirest.isendpro.com/cgi-bin/credit';
$params = array(
    'keyid'     =>  'fb7a50eae6922d075ba029702a3da002',
    'credit'    =>  2
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

// !echo $response;

// ! ----------------------------------------------------------------------
// ! Traitement du retour
// ! ----------------------------------------------------------------------

$reponsejson=json_decode($response);
$repetat=$reponsejson->etat;

// ! Erreur generale
if (!isset($repetat->credit)){
    $repetat=$reponsejson->etat->etat[0];
    $select["CODE_RETOUR"]      = "ANOMALIE";
    $select["MESSAGE_ERREUR"]   = $repetat->code . ' ' . $repetat->message;
// ! Infos de quantites
}else{
     if (isset($repetat->quantite)){
        $select["CODE_RETOUR"]  = "OK";
        $select["NB_CREDITS"]   = $repetat->quantite;
    }
}

// ! ------------------------------------------------------------------------------------------------------------------------------
// ! FIN DU TRAITEMENT
// ! ------------------------------------------------------------------------------------------------------------------------------

echo json_encode($select);
exit(0);
?>