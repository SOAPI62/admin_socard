<?php


//  -------------------------------------------------------------------------------------------------------------------------------------------------
//  CONNEXION A LA BASE DE DONNEES
//  -------------------------------------------------------------------------------------------------------------------------------------------------     

include '../connexion_bdd/conn.php';

$Lib_Jour ='';

//  -------------------------------------------------------------------------------------------------------------------------------------------------
//  VERICATION QUE L ANNEE ENCOURS ET L ANNEE ENCOURS + 1 SONT BIEN ALIMENTEES
//  -------------------------------------------------------------------------------------------------------------------------------------------------     

//$annee_encours 	   = date('Y');
$annee_encours     = 2021;
$annee_encours_plus_1 = $annee_encours + 1;

$sql  = " SELECT count(*) ";
$sql .= " FROM PERIODES ";
$sql .= " WHERE annee in ( $annee_encours, $annee_encours_plus_1 )";
$req = $dbh->prepare($sql);
$req->execute($tab);


//SI LE NOMBRE DE EST = A 730 IL FAUT QUITTER 
if ( $Nb_Jours[0] == 730)
{
  exit(1);
}

//  -------------------------------------------------------------------------------------------------------------------------------------------------
//  ALIMENTATION DE LA TABLE PERIODE 
//  -------------------------------------------------------------------------------------------------------------------------------------------------     

//$reference = date('Y') . '-01-01';
$reference = '2021-01-01';

$ts = strtotime($reference);

$unjour = 3600 * 24;

//  -------------------------------------------------------------------------------------------------------------------------------------------------
//  INITIALISATION DU PREMIER JOUR DE L ANNEE ENCOURS
//  -------------------------------------------------------------------------------------------------------------------------------------------------

for ($i = 1; $i <= 730; $i++) {

 $date = date('Y-m-d',$ts);
 echo $date;
 $Jour = date('j',$ts);
 $Jour_Semaine = date('w',$ts);
 $Jour_Ouvre   = date('w',$ts);

 if ($Jour_Semaine == '0') { $Lib_Jour = 'Dimanche'; }	
 if ($Jour_Semaine == '1') { $Lib_Jour = 'Lundi'; }	
 if ($Jour_Semaine == '2') { $Lib_Jour = 'Mardi'; }	
 if ($Jour_Semaine == '3') { $Lib_Jour = 'Mercredi'; }	
 if ($Jour_Semaine == '4') { $Lib_Jour = 'Jeudi'; }	
 if ($Jour_Semaine == '5') { $Lib_Jour = 'Vendredi'; }	
 if ($Jour_Semaine == '6') { $Lib_Jour = 'Samedi'; }	

 if (($Jour_Semaine > 0) && ($Jour_Semaine < 6))
 {
  $Jour_Ouvre = 1;
}
else
{
  $Jour_Ouvre = 0;
}

$Mois = date('m',$ts);
if ($Mois == '01') { $Lib_Mois = "Janvier"; }	
if ($Mois == '02') { $Lib_Mois = "Fevrier"; }	
if ($Mois == '03') { $Lib_Mois = "Mars"; }	
if ($Mois == '04') { $Lib_Mois = "Avril"; }	
if ($Mois == '05') { $Lib_Mois = "Mai"; }	
if ($Mois == '06') { $Lib_Mois = "Juin"; }	
if ($Mois == '07') { $Lib_Mois = "Juillet"; }	
if ($Mois == '08') { $Lib_Mois = "Aout"; }	
if ($Mois == '09') { $Lib_Mois = "Septembre"; }	
if ($Mois == '10') { $Lib_Mois = "Octobre"; }
if ($Mois == '11') { $Lib_Mois = "Novembre"; }	
if ($Mois == '12') { $Lib_Mois = "Decembre"; }

$Annee = date('Y',$ts);

$Semaine  = date('W', $ts);

		//Determine le trimestre en cours ainsi que les semestres

$Trimestre = 'T' . (string)(floor(((int)$Mois-1)/3)+1); 

if (date('m',$ts) <=6 ) { $Semestre = 'S1';} else { $Semestre = 'S2';}	

$Jour_ferie = isNotWorkable($date);

if ($Jour_ferie !=1) {$Jour_ferie =0; }

$semaine =  ISOWeek($Annee , $Mois ,  $Jour);

$sql  = "INSERT INTO `PERIODES`(`DATE_PER`, `JOUR_PER`, `JOUR_LIB_PER`, `MOIS_PER`, `MOIS_LIB_PER`, `ANNEE`, `TRIMESTRE`, `SEMESTRE`, `FERIE`, `SEMAINE`) VALUES ";
$sql .= "('$date','$Jour','$Lib_Jour','$Mois','$Lib_Mois','$Annee', '$Trimestre', '$Semestre', '$Jour_ferie', '$semaine')";

$req = $dbh->prepare($sql);
$req->execute($tab);


$ts += $unjour;
}

//  -------------------------------------------------------------------------------------------------------------------------------------------------
//  REGARDE ET ANALYSE LE CAS OU LE JOUR SERAIS FERIER OU NON 
//  -------------------------------------------------------------------------------------------------------------------------------------------------     	

function isNotWorkable($date)
{

// $date = date('m/d/Y ', strtotime($date));


$date = date('m/d/Y',strtotime($date));//Convertir en jour mois année

$year = date('Y',strtotime($date)); //Convertir en année

//POUR PAQUE

$easterDate  = easter_date($year);
$easterDay   = date('j', $easterDate);
$easterMonth = date('n', $easterDate);
$easterYear   = date('Y', $easterDate);

$holidays = array(
   // Dates fixes
   mktime(0, 0, 0, 1,  1,  $year),  // 1er janvier
   mktime(0, 0, 0, 5,  1,  $year),  // Fête du travail
   mktime(0, 0, 0, 5,  8,  $year),  // Victoire des alliés
   mktime(0, 0, 0, 7,  14, $year),  // Fête nationale
   mktime(0, 0, 0, 8,  15, $year),  // Assomption
   mktime(0, 0, 0, 11, 1,  $year),  // Toussaint
   mktime(0, 0, 0, 11, 11, $year),  // Armistice
   mktime(0, 0, 0, 12, 25, $year),  // Noel

   // Dates variables (PAQUE)
   mktime(0, 0, 0, $easterMonth, $easterDay + 1,  $easterYear),
   mktime(0, 0, 0, $easterMonth, $easterDay + 39, $easterYear),
   mktime(0, 0, 0, $easterMonth, $easterDay + 50, $easterYear),
 );

 return in_array(strtotime($date), $holidays); // Retourne la valeur true ou false apres verification 

}

function ISOWeek($y , $m , $d){
    $week=strftime("%W", mktime(0, 0, 0, $m, $d, $y)); 
     $dow0101=getdate(mktime(0, 0, 0, 1, 1, $y)); 
     if ($dow0101["wday"]>1 && 
     $dow0101["wday"]<5) 
     $week++; 
     elseif ($week==0) 
     $week=53; 
     return(substr("00" . $week, -2)); 
   }


?>    