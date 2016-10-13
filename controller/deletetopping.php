<?php include'../include/connect_db.php';
	$topping_id=$_GET['id'];
	$query="DELETE FROM topping WHERE topping_id=".$topping_id;
	if($rs=mysqli_query($con,$query)){
		echo "berhasil".'<meta http-equiv="refresh" content="1;url=../menus.php">';
	}
	else{
		echo "gagal";
	}
?>