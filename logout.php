<?php include "include/connect_db.php";
	session_start();
	$query=mysqli_query($con,"DELETE FROM dummy WHERE member_id=".$_SESSION['user_id']);
	//echo $_SESSION['user_id'];
	session_destroy();
	header('location:index.php');
?>