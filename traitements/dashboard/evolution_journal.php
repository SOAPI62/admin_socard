<?php

// Connexion à la base de données
include '../connexion_bdd/conn.php';

$mode_conn           = $_GET['mode'];
$periodicite         = [];

// Initialisation des variables de sortie de la procédure

$select = array();
$select["REPONSE"] = 'OK';
$select["CODE_ERR"] = 0;
$select["MESS_ERR"] = '';
$select["CODE_SQL"] = '';

switch ($mode_conn) {

    case 'semaine':
        $periodicite = [];
        $semaine = [];

        $d = date("d"); 
        $m = date("m"); 
        $y = date("Y"); 

        $semaine_encours = ISOWeek($y , $m , $d);

        if($semaine_encours == 52){
            $semaine = [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0];
        }
        else{
            for ($i=0; $i < $semaine_encours + 2; $i++) { 
                array_push($semaine, 0);
            }
        }
        
        for ($i=0; $i < count($semaine); $i++) { 
            $periodicite[$i] =  $i;
        }
        
        $max              = 0;
        $nb_connexion_s   = 0;
        $nb_connexion_s_1 = 0;

        $sql = "SELECT `SEMAINE`, count(*) FROM `SOCARD_JOURNAL`, `PERIODES` WHERE `date_connexion`= `DATE_PER` AND `ANNEE`='$y' GROUP BY `SEMAINE`";
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
                $nb_connexion_s = $row[1];
            }

            if ( $semaine_precedent == $row[0] )
            {
                $nb_connexion_s_1 = $row[1];
            }

            if ($max < $row[1] ) {
                $max = $row[1];
            }
        }

        $select["CONNEXIONS"]         = $semaine;
        $select["MAX_CONNEXIONS"]     = $max;
        $select["PERIODICITE"]        = $periodicite;

        if ((float)$nb_connexion_s_1 == 0)
        {
            $select["EVOLUTION_CONNEXIONS"] = -100;

        }
        else {
            $evo_semaine = ((float)$nb_connexion_s - (float)$nb_connexion_s_1) / (float)$nb_connexion_s_1 * 100;
            $select["EVOLUTION_CONNEXIONS"] =  number_format($evo_semaine,2);
        }

        $select["nb_connexion_s"] = $nb_connexion_s;
        $select["nb_connexion_s_1"] = $nb_connexion_s_1;

        break; 

    case 'mois':
        $periodicite =  ['Jan', 'Fev', 'Mar', 'Avr', 'Mai', 'Jui', 'Jui', 'Aou', 'Sep', 'Oct', 'Nov', 'Dec'];
        $y = date("Y");
        $sql = "SELECT `MOIS_PER`, count(*) FROM `SOCARD_JOURNAL`, `PERIODES` WHERE `date_connexion`= `DATE_PER`  AND `ANNEE`='$y' GROUP BY `MOIS_PER`";
        $req = $dbh->prepare($sql);
        $req->execute();

        $mois = [0,0,0,0,0,0,0,0,0,0,0,0];
        $max  = 0;

        $mois_encours   = $today = date("m"); 
        $mois_precedent = $mois_encours -1;

        $nb_connexions_m   = 0;
        $nb_connexions_m_1 = 0;

        while ($row = $req->fetch())
        {
            $indice = $row[0];
            $mois[$indice-1] = $row[1];

            if ($max < $row[1] ) {
                $max = $row[1];
            }

            if ( $mois_encours == $row[0] )
            {
                $nb_connexions_m = $row[1];
            }

            if ( ($row[0] + 1) ==  $mois_encours)
            {
                $nb_connexions_m_1 = $row[1];
            }


        }

        $select["CONNEXIONS"]           = $mois;
        $select["MAX_CONNEXIONS"]       = $max;
        if ((float)$nb_connexions_m_1 == 0)
        {
            $select["EVOLUTION_CONNEXIONS"] = -100;

        }
        else {

            $evo_mois = ((float)$nb_connexions_m - (float)$nb_connexions_m_1) / (float)$nb_connexions_m_1 * 100;
            $select["EVOLUTION_CONNEXIONS"] =  number_format($evo_mois,2);
        }

        $select["PERIODICITE"]          = $periodicite;

        break;

    case 'trimestre':
        $periodicite =  ['T1', 'T2', 'T3', 'T4'];
        $y = date("Y");
        $sql = "SELECT `TRIMESTRE`, count(*), substr(`TRIMESTRE`,2,1) FROM `SOCARD_JOURNAL`, `PERIODES` WHERE `date_connexion`= `DATE_PER` AND `ANNEE`='$y' GROUP BY `TRIMESTRE`";

         $req = $dbh->prepare($sql);
        $req->execute();

        $trimestre = [0,0,0,0];
        $max  = 0;

        $mois_encours        = date("m"); 

        $trimestre_encours   = fmod($mois_encours,4 ); 
        $trimestre_precedent = $trimestre_encours - 1;

        $nb_connexion_t   = 0;
        $nb_connexion_t_1 = 0;

        while ($row = $req->fetch())
        {
            $indice = $row[2] - 1; 
            $trimestre[$indice] = $row[1];

            if ($max < $row[1] ) {
                $max = $row[1];
            }

            if ( $trimestre_encours == $row[0] )
            {
                $nb_connexion_t = $row[1];
            }

            if ( ($trimestre_precedent + 1) == $row[0] )
            {
                $nb_connexion_t_1 = $row[1];
            }
        }

        $select["CONNEXIONS"]           = $trimestre;
        $select["MAX_CONNEXIONS"]       = $max;

        if ((float)$nb_connexion_t_1 == 0)
        {
            $select["EVOLUTION_CONNEXIONS"] = -100;

        }
        else {
            $evo_trimeste = ((float)$nb_connexion_t - (float)$nb_connexion_t_1) / (float)$nb_connexion_t_1 * 100;
            $select["EVOLUTION_CONNEXIONS"] =  number_format($evo_trimestre,2);
        }

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