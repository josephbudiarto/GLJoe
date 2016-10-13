<?php include('../include/connect_db.php');
	$query="SELECT * FROM other WHERE category='drink'";
	$rs=mysqli_query($con,$query);
	$temparray = array();
    while($row=mysqli_fetch_assoc($rs))
    {
        $temparray[] = $row;
    }
    echo json_encode($temparray);
?>