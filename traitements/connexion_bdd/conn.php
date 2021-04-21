<?php
session_start();

try {
	$dbh = new PDO('mysql:host=localhost;dbname=SOCARD', 'root', '');
	$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
} catch (PDOException $e) {
	print "Erreur !: " . $e->getMessage() . "<br/>";
	die();
}

?>
