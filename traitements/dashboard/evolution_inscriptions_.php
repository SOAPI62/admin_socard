<?php

// Connexion à la base de données
include '../connexion_bdd/conn.php';

// Lecture des parametres

$mode           = $_GET['mode'];
$periodicite    = [];

// Initialisation des variables de sortie de la procédure

$select = array();
$select["REPONSE"] = 'OK';
$select["CODE_ERR"] = 0;
$select["MESS_ERR"] = '';   
$select["CODE_SQL"] = '';

switch ($mode) {
    case 'semaine':
        $d = date("d"); 
        $m = date("m"); 
        $y = date("Y"); 
        $semaine_encours = ISOWeek($y , $m , $d);

        $periodicite =  ['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche'];
        $sql = "SELECT `JOUR_LIB_PER`, count(*) FROM `SOCARD_INSTAL`, `PERIODES` WHERE `SEMAINE`='$semaine_encours' AND `date_creation` <>'0000-00-00' AND `date_creation`= `DATE_PER`  AND ( (`agent`='ios' and `app_install`=0) OR (`agent`='android')) GROUP BY `JOUR_LIB_PER`";
        $req = $dbh->prepare($sql);
        $req->execute($tab);

        $mois = [0,0,0,0,0,0,0];
        $max  = 0;

        while ($row = $req->fetch())
        {
            switch ($row[0]) {
                    case 'Lundi':
                    $indice = 1;
                    break;
                    case 'Mardi':
                    $indice = 2;
                    break;
                    case 'Mercredi':
                    $indice = 3;
                    break;
                    case 'Jeudi':
                    $indice = 4;
                    break;
                    case 'Vendredi':
                    $indice = 5;
                    break;    
                    case 'Samedi':
                    $indice = 6;
                    break;  
                    case 'Dimanche':
                    $indice = 6;
                    break;             
            }
            $mois[$indice-1] = $row[1];

            if ($max < $row[1] ) {
                $max = $row[1];
            }
        }
        $select["INSCRIPTIONS"]         = $mois;
        $select["MAX_INSCRIPTIONS"]     = $max;
        $select["PERIODICITE"]          = $periodicite;
        break;
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

 echo json_encode($select);
exit(0);
?>