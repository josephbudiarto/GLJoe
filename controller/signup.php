<?php include "../include/connect_db.php";
	if(isset($_POST['terms'])){
		if($query=mysqli_query($con,"INSERT INTO member(name,username,password,email,no_telp,alamat) VALUES('".$_POST['name']."','".$_POST['username']."','".$_POST['password']."','".$_POST['email']."','".$_POST['phone']."','".$_POST['address']."')")){
			header('location:../login.php');
		}
		else{
			echo "gagal";
		}
	}
	else{
		header('location:../signup.php');
	}
	
?>