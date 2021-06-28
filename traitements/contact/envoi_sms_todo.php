<?php
session_start();

// ----------------------------------------------------------------------
// Connexion à la base de données
// ----------------------------------------------------------------------

include '../connexion_bdd/conn.php';

// Récupération des variables URL
$nro_tel      = $_GET['nro_tel'];
$nro_tel      = str_replace(' ', '', $nro_tel);


$message = $_GET['message'];


// Initialisation des variables de sortie de la procédure

$select = array();
$select["REPONSE"]      = 'OK';
$select["CODE_ERR"]     = '';
$select["MESS_ERR"]     = '';
$select["CODE_SQL"]     = '';
$select["NRO_CONTRAT"]  = '';


if ($message != ''){
        if(strlen($message) < 154){
                // ------------------------------------------------------------------------------------------------------------------------------
                // Chargement bibliotheque SMS ISENDPRO SI 1 MESSAGE
                // ------------------------------------------------------------------------------------------------------------------------------

                require_once("Isendpro/autoload.php");
                $api_instance = new Isendpro\Api\SmsApi();
                $smsrequest = new Isendpro\Model\SmsUniqueRequest(); // \Swagger\Client\Model\SMSRequest | sms request
                include("keyid.php");

                $smsrequest["keyid"]=$keyid;
                $smsrequest["num"] = $nro_tel;
                $smsrequest["sms"] = $message;
                $smsrequest["emetteur"]='SO-SHOOTING';
                $smsrequest["smslong"] = 1;

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
        }else{
                // ------------------------------------------------------------------------------------------------------------------------------
                // Chargement bibliotheque SMS ISENDPRO SI 2 MESSAGES
                // ------------------------------------------------------------------------------------------------------------------------------

                require_once("Isendpro/autoload.php");
                $api_instance = new Isendpro\Api\SmsApi();
                $smsrequest = new Isendpro\Model\SmsUniqueRequest(); // \Swagger\Client\Model\SMSRequest | sms request
                include("keyid.php");

                $smsrequest["keyid"]=$keyid;
                $smsrequest["num"] = $nro_tel;
                $smsrequest["sms"] = $message;
                $smsrequest["emetteur"]='SO-SHOOTING';
                $smsrequest["smslong"] = 2;

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
}
else
{
        $select["REPONSE"]      = 'ERREUR';  
        $select["MESS_ERR"] 	= 'Type de message erronné'; 
}
  
echo json_encode($select);
?>