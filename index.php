<?php
//db

include_once "db.php";
$serch = "";
if (isset($_REQUEST['search'])) {
	$serch = $_GET['search'];
}
$result = mysqli_query($mysqli, "SELECT * FROM `etudiant` WHERE `email` LIKE '%$serch%'");
require "header.php";
?>

<table class="table table-striped  " style="margin-left:auto;margin-right:auto; width: 80%; margin-top: 20vh;">
	<thead class="thead-dark">
		<tr>
			<td></td>

			<td colspan="2">
				<form action="" method="GET">
						<div class="input-group rounded">

							<input style="width: 300px;" type="search" class="form-control rounded" placeholder="enter an email" name="search" value="<?php if (isset($_GET['search'])) {
																																							echo $_GET['search'];
																																						}; ?>" />
							<span class="input-group-text border-0" id="search-addon">
								<button type="submit" style="border: none; height: 100%; width: 100%;" value=""><img src="img/loupe.png" alt="" srcset=""></button>
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

		while ($res = mysqli_fetch_array($result)) {
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