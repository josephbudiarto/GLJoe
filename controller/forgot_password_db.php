<?php include('../include/connect_db.php');

	$user=$_POST['username'];
	$email=$_POST['email'];
	$telepon=$_POST['telepon'];

	$query="SELECT password FROM member WHERE username='".$user."' AND email='".$email."' AND no_telp='".$telepon."'";
	$rs=mysqli_query($con,$query);
	if($row=mysqli_fetch_array($rs)){
		$msg = "Hello please remember your password for next time and protect its confidentiality\n";
		$msg .= "Your username : ".$user." and password : ".$row['password'];
		$msg = wordwrap($msg,70);
		$headers = "From: m26414087@john.petra.ac.id" . "\r\n";
	
		if(mail($email,"Password Reminder",$msg,$headers)){
			echo "email sent to ".$email;
			echo "<div>
				".$msg."
			</div>";
		}
		else{
			echo " gagal";
			echo "<div>
				".$msg."
			</div>";
		}
		header( "refresh:5;url=../login.php" );
	}
	else{
		echo "error";
		echo "<div>
				Your email is wrong
			</div>";
		header( "refresh:5;url=../forgot_password.php" );
	}
	
	
?>