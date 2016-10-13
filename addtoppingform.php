<?php session_start();
	$_SESSION['status']="topping";
?>
<!DOCTYPE html>
<html>
<head>
	<?php include("include/header.php");?>
	<title>Add Topping Form</title>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-sm-4 col-sm-offset-4">
            <h1 class="page-header" style="color: black;" align="center">New Topping</h1>
        </div>
    </div>
    <div class="row">
		<div class="col-sm-4 col-sm-offset-4">
            <div class="panel panel-default">
                <div class="panel-body">
                    <form action="controller/addtopping-admin.php" method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label for="nama">Topping Name</label>
						<input type="text" class="form-control" id="nama" name="nama" placeholder="Topping name" required>
					</div>
					<div class="form-group">
						<label for="harga">Harga</label>
						<input type="text" class="form-control" id="harga" name="harga" placeholder="Rp 00000" required>
					</div>
					<div class="form-group">
						<label for="image">Image</label>
						<input type="file" class="form-control" id="fileToUpload" name="fileToUpload" required>
					</div>
					<div class="form-group">
						<label for="image">Type</label>
						<select name="type" class="form-control">
							<option value="topping">Topping</option>
							<option value="crust">Crust</option>
							<option value="sauce">Sauce</option>
						</select>
					</div>
					<div class="form-group">
						<button name="submit" class="btn btn-primary btn-block" type="submit">Submit</button>
						<button class="btn btn-primary btn-block" type="button" onclick="window.location='menus.php'">Cancel</button>
						</table>
                    </div>
				</form>
				</div>
			</div>
		</div>
	</div>
</div>

</body>
</html>
