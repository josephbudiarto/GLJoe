<html>
	<head>
	<title>Sign Up Form</title>
	<?php include("include/header.php");?>
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
<body class="relative">

<div class="container-fluid"><br /><br /><br />
	<div class="row"></div>
	<br /><br /><br />
	<div class="row">
		<div class="col-md-4"></div>
		<div class="col-md-4">
			<div class="jumbotron" style="background-color:orange;">
				<form action="controller/signup.php" method="post" style='color:black;'>
					<h3 style="font-family:sans-serif;"><strong>Sign Up for Free</strong><br /></h3><h4>You can order your own pizza now !</h4><br />
					<span class="glyphicon glyphicon-user" aria-hidden="true"></span>
					<label>Name</label>
					<input type="text" class="form-control" name="name" placeholder="Name" aria-describedby="basic-addon1" required><br />
					<span class="glyphicon glyphicon-user" aria-hidden="true"></span>
					<label>Username</label>
					<input type="text" class="form-control" name="username" placeholder="Username" aria-describedby="basic-addon1" required><br />
					<span class="glyphicon glyphicon-lock" aria-hidden="true"></span>
					<label>Password</label>
					<input type="password" class="form-control" name="password" placeholder="Password" aria-describedby="basic-addon1" required=""><br />
					<span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>
					<label>Email</label>
					<input type="text" class="form-control" name="email" placeholder="your@email.com" aria-describedby="basic-addon1" required=""><br />
					<span class="glyphicon glyphicon-home" aria-hidden="true"></span>
					<label>Address</label>
					<input type="text" class="form-control" name="address" placeholder="your address for delivery" aria-describedby="basic-addon1" required=""><br />
					<span class="glyphicon glyphicon-earphone" aria-hidden="true"></span>
					<label>Phone</label>
					<input type="text" class="form-control" name="phone" placeholder="08xxxxxxxxxxxx" aria-describedby="basic-addon1" required=""><br />
					<input type="checkbox" aria-label="..." name="terms" value="haii" required=""> I agree to the terms and conditions<br /><br />
					<button type="submit" name="signup" class="btn" style="width:100%;background-color:RGB(0,0,0);"><font style="color:white;"><span class="glyphicon glyphicon-pencil"></span><strong> SIGN UP</strong></font></button>
				</form>
			</div>	
		</div>
		<div class="col-md-3"></div>
	</div>
	
</div>
	
</body>
</html>