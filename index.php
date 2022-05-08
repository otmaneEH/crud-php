<?php
//db
include_once "db.php";
$result = mysqli_query($mysqli, "SELECT * FROM etudiant ORDER BY id DESC");
require "header.php";
?>
<article>

</article>

<table class="table table-striped  " style="margin-left:auto;margin-right:auto; width: 80%; margin-top: 20vh;">
	<thead class="thead-dark">
		
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