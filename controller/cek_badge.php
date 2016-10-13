<?php include("../include/connect_db.php");
	
	$query="SELECT COUNT(*) FROM transaksi WHERE status_acc=0";
	$rs=mysqli_query($con,$query);
	$row=mysqli_fetch_array($rs);
	echo $row[0];
?>