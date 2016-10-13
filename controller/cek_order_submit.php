<?php session_start();
	
	$_SESSION['button-order']="order";

	if(isset($_SESSION['user'])){
		if(isset($_SESSION['order'])){
			header('location:../last.php');
		}
		else{
			header('location:../index.php');
		}
	}
	else{
		header('location:../login.php');
	}

?>