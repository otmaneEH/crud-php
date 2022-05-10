<?php
require "header.php";
include_once("db.php");

if (isset($_POST['update'])) {

	$id = mysqli_real_escape_string($mysqli, $_POST['id']);

	$name = mysqli_real_escape_string($mysqli, $_POST['name']);
	$email = mysqli_real_escape_string($mysqli, $_POST['email']);

	if (empty($name) || empty($email)) {

		if (empty($name)) {
			echo "<font color='red'>Name field is empty.</font><br/>";
		}



		if (empty($email)) {
			echo "<font color='red'>email  is empty.</font><br/>";
		}
	} else {
		$result = mysqli_query($mysqli, "UPDATE etudiant SET name='$name',email='$email' WHERE id=$id");
		header("Location:index.php");
	}
}
?>
<?php
$id = $_GET['id'];

$result = mysqli_query($mysqli, "SELECT * FROM etudiant WHERE id=$id");

while ($res = mysqli_fetch_array($result)) {
	$name = $res['name'];
	$email = $res['email'];
}
?>

	<form name="form1" method="post" action="edit.php">
		<table border="0">
			<tr>
				<td>Name</td>
				<td><input type="text" name="name" value="<?php echo $name; ?>"></td>
			</tr>
			<tr>
				<td>Email</td>
				<td><input type="text" name="email" value="<?php echo $email; ?>"></td>
			</tr>
			<tr>
				<td><input type="hidden" name="id" value=<?php echo $_GET['id']; ?>></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>


	<section>
		<div class="container-fluid mt-4">
			<div class="row d-flex justify-content-center align-items-center ">
				<div class="col-xl-5 col-md-5">
					<div class="card rounded-3 text-black">
						<div class="row g-0">
							<div class="col-lg-12">
								<div class="card-body p-md-5 mx-md-4">

									<div class="text-center">
										<img src="img/img.png" style="width: 185px;" alt="logo">
										<h4 class="mt-1 mb-5 pb-1">update <span style="color:orange ;"><?php echo $name; ?></span> information</h4>
									</div>

									<form class="form" action="creer.php" method="post" name="form1">
										<p>Add Account Panel</p>

										<div class="form-outline mb-4">
											<input type="text" class="form-control" id="name" placeholder=" update the name" name="name" value="<?php echo $name; ?>">
											<label class="form-label" for="name">Nam</label>
										</div>

										<div class="form-outline mb-4">
											<input type="email" name="email" id="emaill" class="form-control" value="<?php echo $email; ?>"></td>
											<label class="form-label" for="emaill">Email</label>
										</div>

										<div class="text-center pt-1 mb-5 pb-1">
											<input type="hidden" name="id" value=<?php echo $_GET['id']; ?>>
											<input class="form-control btn btn-primary" type="submit" name="Submit" value="Update">

										</div>

										<div class="d-flex align-items-center justify-content-center pb-4">


										</div>

									</form>

								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>



</body>

</html>