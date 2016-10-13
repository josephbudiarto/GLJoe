<?php include "../include/connect_db.php";

	if($query=mysqli_query($con,"UPDATE member SET name = '".$_POST['name']."', username = '".$_POST['uname']."', email = '".$_POST['email']."', alamat = '".$_POST['alamat']."', no_telp = '".$_POST['telp']."'  WHERE member_id='".$_POST['pid']."'")){
		header('location:../user.php');
	}
	else{
		echo "gagal";
	}
?>