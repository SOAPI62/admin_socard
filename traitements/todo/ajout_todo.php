<?php

// ------------------------------------------------------------------------------------------------------------------------------
// CONNEXION BDD
// ------------------------------------------------------------------------------------------------------------------------------

include '../connexion_bdd/conn.php';

// ------------------------------------------------------------------------------------------------------------------------------
// Récupération des variables URL
// ------------------------------------------------------------------------------------------------------------------------------

$data 						= $_GET['data'];
$todo        			    = json_decode($data, true);

// ------------------------------------------------------------------------------------------------------------------------------
// Initialisation des variables de sortie de la procédure
// ------------------------------------------------------------------------------------------------------------------------------

$select 			    = array();
$select["REPONSE"]      = '';
$select["CODE_ERR"]     = '';
$select["MESS_ERR"]     = '';
$select["CODE_SQL"]     = '';

// ------------------------------------------------------------------------------------------------------------------------------
// INITIALISATION DONNEES TODO
// ------------------------------------------------------------------------------------------------------------------------------

$CHEMIN_PROJET  = $todo['ajout_CHEMIN_PROJET']; 
$TACHE_TODO 	= strtoupper($todo['ajout_TITRE']); 
$DTECH_TODO 	= $todo['ajout_DATE_PLANNIF'];
$PRIO_TODO 	    = $todo['ajout_PRIORITE'];
$PROJRAT_TODO 	= $todo['ajout_PROJET3'];
$COM_TODO 	    = strtoupper($todo['ajout_COMMENTAIRE']);
$ID_RESSOURCE 	= $todo['ajout_RESSOURCE'];

$ajout_CLIENT	= strtoupper($todo['ajout_CLIENT']);
$ajout_CONTRAT	= strtoupper($todo['ajout_CONTRAT']);

$ID_APPAREIL    = ''; 

$date 			= date("Y-m-d");
$heure 			= date("H:i:s");
$DTHR_CREATION 		= $date . ' ' . $heure;
$nro_synchro 	= gen_uuid();

// ------------------------------------------------------------------------------------------------------------------------------
// CREATION TODO
// ------------------------------------------------------------------------------------------------------------------------------

$sql    = "INSERT INTO `TODO`( `CHEMIN_TODO`, `TACHE_TODO`, `DTECH_TODO`, `PRIO_TODO`, `PROJRAT_TODO`, `COM_TODO`, `DTHR_CREATION`, `ID_RESSOURCE`, `NRO_SYNCHRO`, `ID_APPAREIL`, `NRO_CLIENT`, `NRO_CONTRAT`, `ORIG_RESSOURCE`) VALUES ";
$sql   .= " ('$CHEMIN_PROJET', '$TACHE_TODO', '$DTECH_TODO', '$PRIO_TODO', '$PROJRAT_TODO', '$COM_TODO', '$DTHR_CREATION', '$ID_RESSOURCE', '$nro_synchro', '$ID_APPAREIL', '$ajout_CLIENT', '$ajout_CONTRAT', 1) ";

$stmt = $dbh->prepare($sql);
$stmt->execute();  

// ------------------------------------------------------------------------------------------------------------------------------
// INITIALISATION CODE RETOUR
// ------------------------------------------------------------------------------------------------------------------------------   

$select["REPONSE"]  = 'OK';
$select["CODE_ERR"] = 0;
$select["MESS_ERR"] = '';
$select["CODE_SQL"] = 0; 

// ------------------------------------------------------------------------------------------------------------------------------
// GENERATION UUID
// ------------------------------------------------------------------------------------------------------------------------------

function gen_uuid() {
	$uuid = array(
		'time_low'  => 0,
		'time_mid'  => 0,
		'time_hi'  => 0,
		'clock_seq_hi' => 0,
		'clock_seq_low' => 0,
		'node'   => array()
	);

	$uuid['time_low'] = mt_rand(0, 0xffff) + (mt_rand(0, 0xffff) << 16);
	$uuid['time_mid'] = mt_rand(0, 0xffff);
	$uuid['time_hi'] = (4 << 12) | (mt_rand(0, 0x1000));
	$uuid['clock_seq_hi'] = (1 << 7) | (mt_rand(0, 128));
	$uuid['clock_seq_low'] = mt_rand(0, 255);

	for ($i = 0; $i < 6; $i++) {
		$uuid['node'][$i] = mt_rand(0, 255);
	}

	$uuid = sprintf('%08x-%04x-%04x-%02x%02x-%02x%02x%02x%02x%02x%02x',
		$uuid['time_low'],
		$uuid['time_mid'],
		$uuid['time_hi'],
		$uuid['clock_seq_hi'],
		$uuid['clock_seq_low'],
		$uuid['node'],
		$uuid['node'][1],
		$uuid['node'][2],
		$uuid['node'][3],
		$uuid['node'][4],
		$uuid['node'][5]
	);

	return $uuid;
}

// ------------------------------------------------------------------------------------------------------------------------------
// CODE RETOUR 
// ------------------------------------------------------------------------------------------------------------------------------

echo json_encode($select);

?>