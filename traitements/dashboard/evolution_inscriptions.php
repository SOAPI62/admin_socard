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
    case 'par mois':
        $periodicite =  ['Jan', 'Fev', 'Mar', 'Avr', 'Mai', 'Jui', 'Jui', 'Aou', 'Sep', 'Oct', 'Nov', 'Dec'];
        $sql = "SELECT `MOIS_PER`, count(*) FROM `SOCARD_INSTAL`, `PERIODES` WHERE `date_creation` <>'0000-00-00' AND `date_creation`= `DATE_PER`  AND ( (`agent`='ios' and `app_install`=0) OR (`agent`='android')) GROUP BY `MOIS_PER`";
        $req = $dbh->prepare($sql);
        $req->execute();

        $mois = [0,0,0,0,0,0,0,0,0,0,0,0];
        $max  = 0;

        $mois_encours   = $today = date("m"); 

        $mois_precedent = $mois_encours - 1;

        $nb_inscrit_m   = 0;
        $nb_inscrit_m_1 = 0;

        while ($row = $req->fetch())
        {
            $indice = $row[0];
            $mois[$indice-1] = $row[1];

            if ($max < $row[1] ) {
                $max = $row[1];
            }

            if ( $mois_encours == $row[0] )
            {
                $nb_inscrit_m = $row[1];
            }

            if ( ($mois_precedent ) == $row[0] )
            {
                $nb_inscrit_m_1 = $row[1];
            }

        }
        $select["INSCRIPTIONS"]         = $mois;
        $select["MAX_INSCRIPTIONS"]     = $max;
        $select["PERIODICITE"]          = $periodicite;

        if ((float)$nb_inscrit_m_1 == 0)
        {
            $select["EVOLUTION_INSCRIPTIONS"] = -100;

        }
        else {
            $evo_mois = ((float)$nb_inscrit_m - (float)$nb_inscrit_m_1) / (float)$nb_inscrit_m_1 * 100;  
            $select["EVOLUTION_INSCRIPTIONS"] =  number_format($evo_mois,2);
        }

        $select["nb_inscrit_m"] = $nb_inscrit_m;
        $select["nb_inscrit_m_1"] = $nb_inscrit_m_1;

        break;
 
    case 'par semaine':
        $periodicite = [];
        $semaine = [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0];

        for ($i=0; $i < 53; $i++) { 
            $periodicite[$i] =  $i;
        }
        
        $max            = 0;
        $nb_inscrit_s   = 0;
        $nb_inscrit_s_1 = 0;

        $sql = "SELECT `SEMAINE`, count(*)  FROM `SOCARD_INSTAL`, `PERIODES` WHERE `ANNEE`=2021 AND `date_creation` <>'0000-00-00' AND `date_creation`= `DATE_PER`  AND ( (`agent`='ios' and `app_install`=0) OR (`agent`='android')) GROUP BY `SEMAINE`";
        $req = $dbh->prepare($sql);
        $req->execute();
        
        while ($row = $req->fetch())
        {
            $indice = (int)$row[0]; 
            $semaine[$indice] = $row[1];           

            $d = date("d"); 
            $m = date("m"); 
            $y = date("Y"); 

            $semaine_encours = ISOWeek($y , $m , $d);
            $semaine_precedent = $semaine_encours - 1;

            if ( $semaine_encours == $row[0] )
            {
                $nb_inscrit_s = $row[1];
            }

            if ( ($semaine_precedent) == $row[0] )
            {
                $nb_inscrit_s_1 = $row[1];
            }

            if ($max < $row[1] ) {
                $max = $row[1];
            }
        }

        $select["INSCRIPTIONS"]         = $semaine;
        $select["MAX_INSCRIPTIONS"]     = $max;
        $select["PERIODICITE"]          = $periodicite;

        if ((float)$nb_inscrit_s_1 == 0)
        {
            $select["EVOLUTION_INSCRIPTIONS"] = -100;

        }
        else {
            $evo_semaine = ((float)$nb_inscrit_s - (float)$nb_inscrit_s_1) / (float)$nb_inscrit_s_1 * 100;
            $select["EVOLUTION_INSCRIPTIONS"] =  number_format($evo_semaine,2);
        }

        $select["nb_inscrit_s"] = $nb_inscrit_s;
        $select["nb_inscrit_s_1"] = $nb_inscrit_s_1;

        break; 
    case 'par trimestre':
        $periodicite =  ['T1', 'T2', 'T3', 'T4'];
        $sql = "SELECT `TRIMESTRE`, count(*), substr(`TRIMESTRE`,2,1) FROM `SOCARD_INSTAL`, `PERIODES` WHERE `ANNEE`=2021 AND `date_creation` <>'0000-00-00' AND `date_creation`= `DATE_PER`  AND ( (`agent`='ios' and `app_install`=0) OR (`agent`='android')) GROUP BY `TRIMESTRE`";
        $req = $dbh->prepare($sql);
        $req->execute();

        $trimestre = [0,0,0,0];
        $max  = 0;

        $mois_encours        = date("m"); 

        $trimestre_encours   = fmod($mois_encours,4 ); 
        $trimestre_precedent = $trimestre_encours - 1;

        $nb_inscrit_t   = 0;
        $nb_inscrit_t_1 = 0;

        while ($row = $req->fetch())
        {
            $indice = $row[2] - 1; 
            $trimestre[$indice] = $row[1];

            if ($max < $row[1] ) {
                $max = $row[1];
            }

            if ( $trimestre_encours == $row[0] )
            {
                $nb_inscrit_t = $row[1];
            }

            if ( ($trimestre_precedent) == $row[0] )
            {
                $nb_inscrit_t_1 = $row[1];
            }
        }
        $select["INSCRIPTIONS"]         = $trimestre;
        $select["MAX_INSCRIPTIONS"]     = $max;
        $select["PERIODICITE"]          = $periodicite;

        if ((float)$nb_inscrit_t_1 == 0)
        {
            $select["EVOLUTION_INSCRIPTIONS"] = -100;

        }
        else {
            $evo_trimestre = ((float)$nb_inscrit_t - (float)$nb_inscrit_t_1) / (float)$nb_inscrit_t_1 * 100;
            $select["EVOLUTION_INSCRIPTIONS"] =  number_format($evo_trimestre,2);
        }

        break; 
        case 'cette semaine':
            $d = date("d"); 
            $m = date("m"); 
            $y = date("Y"); 
            $semaine_encours = ISOWeek($y , $m , $d);
    
            $periodicite =  ['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche'];
            $sql = "SELECT `JOUR_LIB_PER`, count(*) FROM `SOCARD_INSTAL`, `PERIODES` WHERE `SEMAINE`='$semaine_encours' AND `date_creation` <>'0000-00-00' AND `date_creation`= `DATE_PER`  AND ( (`agent`='ios' and `app_install`=0) OR (`agent`='android')) GROUP BY `JOUR_LIB_PER`";
            $req = $dbh->prepare($sql);
            $req->execute();
    
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
    default:
        # code...
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