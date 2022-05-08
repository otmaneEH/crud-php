<?php
//db
include_once "db.php";
$result = mysqli_query($mysqli, "SELECT * FROM etudiant ORDER BY id DESC");
require "header.php";
?>

<table class="table table-striped  " style="margin-left:auto;margin-right:auto; width: 80%; margin-top: 20vh;">
	<thead class="thead-dark">
		<tr>

			<td colspan="3">
				<form action="index.php" method="GET">
				<div class="col-sm-2 float-left">
					<div class="input-group rounded">
						
						<input type="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
						<span class="input-group-text border-0" id="search-addon">
						<button type="submit" style="border: none;" value=""><i class="fas fa-search"> </i></button>	
						</span>
					</div></form>
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
			echo "<td><a href=\"edit.php?id=$res[id]\">Edit</a> | <a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
		}
		?>

	</tbody>
</table>


</body>

</html>