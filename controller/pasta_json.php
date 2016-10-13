<?php include('../include/connect_db.php');
	$query="SELECT * FROM other WHERE category='pasta'";
	$rs=mysqli_query($con,$query);
	$temparray = array();
	$counter=0;
    while($row=mysqli_fetch_assoc($rs))
    {
        $temparray[] = $row;
        $counter++;
    }
    echo json_encode($temparray);
?>