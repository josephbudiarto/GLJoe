<!DOCTYPE html>
<html>
<head>
	<?php include("include/header.php");?>	
	<title>Login Form</title>

	<style>
  	body{
      background: url('images/Pizza_HD.jpg') no-repeat;
      background-size: 100% 100%;
      background-position: center top;
      background-attachment: fixed;
      -webkit-background-size: cover;
      -moz-background-size: cover;
      -o-background-size: cover;
  	}
	</style>
</head>
<body>
<div class="container">
    <div class="row" style="padding-top: 12%;">
		<div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
            <div class="panel panel-default">
                <div class="panel-body">
                    <form action="controller/login_cek.php" method="post">
					<div class="form-group">
						<label for="username">Username</label>
							<input type="text" name="username" class="form-control" id="username" placeholder="Username" required>
					</div>
                    <div class="form-group">
						<label for="password">Password</label>
						<input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
					</div>
					
                    <div class="form-group">
						<button type="submit" name="submit" class="btn btn-warning btn-block">LogIn</button>
						
                    </div>
                    	<p align="center"><a href="forgot_password.php" style="color:blue;">Forgot password?</a> or <a href="signup.php" style="color:blue;">Signup</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="js/bootstrap.js"></script>
</body>
</html>