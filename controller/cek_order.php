<?php session_start();
	include('../include/connect_db.php');
	
		$pizzaid=$_POST['pid'];
		$ukuran=$_POST['size'];
		$cari = mysqli_query($con,"SELECT * FROM size WHERE size='".$ukuran."'");

		$query="SELECT * FROM pizza WHERE pizza_id=".$pizzaid;
		$rs=mysqli_query($con,$query);
		$row=mysqli_fetch_assoc($rs);

		$status='false';
		$x=0;

		for($i=1;$i<=$_SESSION['counter'];$i++){
			//echo $_SESSION['order'][$i]['nama'].$_SESSION['order'][$i]['size'];
			if($_SESSION['order'][$i]['nama']==$row['nama'] && $_SESSION['order'][$i]['size']==$ukuran){
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
			while($r=mysqli_fetch_assoc($cari)){
				$_SESSION['order'][$_SESSION['counter']]['harga']=($row['harga']/100)*$r['price'];
			}
			$_SESSION['order'][$_SESSION['counter']]['quantity']=1;
			$_SESSION['order'][$_SESSION['counter']]['size'] = $ukuran;
		}

		header('location:../menu.php');
?>