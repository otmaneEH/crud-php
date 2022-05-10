<?php
if(!isset($_GET['id'])){
	header("Location:index.php");
}
require "header.php";
include_once("db.php");
$nameEr="Entrez un nouveau nom ";
$emailEr="Entrez un nouveau email";

if (isset($_POST['update'])) {

	$id = mysqli_real_escape_string($mysqli, $_POST['id']);

	$name = mysqli_real_escape_string($mysqli, $_POST['name']);
	$email = mysqli_real_escape_string($mysqli, $_POST['email']);

	if (empty($name) || empty($email)) {
		if (empty($name)) {
		  $nameEr = "<span style=\"color:red;\">Name is empty<span>";
		};
		if (empty($email)) {
		  $emailEr = "<span style=\"color:red;\">email is empty<span>.";
		};
		}else {
		$result = mysqli_query($mysqli, "UPDATE etudiant SET name='$name',email='$email' WHERE id=$id");

		header("Location: index.php");
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

<body>

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
									<h4 class="mt-1 mb-5 pb-1">mettre à jour
 <span style="color:orange ;"><?php echo $name; ?></span> information</h4>
								</div>

								<form class="form" action="edit.php" method="post" name="form1">
									<p>update  Account Panel</p>

									<div class="form-outline mb-4">
										<input type="text" class="form-control" id="name" placeholder=" mettre à jour
 le nom" name="name" value="<?php echo $name; ?>">
										<label class="form-label" for="name"><?php echo "$nameEr";?></label>
									</div>

									<div class="form-outline mb-4">
										<input type="email" name="email" id="emaill" class="form-control" value="<?php echo $email; ?>"></td>
										<label class="form-label" for="emaill"><?php echo "$emailEr";?></label>
									</div>

									<div class="text-center pt-1 mb-5 pb-1">
										<input type="hidden" name="id" value=<?php echo $_GET['id']; ?>>
										<input type="submit" name="update" class="form-control btn btn-primary" value="Update">
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