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
    case 'mois':
        $periodicite =  ['Jan', 'Fev', 'Mar', 'Avr', 'Mai', 'Jui', 'Jui', 'Aou', 'Sep', 'Oct', 'Nov', 'Dec'];
        $sql = "SELECT `MOIS_PER`, count(*) FROM `SOCARD_JOURNAL`, `PERIODES` WHERE `date_connexion`= `DATE_PER`  GROUP BY `MOIS_PER`";
        $req = $dbh->prepare($sql);
        $req->execute($tab);

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
        $select["EVOLUTION_CONNEXIONS"] = ((float)$nb_connexions_m - (float)$nb_connexions_m_1) / (float)$nb_connexions_m_1 * 100;
        $select["PERIODICITE"]          = $periodicite;
        break;

    case 'trimestre':
        $periodicite =  ['T1', 'T2', 'T3', 'T4'];
        $sql = "SELECT `TRIMESTRE`, count(*), substr(`TRIMESTRE`,2,1) FROM `SOCARD_JOURNAL`, `PERIODES` WHERE `date_connexion`= `DATE_PER` GROUP BY `TRIMESTRE`";
        echo $sql;
        $req = $dbh->prepare($sql);
        $req->execute($tab);

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
        $select["EVOLUTION_CONNEXIONS"] = ((float)$nb_connexions_t - (float)$nb_connexions_t_1) / (float)$nb_connexions_t_1 * 100;
        $select["PERIODICITE"]          = $periodicite;



        break;
    default:
        # code...
        break;
}







echo json_encode($select);
exit(0);
?>