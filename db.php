<?php 
	$mysqli = new mysqli('localhost', 'root', 'root', 'aguulga') or die("Can't connect to MySQL server");
	//utf8 тохиргоо, баазаас utf8 өгөгдөл уншинэ гэдгийг зааж байна.
	$mysqli->query("SET NAMES 'utf8'");
?>

