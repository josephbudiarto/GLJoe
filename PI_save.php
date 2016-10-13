<?php include "../include/connect_db.php";

	if($query=mysqli_query($con,"UPDATE size SET price = ".$_POST['price']." WHERE size='".$_POST['size']."'")){
		header('location:../size.php');
	}
	else{
		echo "gagal";
	}
?>