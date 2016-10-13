
<?php session_start();
include("include/header.php");
include('include/navbar.php');
include('include/connect_db.php');

	$query="SELECT * FROM member WHERE member_id=".$_SESSION['user_id'];
	$rs=mysqli_query($con,$query);
	$row=mysqli_fetch_array($rs);
?>
<!DOCTYPE html>
<head>
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- <script src="js/jquery.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script> -->
</head>
<style>
	.navside{
		position: absolute;
		top: 140px;
		
	}
	.sty
	{
		display: inline-block;
		border-bottom: solid 5px #38a7bb;
		line-height: 1.1;
		margin-bottom: 0;
		padding-bottom: 10px;
		vertical-align: middle;
		text-transform: uppercase;
		letter-spacing: 0.06em;
	}
</style>
<body class="relative">
<br><br><Br><br><br>
	<div class="col-md-offset-2 col-md-7" >
	<!-- copy -->
	<div class="box clearfix">
                            <div class="heading">
                                <h3 class="sty"><strong>Personal details</strong></h3>
                            </div>
                            <br>
                            <form action="controller/PI_save.php" method="POST">
                                <div class="row">
                                    <div class="col-sm-5">
                                        <div class="form-group">
                                            <label for="firstname">Name</label>
                                            <input type="text" id="name" name="name" value="<?php echo $row['name'];?>"  class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="lastname">Username</label>
                                            <input type="text" id="uname" name="uname" value="<?php echo $row['username'];?>"  class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <!-- /.row -->

                                <div class="row">
                                <div class="col-sm-8">
                                		<div class="form-group">
                                			<label for="street">Address</label>
                                			<input type="text" id="alamat" name="alamat" value="<?php echo $row['alamat'];?>" required class="form-control">
                                		</div>
                                	</div>
                                	
                                	
                                </div>
                                <!-- /.row -->

                                <div class="row">
                                	<div class="col-sm-8">
                                		<div class="form-group">
                                			<label for="email_account">Email</label>
                                			<input type="text" id="email" name="email" value="<?php echo $row['email'];?>" required class="form-control">
                                		</div>
                                	</div>
                                	<div class=" col-sm-5 ">
                                		<div class="form-group">
                                			<label for="phone">Telephone</label>
                                			<input type="text" id="telp" name="telp" value="<?php echo $row['no_telp'];?>" required class="form-control">
                                		</div>
                                	</div>
                                	<div class="col-md-1 hidden">
                                        <div class="form-group">
                                            <label for="lastname">id</label>
                                            <input type="text" id="pid" name="pid" value="<?php echo $row['member_id'];?>"  class="form-control">
                                        </div>
                                    </div>
                                	
                                	<div class="col-sm-8 text-right"><hr>

                                		<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>  Save changes</button>

                                	</div>

                                </div>

                            </form>

                        </div>

                   <!-- -->
                </div>
                <div class=" col-md-2">
                	<br>
                		<h4 class="sty" ><strong>Customer Section </strong></h4>
                		<br><br>

                		<ul class="nav nav-pills nav-stacked" >
                			<li class="active" ><a href="user.php" ><i class="fa fa-user"></i> Personal Information</a></li>
                			<li class=""><a href="history_transaction.php" style="color:black"><i class="fa fa-tag"></i>  Transaction History</a></li>
                			<li class=""><a href="changepassword.php" style="color:black"><i class="fa fa-lock"></i> Change Password</a></li>
                			<li class=""><a href="logout.php" style="color:black"><i class="fa fa-sign-out"></i> Log-out</a></li>
                		</ul>

                </div>


            </body>
            </html>