<?php session_start();

	//unset($_SESSION['custom'][$_SESSION['custom-counter']]['size']);
	$_SESSION['custom-size'] = $_GET['value'];
	echo $_SESSION['custom-size'];
?>