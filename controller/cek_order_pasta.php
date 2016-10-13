<?php session_start();
	include('../include/connect_db.php');
	
		$otherid=$_GET['id'];
		$query="SELECT * FROM other WHERE other_id=".$otherid;
		$rs=mysqli_query($con,$query);
		$row=mysqli_fetch_assoc($rs);

		$status='false';
		$x=0;

		for($i=1;$i<=$_SESSION['counter'];$i++){
			if($_SESSION['order'][$i]['nama']==$row['nama']){
				$x=$i;
				$status='true';
				break;
			}
			else{
				$status='false';
			}
		}
		if($status=='true'){
			$_SESSION['order'][$x]['quantity']++;
		}
		else{
			$_SESSION['counter']++;
			$_SESSION['order'][$_SESSION['counter']]['nama']=$row['nama'];
			$_SESSION['order'][$_SESSION['counter']]['harga']=$row['harga'];
			$_SESSION['order'][$_SESSION['counter']]['quantity']=1;
		}

		echo $_SESSION['counter'];
?>