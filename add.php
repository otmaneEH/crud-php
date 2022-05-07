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


	<form class="row g-3" action="add.php" method="post" name="form1">
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

	<form class="row g-3 col-4">
  <!-- Email input -->
  <div class="col-md-4">
  <div class="form-outline mb-4">
    <input type="email" id="form2Example1" class="form-control" />
    <label class="form-label" for="form2Example1">Email address</label>
  </div>
</div>
  <!-- Password input -->
  <div class="form-outline mb-4">
    <input type="password" id="form2Example2" class="form-control" />
    <label class="form-label" for="form2Example2">Password</label>
  </div>

  <!-- 2 column grid layout for inline styling -->
  <div class="row mb-4">
    <div class="col d-flex justify-content-center">
      <!-- Checkbox -->
      <div class="form-check">
        <input class="form-check-input" type="checkbox" value="" id="form2Example31" checked />
        <label class="form-check-label" for="form2Example31"> Remember me </label>
      </div>
    </div>

    <div class="col">
      <!-- Simple link -->
      <a href="#!">Forgot password?</a>
    </div>
  </div>

  <!-- Submit button -->
  <button type="button" class="btn btn-primary btn-block mb-4">Sign in</button>

  <!-- Register buttons -->
  <div class="text-center">
    <p>Not a member? <a href="#!">Register</a></p>
    <p>or sign up with:</p>
    <button type="button" class="btn btn-link btn-floating mx-1">
      <i class="fab fa-facebook-f"></i>
    </button>

    <button type="button" class="btn btn-link btn-floating mx-1">
      <i class="fab fa-google"></i>
    </button>

    <button type="button" class="btn btn-link btn-floating mx-1">
      <i class="fab fa-twitter"></i>
    </button>

    <button type="button" class="btn btn-link btn-floating mx-1">
      <i class="fab fa-github"></i>
    </button>
  </div>
</form>
<script
  src="https://code.jquery.com/jquery-3.6.0.js"
  integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
  crossorigin="anonymous"></script>
</body>

</html>