<?php include "../include/connect_db.php";
	session_start();
	$user=$_SESSION['user_id'];
	$new=$_POST['new'];
	$query=mysqli_query($con,"SELECT password from member WHERE member_id=$user");
	$row=mysqli_fetch_array($query);
	if($row[0]==$_POST['old'] && $_POST['new']==$_POST['confirm'])
	{
		$queryupdate=mysqli_query($con,"UPDATE member set password ='$new' WHERE member_id=$user");
		header("location:../user.php");
	}
	else
	{
		echo "Sorry, Your Password is Wrong";
	}
	
?>