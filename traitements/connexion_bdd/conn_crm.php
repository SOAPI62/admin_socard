<?php
session_start();

try {
	$dbh_crm = new PDO('mysql:host=localhost;dbname=CREAGCOM', 'root', 'root');
	$dbh_crm->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
} catch (PDOException $e) {
	print "Erreur !: " . $e->getMessage() . "<br/>";
	die();
}
?>