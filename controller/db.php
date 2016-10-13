<?php include "../include/connect_db.php";
	$cek  = mysqli_query($con,"SELECT * FROM dummy WHERE topping_id = ".$_GET['topping']." AND type = '".$_GET['canvas']."' AND member_id = ".$_GET['user']);
	if($row =mysqli_fetch_assoc($cek)){
		$query= mysqli_query($con,"DELETE FROM dummy WHERE topping_id = ".$_GET['topping']." AND type = '".$_GET['canvas']."' AND member_id = ".$_GET['user']);
	}
	else{
		$image = mysqli_query($con,"SELECT * FROM topping WHERE topping_id = ".$_GET['topping']);
		while($r = mysqli_fetch_assoc($image)){
			$query = mysqli_query($con, "INSERT INTO dummy(member_id,topping_id,type,image) VALUES(".$_GET['user'].",".$_GET['topping'].",'".$_GET['canvas']."','images/".$r['image']."')");
		}
	}
?>