<?php
session_start();

include '../connexion_bdd/conn.php';

// storing  request (ie, get/post) global array to a variable  
$requestData= $_REQUEST;

$columns = array( 
    0 => 'Action', 
    1 => 'SUPPORT_COM',
    2 => 'CD_CLIENT',
    3 => 'SUPPORT_COM',
    4 => 'ORI_CLIENT',
    5 => 'NOM1_CLIENT',
    6 => 'POR_CLIENT',
    7 => 'EMAIL_CLIENT',
    8 => 'ACTIF_Client ',
    9 => 'EXCLU '
);

// ON COMPTE LE NOMBRE D ENREGISTREMENT

$query = "SELECT `CD_CLIENT`, `ORI_CLIENT`, `TYP_CLIENT`, `CIV1_CLIENT`, `NOM1_CLIENT`, `PNOM1_CLIENT`, `CIV2_CLIENT`, `NOM2_CLIENT`, `PNOM2_CLIENT`, `ADR1_CLIENT`, `ADR2_CLIENT`, `VILLE_CLIENT`, `CPOSTAL_CLIENT`, `POR_CLIENT`, `TEL_CLIENT`, `EMAIL_CLIENT`, `CD_FIDELITE`, `IND_PROSP`, `ACTIF_Client`, `DTHR_CREATION`, `DTHR_MAJ`, `TYPE_CLIENT`, `EXCLU_MAILING`, `EXCLU_SMS`, `DT_TRF_CLT`, `CUSTOMER_ID_ECOM`, `ANNOTATION_CLIENT`,`SUPPORT_COM`  FROM `CLIENTS` WHERE `SUPPORT_COM`='SOCARD'";

$stmt = $dbh->prepare($query);
$stmt->execute();  
$totalData = $stmt->rowCount();
$totalFiltered = $totalData; 
  
// ON PARCOURT LA TABLE DE DONNEES

if( !empty($requestData['search']['value']) ) 
{
    // if there is a search parameter
    $query = "SELECT `CD_CLIENT`, `ORI_CLIENT`, `TYP_CLIENT`, `CIV1_CLIENT`, `NOM1_CLIENT`, `PNOM1_CLIENT`, `CIV2_CLIENT`, `NOM2_CLIENT`, `PNOM2_CLIENT`, `ADR1_CLIENT`, `ADR2_CLIENT`, `VILLE_CLIENT`, `CPOSTAL_CLIENT`, `POR_CLIENT`, `TEL_CLIENT`, `EMAIL_CLIENT`, `CD_FIDELITE`, `IND_PROSP`, `ACTIF_Client`, `DTHR_CREATION`, `DTHR_MAJ`, `TYPE_CLIENT`, `EXCLU_MAILING`, `EXCLU_SMS`, `DT_TRF_CLT`, `CUSTOMER_ID_ECOM`, `ANNOTATION_CLIENT`,`SUPPORT_COM`  FROM `CLIENTS`";
    $query.=" WHERE (`SUPPORT_COM`='SOCARD') AND (ORI_CLIENT LIKE '%".$requestData['search']['value']."%' OR TYP_CLIENT LIKE '%".$requestData['search']['value']."%' OR NOM1_CLIENT LIKE '%".$requestData['search']['value']."%' )";    // $requestData['search']['value'] contains search parameter

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
    $query = "SELECT `CD_CLIENT`, `ORI_CLIENT`, `TYP_CLIENT`, `CIV1_CLIENT`, `NOM1_CLIENT`, `PNOM1_CLIENT`, `CIV2_CLIENT`, `NOM2_CLIENT`, `PNOM2_CLIENT`, `ADR1_CLIENT`, `ADR2_CLIENT`, `VILLE_CLIENT`, `CPOSTAL_CLIENT`, `POR_CLIENT`, `TEL_CLIENT`, `EMAIL_CLIENT`, `CD_FIDELITE`, `IND_PROSP`, `ACTIF_Client`, `DTHR_CREATION`, `DTHR_MAJ`, `TYPE_CLIENT`, `EXCLU_MAILING`, `EXCLU_SMS`, `DT_TRF_CLT`, `CUSTOMER_ID_ECOM`, `ANNOTATION_CLIENT`,`SUPPORT_COM`  FROM `CLIENTS` WHERE `SUPPORT_COM`='SOCARD'";

    if ($columns[$requestData['order'][1]['column']] != 'Action')
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
    $nestedData[] = $row["CD_CLIENT"];
    $nestedData[] = $row["SUPPORT_COM"];
    $nestedData[] = $row["POR_CLIENT"];
    $nestedData[] = $row["EMAIL_CLIENT"];
    $nestedData[] = $row["ORI_CLIENT"];
    $nestedData[] = $row["NOM1_CLIENT"];
    $nestedData[] = $row["PNOM1_CLIENT"];
    

    if ($row["ACTIF_Client"] == 1)
    {
        $nestedData[] = 'ACTIF';
    }
    else {
        $nestedData[] = 'INACTIF';
    }
    
    if ($row["EXCLU_SMS"] == 1)
    {
        $nestedData[] = 'SMS';
    }
    else
     {
        $nestedData[] = '';
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