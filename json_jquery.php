<?php session_start();
$type= $_GET['type'];
	include("include/connect_db.php");
	$query5="SELECT * FROM dummy where type='".$type."' AND member_id=".$_SESSION['user_id'];
  	$rs5=mysqli_query($con,$query5);

  	$data = array();
	while($fetch = mysqli_fetch_assoc($rs5) ){
    	$data[] = $fetch;
	}
	echo json_encode($data);
 ?>