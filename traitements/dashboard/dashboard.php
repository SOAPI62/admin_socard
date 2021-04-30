<?php

// Connexion à la base de données
include '../connexion_bdd/conn.php';

// Initialisation des variables de sortie de la procédure

$select = array();
$select["REPONSE"] = 'OK';
$select["CODE_ERR"] = 0;
$select["MESS_ERR"] = '';
$select["CODE_SQL"] = '';

// Préparation de la requêtes SQL
$sql = "SELECT count(*) FROM `SOCARD_INSTAL` WHERE `agent`='ios' and `app_install`=0 and `date_creation` <>'0000-00-00'";
$req = $dbh->prepare($sql);
$req->execute($tab);
$row = $req->fetch();
$select["IOS_INSCRITS"] = $row[0];

$sql = "SELECT count(*) FROM `SOCARD_INSTAL` WHERE `agent`='ios' and `app_install`=1 and `date_creation` <>'0000-00-00'";
$req = $dbh->prepare($sql);
$req->execute($tab);
$row = $req->fetch();
$select["IOS_INSTALLES"] = $row[0];

$sql = "SELECT count(*) FROM `SOCARD_INSTAL` WHERE `agent`='android' and `date_creation` <>'0000-00-00'";
$req = $dbh->prepare($sql);
$req->execute($tab);
$row = $req->fetch();
$select["ANDROID_INSCRITS"] = $row[0];

$sql = "SELECT count(*) FROM `SOCARD_INSTAL` WHERE `agent`='android' and `app_install`=1 and `date_creation` <>'0000-00-00'";
$req = $dbh->prepare($sql);
$req->execute($tab);
$row = $req->fetch();
$select["ANDROID_INSTALLES"] = $row[0];

$sql = "SELECT count(*) FROM `SOCARD_INSTAL` WHERE `id_origine`<>'/' and `date_creation` <>'0000-00-00'";
$req = $dbh->prepare($sql);
$req->execute($tab);
$row = $req->fetch();
$select["PARRAINAGES"] = $row[0];

$select["INSCRITS"] = $select["ANDROID_INSCRITS"] + $select["IOS_INSCRITS"];

echo json_encode($select);
exit(0);
?>