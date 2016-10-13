<?php
	session_start();

	unset($_SESSION['order']);
	$_SESSION['counter']=0;
	$query=mysqli_query($con,"DELETE FROM dummy WHERE member_id=".$_SESSION['user_id']);
	header('location:../index.php');

?>