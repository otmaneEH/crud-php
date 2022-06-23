<?php
if(!isset($_GET['id'])){
	header("Location:index.php");
}
$id = $_GET['id'];
include("db.php");
$result = mysqli_query($mysqli, "DELETE FROM etudiant WHERE id=$id");

header("Location:index.php");
?>
