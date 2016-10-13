<?php session_start();

	$i=$_GET['quantity'];
	if($_SESSION['order'][$i]['quantity'] - 1 <= 0){
		$_SESSION['order'][$i]['quantity'] =0;
	}else{
		$_SESSION['order'][$i]['quantity']=intval($_SESSION['order'][$i]['quantity'])-1;
	}
	echo $_SESSION['order'][$i]['quantity'];
?>