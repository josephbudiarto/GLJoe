<?php include'../include/connect_db.php';
	$pizza_id=$_GET['id'];
	$query="DELETE FROM pizza WHERE pizza_id=".$pizza_id;
	if($rs=mysqli_query($con,$query)){
		echo "berhasil".'<meta http-equiv="refresh" content="1;url=../menus.php">';
	}
	else{
		echo "gagal";
	}
?>