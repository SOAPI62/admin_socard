<?php
session_start();

//print_r($_SESSION);

// Récupération des variables URL
$nro_tel      = $_GET['nro_tel'];
$nro_tel      = str_replace(' ', '', $nro_tel);

$indicatif    = substr($nro_tel, 0, 2); 
if ($indicatif == '33')
{
   $nro_tel = '0' . substr($nro_tel, 2, 99);
}

$type_message = $_GET['type_message'];

// Initialisation des variables de sortie de la procédure

$select = array();
$select["REPONSE"]      = 'OK';
$select["CODE_ERR"]     = '';
$select["MESS_ERR"]     = '';
$select["CODE_SQL"]     = '';
$select["NRO_CONTRAT"]  = '';

$message ='';

switch ($type_message) {
        case '01':
        $message = "Bonjour, je ne suis pas disponible pour le moment. Je vous communique ma carte de visite digitale pour rester en contact : https://urlr.me/FxNZP" ;
        break;
        case '02':
        $message = "Bonjour, vous avez essayé de me joindre. Je vous communique ma carte de visite digitale pour rester en contact : https://urlr.me/FxNZP" ;
        break;
        case '03':
        $message = "Bonjour, suite à notre conversation tél, e vous communique ma carte de visite digitale pour rester en contact : https://urlr.me/FxNZP" ;
        break;
        case '04':
        $message = "Bonjour, je vous communique ma carte de visite digitale pour rester en contact : https://urlr.me/FxNZP" ;
        break;
        case '05':
        $message = "Bonjour, suite à votre passage à l agence, e vous communique ma carte de visite digitale pour rester en contact : https://urlr.me/FxNZP" ;
        break;
        case '06':
        $message = "Bonjour, suite à votre commande, je vous communique ma carte de visite digitale pour rester en contact : https://urlr.me/FxNZP" ;
        break;
        default:
        break;
}

if ($message != '')
{
        // ------------------------------------------------------------------------------------------------------------------------------
        // Chargement bibliotheque SMS ISENDPRO
        // ------------------------------------------------------------------------------------------------------------------------------

        require_once("Isendpro/autoload.php");
        $api_instance = new Isendpro\Api\SmsApi();
        $smsrequest = new Isendpro\Model\SmsUniqueRequest(); // \Swagger\Client\Model\SMSRequest | sms request
        include("keyid.php");

        $smsrequest["keyid"]=$keyid;
        $smsrequest["num"] = $nro_tel;
        $smsrequest["sms"] = $message;
        $smsrequest["emetteur"]='SO-SHOOTING';

        try {
        $result = $api_instance->sendSms($smsrequest);
        //echo $result;
        } catch (Exception $e) {
        //echo 'Exception when calling SmsApi->sendSms: ', $e->getMessage(), PHP_EOL;
        $reponse_erreur=$e->getResponseBody();
        //echo json_encode($reponse_erreur);

        $select["REPONSE"]      = 'ERREUR';  
        $select["CODE_ERR"] 	 = $reponse_erreur;
        echo json_encode($select);
        exit(0);
        }

}
else
{
        $select["REPONSE"]      = 'ERREUR';  
        $select["MESS_ERR"] 	= 'Type de message erronné'; 
}
  
echo json_encode($select);
?>