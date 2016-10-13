<?php session_start();

	$i=$_GET['quantity'];
	$_SESSION['order'][$i]['quantity']=intval($_SESSION['order'][$i]['quantity'])+1;
	echo $_SESSION['order'][$i]['quantity'];
?>