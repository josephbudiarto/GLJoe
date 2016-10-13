<!DOCTYPE html>
<html>
<head>
	<?php include('include/header.php');?>
	<title>Forgot Password</title>
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

<div class="container-fluid"><br />
  <div class="row"></div>
  <br /><br /><br />
  <div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4">
      <div class="jumbotron" style="background-color:orange;">
        <form action="controller/forgot_password_db.php" method="post" style='color:black;'>
          <h3 style="font-family:sans-serif;"><strong>Forgot Your Password ?</strong><br /></h3><h4>Please fill in the form below to recover your password</h4><br />
          <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
          <label>Username</label>
          <input type="text" class="form-control" name="username" placeholder="Username" aria-describedby="basic-addon1" required><br />

          <span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>
          <label>Email</label>
          <input type="text" class="form-control" name="email" placeholder="your@email.com" aria-describedby="basic-addon1" required=""><br />
          <span class="glyphicon glyphicon-earphone" aria-hidden="true"></span>
          <label>Phone</label>
          <input type="text" class="form-control" name="telepon" placeholder="08xxxxxxxxxxxx" aria-describedby="basic-addon1" required=""><br />
          <button type="submit" name="submit" class="btn" style="width:100%;background-color:RGB(0,0,0);border-color: white;"><font style="color:white;"><span class="glyphicon glyphicon-pencil"></span><strong> SUBMIT </strong></font></button><br />
          <button type="reset" name="reset" class="btn" style="width:100%;background-color: RGB(0,0,0);border-color: white;"><font style="color: white;"><span class="glyphicon glyphicon-remove"></span><strong> CANCEL </strong></font></button>
        </form>
      </div>  
    </div>
    <div class="col-md-3"></div>
  </div>
  
</div>
  
</body>
</html>