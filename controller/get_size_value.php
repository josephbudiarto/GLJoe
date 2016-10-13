<?php include '../include/connect_db.php';
	$query="SELECT * FROM size WHERE size='".$_GET['id']."'";
	$rs=mysqli_query($con,$query);
	$row=mysqli_fetch_array($rs);
	echo "	<form action='controller/updatesize_admin.php' method='post'>
				<div class='form-group'>
					<label for='id'>Size</label>
					<input class='form-control' type='text' id='size' name='size' value='".$row['size']."' readonly>
				</div>
				<div class='form-group'>
					<label for='nama'>Price</label>
					<input class='form-control' type='text' id='price' name='price' value='".$row['price']."'>
				</div>
				<div class='form-group'>
					<button type='submit' class='btn btn-block btn-success'>Submit</button>
					<button type='reset' data-dismiss='modal' class='btn btn-block btn-warning'>Cancel</button>
				</div>
			</form>";
?>
