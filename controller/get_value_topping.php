<?php include '../include/connect_db.php';
	$query="SELECT * FROM topping WHERE topping_id=".$_GET['id'];
	$rs=mysqli_query($con,$query);
	$row=mysqli_fetch_array($rs);
	echo "	<form action='controller/updatetopping-admin.php' method='post' enctype='multipart/form-data'>
				<div class='form-group'>
					<label for='id'>Topping ID</label>
					<input class='form-control' type='text' id='id' name='id' value='".$row['topping_id']."' readonly>
				</div>
				<div class='form-group'>
					<label for='nama'>Topping name</label>
					<input class='form-control' type='text' id='nama' name='nama' value='".$row['nama']."'>
				</div>
				<div class='form-group'>
					<label for='harga'>Price</label>
					<input class='form-control' type='text' id='harga' name='harga' value='".$row['harga']."'>
				</div>
				<div class='form-group'>
					<img src='images/".$row['image']."' width='100px' height='100px'>
				</div>
				<div class='form-group'>
					<input type='file' id='fileToUpload' name='fileToUpload'>
				</div>
				<div class='form-group'>
					<button type='submit' class='btn btn-block btn-success'>Submit</button>
					<button type='reset' data-dismiss='modal' class='btn btn-block btn-warning'>Cancel</button>
				</div>
			</form>";
?>
