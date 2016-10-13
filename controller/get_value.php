<?php include '../include/connect_db.php';
	$query="SELECT * FROM pizza WHERE pizza_id=".$_GET['id'];
	$rs=mysqli_query($con,$query);
	$row=mysqli_fetch_array($rs);
	echo "	<form action='controller/updatepizza-admin.php' method='post' enctype='multipart/form-data'>
				<div class='form-group'>
					<label for='id'>Pizza ID</label>
					<input class='form-control' type='text' id='id' name='id' value='".$row['pizza_id']."' readonly>
				</div>
				<div class='form-group'>
					<label for='nama'>Pizza name</label>
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
					<label for='description'>Description</label>
					<textarea  class='form-control' type='text' id='description' name='description'>".$row['description']."</textarea>
				</div>
				<div class='form-group'>
					<button type='submit' class='btn btn-block btn-success'>Submit</button>
					<button type='reset' data-dismiss='modal' class='btn btn-block btn-warning'>Cancel</button>
				</div>
			</form>";
?>
