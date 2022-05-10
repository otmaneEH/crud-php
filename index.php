<?php
//db
include_once "db.php";
if($_REQUEST['search']){
	$serch = $GET['search'];}else{
		$result1 = mysqli_query($mysqli, "SELECT * FROM etudiant ORDER BY id DESC");
	}
$result = mysqli_query($mysqli, "SELECT * FROM etudiant ORDER BY id DESC");
$result2 = mysqli_query($mysqli, "SELECT * FROM `etudiant` WHERE `email` LIKE '$serch'");
require "header.php";
?>

<table class="table table-striped  " style="margin-left:auto;margin-right:auto; width: 80%; margin-top: 20vh;">
	<thead class="thead-dark">
		<tr>

			<td  colspan="3">
				<form action="" method="GET">
					<div class="col-sm-2 float-left">
		<div class="input-group rounded">

			<input type="search" class="form-control rounded" placeholder="Search" name="search" value="<?php if(isset($_GET['search'])){ echo $_GET['search'];};?>" />
			<span class="input-group-text border-0" id="search-addon">
				<button type="submit" style="border: none;" value=""></button>
			</span>
		</div>
				</form>
			</td>

			</td>
		</tr>

		<tr>
			<th>Name</th>
			<th>Email</th>
			<th>Action</th>
		</tr>
	</thead>

	<tbody>

		<?php

		while ($res = mysqli_fetch_array($result2)) {
			echo "<tr>";
			echo "";
			echo "<td>" . $res['name'] . "</td>";
			echo "<td>" . $res['email'] . "</td>";
			echo "<td><a class=\"btn btn-primary\" href=\"edit.php?id=$res[id]\">Edit</a> | <a class=\"btn btn-danger delete\" href=\"delete.php?id=$res[id]\">Delete</a></td>";
		}
		?>

	</tbody>
</table>

<script>
	$('.delete').on('click', function(e) {
		e.preventDefault();
		var self = $(this);
		console.log(self.data('title'));
		Swal.fire({
			title: 'Es-tu sûr?',
			text: "Etes-vous sûr que vous voulez supprimer?",
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Yes, delete it!'
		}).then((result) => {
			if (result.isConfirmed) {
				Swal.fire(
					'Deleted!',
					'Your file has been deleted.',
					'success'
				)
				location.href = self.attr('href');
			}
		})

	})
</script>
</body>

</html>