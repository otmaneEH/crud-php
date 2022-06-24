<?php
if(!isset($_GET['id'])){
	header("Location:index.php");
}
$id = $_GET['id'];
include("db.php");
$result = $mysqli->prepare("DELETE FROM etudiant WHERE id={$id}");
$result->execute([":id",$id]);

header("Location:index.php");

?>
