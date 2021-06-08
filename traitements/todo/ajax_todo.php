<?php
session_start();

include '../connexion_bdd/conn.php';

// storing  request (ie, get/post) global array to a variable  
$requestData= $_REQUEST;

$columns = array( 
    0 => 'Action', 
    1 => 'ID_TODO',
    2 => 'CD_CLIENT',
    3 => 'NOM1_CLIENT',
    4 => 'PNOM1_CLIENT',
    5 => 'POR_CLIENT',
    6 => 'EMAIL_CLIENT',
    7 => 'TACHE_TODO',
    8 => 'COM_TODO',
    9 => 'TACHEFF_TODO',
    10 => 'PRIO_TODO'
);

// ON COMPTE LE NOMBRE D ENREGISTREMENT

$query = "SELECT `ID_TODO`, `CD_CLIENT`, `NOM1_CLIENT`, `PNOM1_CLIENT`, `POR_CLIENT`, `EMAIL_CLIENT`, `TACHE_TODO`, `COM_TODO`, `TACHEFF_TODO`, `PRIO_TODO` FROM `TODO`,`CLIENTS`  WHERE `NRO_CLIENT` = `CD_CLIENT` AND `SUPPORT_COM`='SOCARD' ORDER BY `TODO`.`DTHR_CREATION`";
 
$stmt = $dbh->prepare($query);
$stmt->execute();  
$totalData = $stmt->rowCount();
$totalFiltered = $totalData; 
  
// ON PARCOURT LA TABLE DE DONNEES

if( !empty($requestData['search']['value']) ) 
{
    // if there is a search parameter
    $query = "SELECT `ID_TODO`, `CD_CLIENT`, `NOM1_CLIENT`, `PNOM1_CLIENT`, `POR_CLIENT`, `EMAIL_CLIENT`, `TACHE_TODO`, `COM_TODO`, `TACHEFF_TODO`, `PRIO_TODO` FROM `TODO`,`CLIENTS` ";
    $query.=" WHERE `NRO_CLIENT` = `CD_CLIENT` AND `SUPPORT_COM`='SOCARD' AND (POR_CLIENT LIKE '%".$requestData['search']['value']."%' OR NOM1_CLIENT LIKE '%".$requestData['search']['value']."%' OR TACHE_TODO LIKE '%".$requestData['search']['value']."%' )";    // $requestData['search']['value'] contains search parameter

    $stmt = $dbh->prepare($query);
    $stmt->execute();  
    $totalFiltered = $stmt->rowCount();

    $stmt = $dbh->prepare($query);
    $stmt->execute();  
}
else 
{   
    $query = "SELECT `ID_TODO`, `CD_CLIENT`, `NOM1_CLIENT`, `PNOM1_CLIENT`, `POR_CLIENT`, `EMAIL_CLIENT`, `TACHE_TODO`, `COM_TODO`, `TACHEFF_TODO`, `PRIO_TODO` FROM `TODO`,`CLIENTS`  WHERE `NRO_CLIENT` = `CD_CLIENT` AND `SUPPORT_COM`='SOCARD' ORDER BY `TODO`.`DTHR_CREATION`";

    if ($columns[$requestData['order'][0]['column']] != 'Action')
    {
        $query.="   LIMIT ".$requestData['start']." ,".$requestData['length']."   "; 
    } 
    else
    {
        $query.=" LIMIT ".$requestData['start']." ,".$requestData['length']."   "; 
    }

    $stmt = $dbh->prepare($query);
    $stmt->execute();  

}

$data = array();
while( $row=$stmt->fetch() ) {  // preparing an array
    $nestedData=array(); 

    $nestedData[] = "";
    $nestedData[] = $row["ID_TODO"];
    $nestedData[] = $row["CD_CLIENT"];
    $nestedData[] = $row["NOM1_CLIENT"];
    $nestedData[] = $row["PNOM1_CLIENT"];
    $nestedData[] = $row["POR_CLIENT"];
    $nestedData[] = $row["EMAIL_CLIENT"];
    $nestedData[] = $row["TACHE_TODO"];
    $nestedData[] = $row["COM_TODO"];
    $nestedData[] = $row["PRIO_TODO"];
    $nestedData[] = $row["TACHEFF_TODO"];
       
    $data[] = $nestedData;
}

// PAREPARATION DU BLOC REPONSE

$json_data = array(
    "draw"            => intval( $requestData['draw'] ),   // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw. 
    "recordsTotal"    => intval( $totalData ),  // total number of records
    "recordsFiltered" => intval( $totalFiltered ), // total number of records after searching, if there is no searching then totalFiltered = totalData
    "data"            => $data   // total data array
);

echo json_encode($json_data);  // send data as json format
?>