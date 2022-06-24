<?php

$USER_DB="root";
$HOST="localhost";
$PASSWORD='';
try{
	$mysqli = new PDO('mysql:localhost;dbname=mydb1',$USER_DB, $PASSWORD);
} 