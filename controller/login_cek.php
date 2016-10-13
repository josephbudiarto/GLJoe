<?php session_start();
	include("../include/connect_db.php");
	$username=$_POST['username'];
	$password=$_POST['password'];

	$query="SELECT * FROM member WHERE username='".$username."' AND password='".$password."'";
	$rs = mysqli_query($con,$query);
	if($row = mysqli_fetch_array($rs)){
		$_SESSION['user']=$row['name'];
		$_SESSION['user_id']=$row['member_id'];
		date_default_timezone_set('Asia/Jakarta');
		$tanggal=date('Y-m-d');
		$waktu=date('h:i:s');
		echo $tanggal.$waktu."<br>";
		$logquery="INSERT INTO log(member_id,date,time) VALUES(".$row['member_id'].", '".$tanggal."', '".$waktu."')";	//LOG DATABASE INSERT
		if($logrs=mysqli_query($con,$logquery)) echo "berhasil";
		else echo "gagal";
		var_dump($logquery);
		if(isset($_SESSION['order'])){
			if(isset($_SESSION['button-order'])){
				echo "last";
				header('location:../last.php');
			}
			else{
				if(isset($_SESSION['status']) == "pizza-menu"){
					header('location:../menu.php');
				}
				else if(isset($_SESSION['status']) == "pasta"){
					header('location:../pasta.php');
				}
				else if(isset($_SESSION['status']) == "snack"){
					header('location:../snack.php');
				}
				else if(isset($_SESSION['status']) == "drink"){
					header('location:../drink.php');
				}

			}
		}
		else if(isset($_SESSION['custom'])){
			header('location:../newcustom.php?i='.$_SESSION['custom']);
		}
		else{
			header('location:../index.php');
		}
	}
	else{
		$que="SELECT * FROM admin WHERE username='".$username."' AND password='".$password."'";
		$r = mysqli_query($con,$que);
		if($ro = mysqli_fetch_row($r)){
			$_SESSION['user']=$username;
			$_SESSION['pengaman'] = "adminmasuk";
			header('location:../admin.php#overview');
		}
		else{
			header('location:../login.php');
		}
	}
?>