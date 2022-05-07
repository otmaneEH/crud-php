<?php
require "header.php";
include_once "config.php";

if (isset($_POST['Submit'])) {
	$name = mysqli_real_escape_string($mysqli, $_POST['name']);
	$email = mysqli_real_escape_string($mysqli, $_POST['email']);

	if (empty($name) || empty($email)) {

		if (empty($name)) {
			$nameEr = "Name is empty";
		}
		if (empty($email)) {
			$emailEr = "Email is empty.";
		}
		if (empty($name) || empty($email)) {
			$bac = "<br/><a href='javascript:self.history.back();'>Go Back</a>";
		}
	} else {

		$result = mysqli_query($mysqli, "INSERT INTO etudiant(name,email) VALUES('$name','$email')");

		echo "<font color='green'>Data added successfully.";
		echo "<br/><a href='index.php'>View Result</a>";
	}
}
?>
<html>

<head>
	<title>Add Data</title>
</head>

<body>


	<form class="form-group col-12" action="add.php" method="post" name="form1">
		<div class="row">
			<div class="alert alert-danger" role="alert">
				<?php if (isset($nameEr)) {
					echo "$nameEr";
				} ?><br>
				<?php if (isset($emailEr)) {
					echo "$emailEr";
				} ?>
				<?php if (isset($bac)) {
					echo "$bac";
				} ?> </div>
		</div>
		<table width="25%" border="0">
			<tr>
				<td>Name</td>
				<td><input class="form-control" type="text" name="name"></td>
			</tr>
			<tr>
				<td>Email</td>
				<td><input class="form-control" type="text" name="email"></td>
			</tr>
			<tr>
				<td></td>
				<td><input class="form-control" type="submit" name="Submit" value="Add"></td>
			</tr>

		</table>
	</form>

</body>

</html>