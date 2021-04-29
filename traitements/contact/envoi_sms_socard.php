<?php
session_start();

// ----------------------------------------------------------------------
// Connexion à la base de données
// ----------------------------------------------------------------------

include '../connexion_bdd/conn.php';

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

$query = "SELECT `ID_MSG`, `DESC_COURT_MSG`, `DESC_MSG`, `ACTIF_MSG` FROM `SOCARD_MESSAGES` WHERE `ID_MSG`='$type_message'";

try {
        $stmt = $dbh->prepare($query);
        $stmt->execute();
        $row = $stmt->fetch();
    } catch (PDOException $e) {
        $select["CODE_RETOUR"] = 'ERREUR';
        $select["MESSAGE_SQL"] = 'ERREUR DE TRAITEMENT : ' . $query;
    } finally {
        if ($select["CODE_RETOUR"] != 'ERREUR') {
            $select["CODE_RETOUR"]      = 'OK';
        $message                        =  $row[2];                          
        }
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