<?php
session_start();

try {
	//$dbh = new PDO('mysql:host=localhost;dbname=SOCARD', 'root', '');
	$dbh = new PDO('mysql:host=localhost;dbname=SOCARD', 'root', '');
	//$dbh = new PDO('mysql:host=db708531664.db.1and1.com;dbname=db708531664', 'dbo708531664', 'Stamand00');

	$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
} catch (PDOException $e) {
	print "Erreur !: " . $e->getMessage() . "<br/>";
	die();
}
?>