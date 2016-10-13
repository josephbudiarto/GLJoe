<?php include('../include/connect_db.php');

	$query="DELETE FROM member WHERE member_id=".$_GET['id'];
	if($rs=mysqli_query($con,$query)){
		header('location:../member.php');
	}else{
		echo "gagal";
	}
?>