<?php

$data = $_GET['data'];

$mail_expediteur = 'contact@so-api.fr';
$destinataire    = 'contact@so-api.fr';

$sujet = "So CARD : Trace ";

$message = $data;

$headers  =  null;
$headers .= 'MIME-Version: 1.0' . "\r\n"; 
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n"; 
$headers .= 'From: So Shooting <'.$mail_expediteur.'>' . "\r\n"; 
$headers .= 'BCC: ' . $cc . "\r\n";
 $headers .= 'Reply-To: So Shooting <'.$destinataire.'>' . "\r\n"; 
$headers .= 'X-Mailer: PHP/'.phpversion().'' . "\r\n"; 

mail($destinataire,$sujet,$message,$headers);

    ?>