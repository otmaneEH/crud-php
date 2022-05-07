<?php

$databaseHost = 'localhost';
$databaseName = 'mydb1';
$databaseUsername = 'root';
$databasePassword = '';
$mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName); 
if(!isset($mysqli)){
	echo "S";
}
?>