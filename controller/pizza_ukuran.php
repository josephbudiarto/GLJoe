<?php
	$pizzaid=$_GET['id'];
	include "../include/connect_db.php";
	$query = mysqli_query($con,"SELECT * FROM size");
	echo "<form action='controller/cek_order.php' method='post'><input type='text' id='pid' name='pid' value='".$pizzaid."' hidden readonly>";
	while ($row=mysqli_fetch_assoc($query)) {
		echo "<button type='submit' value='".$row['size']."' name='size' id='size' class='btn btn-warning'> ".$row['size']." </button>";
	}
		echo "</form>";
?>