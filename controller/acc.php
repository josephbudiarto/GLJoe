<?php include('../include/connect_db.php');
	$id=$_GET['id'];
	$query="UPDATE transaksi SET status_acc=1 WHERE transaksi_id=".$id;
	$acc = "UPDATE detail SET status_acc=1 WHERE transaksi_id=".$id;
	if($rs=mysqli_query($con,$query) && $r=mysqli_query($con,$acc)){
		header('location:../neworder.php');
	}
	else{
		echo "gagal";
	}
?>