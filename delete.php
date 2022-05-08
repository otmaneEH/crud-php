<?php
include("db.php");
$id = $_GET['id'];
$result = mysqli_query($mysqli, "DELETE FROM etudiant WHERE id=$id");

header("Location:index.php");
?>
