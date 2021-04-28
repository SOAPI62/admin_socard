<?php
session_start();

include '../../connexion_bdd/conn.php';

// storing  request (ie, get/post) global array to a variable  
$requestData= $_REQUEST;

// DB table to use
$table = 'SOCARD_STRUCTURE';

$columns = array( 
    0 => 'Action', 
    1 => 'ID_STRUCTURE',
    2 => 'POS_STRUCTURE',
    3 => 'NOM_STRUCTURE',
    4 => 'ACTIF_STRUCTURE'
);

// ON COMPTE LE NOMBRE D ENREGISTREMENT

$query = "SELECT `ID_STRUCTURE`, `POS_STRUCTURE`, `NOM_STRUCTURE`, `ACTIF_STRUCTURE` FROM `SOCARD_STRUCTURE`";
$stmt = $dbh->prepare($query);
$stmt->execute();  
$totalData = $stmt->rowCount();
$totalFiltered = $totalData; 
  
// ON PARCOURT LA TABLE DE DONNEES

if( !empty($requestData['search']['value']) ) 
{
    // if there is a search parameter
    $query = "SELECT `ID_STRUCTURE`, `POS_STRUCTURE`, `NOM_STRUCTURE`, `ACTIF_STRUCTURE` FROM `SOCARD_STRUCTURE`";
    $query.=" WHERE (NOM_STRUCTURE LIKE '%".$requestData['search']['value']."%' )";    // $requestData['search']['value'] contains search parameter

    $stmt = $dbh->prepare($query);
    $stmt->execute();  
    $totalFiltered = $stmt->rowCount();

    if ($columns[$requestData['order'][0]['column']] != 'Action') {
        $query .= " ORDER BY " . $columns[$requestData['order'][0]['column']] . "   " . $requestData['order'][0]['dir'] . "   LIMIT " . $requestData['start'] . " ," . $requestData['length'] . "   "; 
    }

    $stmt = $dbh->prepare($query);
    $stmt->execute();  
}
else 
{   
    $query = "SELECT `ID_STRUCTURE`, `POS_STRUCTURE`, `NOM_STRUCTURE`, `ACTIF_STRUCTURE` FROM `SOCARD_STRUCTURE`";
    
    if ($columns[$requestData['order'][0]['column']] != 'Action')
    {
        $query.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."   LIMIT ".$requestData['start']." ,".$requestData['length']."   "; 
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
    $nestedData[] = $row["ID_STRUCTURE"];
    $nestedData[] = $row["POS_STRUCTURE"];
    $nestedData[] = $row["NOM_STRUCTURE"];
    
    if ($row["ACTIF_STRUCTURE"] == 1)
    {
        $row["ACTIF_STRUCTURE"] = 'ACTIF';
    }
    else 
    {
        $row["ACTIF_STRUCTURE"] = 'INACTIF';
    }
    $nestedData[] = $row["ACTIF_STRUCTURE"];

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