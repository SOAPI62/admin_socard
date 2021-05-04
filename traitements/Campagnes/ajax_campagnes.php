<?php
session_start();

include '../connexion_bdd/conn.php';

// storing  request (ie, get/post) global array to a variable  
$requestData= $_REQUEST;

$columns = array( 
    0 => 'Action', 
    1 => 'ID_CAMPAGNE',
    2 => 'NOM_CAMPAGNE',
    3 => 'DATE_CAMPAGNE',
    4 => 'NB_EMISSION',
    5 => 'ACTIF_CAMPAGNE'
);

// ON COMPTE LE NOMBRE D ENREGISTREMENT

$query = "SELECT `ID_CAMPAGNE`, `NOM_CAMPAGNE`, `MESSAGE_CAMPAGNE`, `DATE_CAMPAGNE`, `NB_EMISSION`, `ACTIF_CAMPAGNE` FROM `SOCARD_CAMPAGNES_SMS`";
$stmt = $dbh->prepare($query);
$stmt->execute();  
$totalData = $stmt->rowCount();
$totalFiltered = $totalData; 
  
// ON PARCOURT LA TABLE DE DONNEES

if( !empty($requestData['search']['value']) ) 
{
    // if there is a search parameter
    $query = "SELECT `ID_CAMPAGNE`, `NOM_CAMPAGNE`, `MESSAGE_CAMPAGNE`, `DATE_CAMPAGNE`, `NB_EMISSION`, `ACTIF_CAMPAGNE` FROM `SOCARD_CAMPAGNES_SMS`";
    $query.=" WHERE NOM_CAMPAGNE LIKE '%".$requestData['search']['value']."%' OR DATE_CAMPAGNE LIKE '%".$requestData['search']['value']."%' ";    // $requestData['search']['value'] contains search parameter

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
    $query = "SELECT `ID_CAMPAGNE`, `NOM_CAMPAGNE`, `MESSAGE_CAMPAGNE`, `DATE_CAMPAGNE`, `NB_EMISSION`, `ACTIF_CAMPAGNE` FROM `SOCARD_CAMPAGNES_SMS`";
    
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
    $nestedData[] = $row["ID_CAMPAGNE"];
    $nestedData[] = $row["NOM_CAMPAGNE"];
    $nestedData[] = $row["DATE_CAMPAGNE"];
    $nestedData[] = $row["NB_EMISSION"];
    

    if ($row["ACTIF_CAMPAGNE"] == 1)
    {
        $nestedData[] = 'ACTIF';
    }
    else {
        $nestedData[] = 'INACTIF';
    }
    


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