<?php include '../include/connect_db.php';
	$query="SELECT * FROM other WHERE other_id=".$_GET['id'];
	$rs=mysqli_query($con,$query);
	$row=mysqli_fetch_array($rs);
	echo "	<form action='controller/updateother-admin.php' method='post' enctype='multipart/form-data'>
				<div class='form-group'>
					<label for='id'>Other ID</label>
					<input class='form-control' type='text' id='id' name='id' value='".$row['other_id']."' readonly>
				</div>
				<div class='form-group'>
					<label for='nama'>Name</label>
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
					<label for='category'>Category</label>
				";
				if($row['category']=="snack"){
					echo "<select class='form-control' id='category' name='category'>
							<option value='snack'>Snack</option>
							<option value='drink'>Drink</option>
							<option value='pasta'>Pasta</option>
						</select>";
				}else if($row['category'] == "pasta"){
					echo "<select class='form-control' id='category' name='category'>
							<option value='pasta'>Pasta</option>
							<option value='snack'>Snack</option>
							<option value='drink'>Drink</option>
						</select>";
				}else{
					echo "<select class='form-control' id='category' name='category'>
							<option value='drink'>Drink</option>
							<option value='pasta'>Pasta</option>
							<option value='snack'>Snack</option>
						</select>";
				}
				echo "</div>
				<div class='form-group'>
					<button type='submit' class='btn btn-block btn-success'>Submit</button>
					<button type='reset' data-dismiss='modal' class='btn btn-block btn-warning'>Cancel</button>
				</div>
			</form>";
?>
