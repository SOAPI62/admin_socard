


<?php
session_start();

include '../connexion_bdd/conn.php';

// storing  request (ie, get/post) global array to a variable  
$requestData= $_REQUEST;

$columns = array( 
    0 => 'Action', 
    1 => 'ID_MSG',
    2 => 'DESC_COURT_MSG',
    3 => 'ACTIF_MSG'
);

// ON COMPTE LE NOMBRE D ENREGISTREMENT

$query = "SELECT `ID_MSG`, `DESC_COURT_MSG`, `DESC_MSG`, `ACTIF_MSG` FROM `SOCARD_MESSAGES`";
$stmt = $dbh->prepare($query);
$stmt->execute();  
$totalData = $stmt->rowCount();
$totalFiltered = $totalData; 
  
// ON PARCOURT LA TABLE DE DONNEES

if( !empty($requestData['search']['value']) ) 
{
    // if there is a search parameter
    $query = "SELECT `ID_MSG`, `DESC_COURT_MSG`, `DESC_MSG`, `ACTIF_MSG` FROM `SOCARD_MESSAGES`";
    $query.=" WHERE (DESC_COURT_MSG LIKE '%".$requestData['search']['value']."%' )";    // $requestData['search']['value'] contains search parameter

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
    $query = "SELECT `ID_MSG`, `DESC_COURT_MSG`, `DESC_MSG`, `ACTIF_MSG` FROM `SOCARD_MESSAGES`";
    
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
    $nestedData[] = $row["ID_MSG"];
    $nestedData[] = $row["DESC_COURT_MSG"];
    $nestedData[] = $row["ACTIF_MSG"];

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