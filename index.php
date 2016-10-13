<!DOCTYPE html>
<html lang="en">
	<head>
		<link rel="stylesheet" href="css/bootstrap.css">
		<link rel="stylesheet" href="css/bootstrap.min.css">
	<script src="js/jquery.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>

		<style>
			.relative{
				background: url("images/e.jpg") no-repeat;
				background-size: 100% 100%;
				background-position: center top;
				/*background-attachment: fixed;*/
				-webkit-background-size: cover;
				-moz-background-size: cover;
				-o-background-size: cover;
			}
		</style>
	<script>
		function bigImg(x) {
		    x.style.height = "200%";
		    x.style.width = "200%";
		}

		function normalImg(x) {
		    x.style.height = "190%";
		    x.style.width = "190%";
		}
	</script>
	</head>
	<body class="relative"  >
		<?php include('include/navbar.php');
			if(isset($_SESSION['counter'])){}
			else{
				$_SESSION['counter']=0;
			}
			if(isset($_SESSION['custom-counter'])){}
			else{
				$_SESSION['custom-counter']=1;
			}
		?>
		<div class="container-fluid"><br><br><br><br><br>
			<div class="col-md-5"><BR><BR>
				<!--<h1 style="color:white;">"UNLESS YOU'RE A PIZZA"<BR>THE ANSWER IS YES<BR>I CAN LIVE WITHOUT YOU</h1>-->
			</div>
			<div class="col-md-12" align="center">
				<fixed><img src="images/18.png"></fixed>
				<BR><BR><BR>
			</div>

		</div>
		<div class="footer" style="background-color: orange;height:90px; color:black; ">
		
	<!--		
<div class='col-md-12' align="center">
	<div class="well well-lg" style="background-color: transparent; border-color: transparent;">
				<div class='col-md-3 .'><a href='' style="text-decoration: none; color: black;">
				<img src="images/pizza2.png" height="48px" width="48px"><font style="font-size:15px;align:center;">PIZZA </font></a>
				</div>
				<div class='col-md-3'>
				<a href='' style="text-decoration: none; color: black;">
				<img src="images/pasta2.png" height="48px" width="48px"><font style="font-size:15px;"> PASTA </font>
				</div></a>
				<div class='col-md-3'>
				<a href='' style="text-decoration: none; color: black;">
				<img src="images/snacks2.png" height="48px" width="48px"><font style="font-size:15px;">SNACKS </font></a>
				</div>
				<div class='col-md-3'>
				<a href='' style="text-decoration: none; color: black;">
				<img src="images/drinks2.png" height="48px" width="48px"><font style="font-size:15px;">DRINKS </font></a>
				</div><br><br>
	</div>
	</div>
	</div>
	-->
		<div class='footer' align="center" style="background-color: #e68a00;height:120px; color:black;"><br />
			<div class='col-md-5 col-md-offset-3' salign="center">

			
			
			<div class="col-md-3" align="center">
				<a href='' style="text-decoration: none; color: black;">
				<img src='images/fb.png' height='25px' align='center'></a>
				<strong> </strong>
				</div>
				<div class="col-md-3" align="center">
				<a href='' style="text-decoration: none; color: black;">
				<img src='images/insta.png' height='25px'>
				</a></div>
				<div class="col-md-3" align="center">
				<a href='' style="text-decoration: none; color: black;">
					<img src='images/twitter.png' height='25px'>
					</a></div>
				<div class="col-md-3" align="center"><a href='' style="text-decoration: none; color: black;">
					<img src='images/youtube.png' height='25px'></a>
					</div><br><br>
					</div>
					
					<br><br><br>
			<span class='glyphicon glyphicon-copyright-mark'></span><strong> Copyright 2016 by : GL.Joe Pizza</strong></p>
			
			
			
		</div>

		<!-- <nav class="navbar navbar-fixed-bottom navbar-inverse" 	style="height:90px";>
				<ul class="nav navbar-nav">
					<li class="active"><a href="bio.html" style="height:85px;width:341px;"><p style="font-size:32px;align:center;">PIZZA <img src="images/pizza.png"></p></a>
						<svg height="50" width="50">
						  <line x1="250" y1="0" x2="250" y2="50" style="stroke:rgb(255,255,255);stroke-width:2" />
						  Sorry, your browser does not support inline SVG.
						</svg>
					</li>
						
					<li class="active"><a href="bio.html" style="height:85px;width:340px;"><p style="font-size:32px;;">PASTA <img src="images/pasta.png" height="60px"></p></a></li>
					<li class="active"><a href="bio.html" style="height:85px;width:340px;"><p style="font-size:32px;">SNACKS <img src="images/snack.png"></p></a></li>
					<li class="active"><a href="bio.html" style="height:85px;width:340px;"><p style="font-size:32px;">DRINKS <img src="images/drink.png" height="60px"></p></a></li>
				</ul>
			
		</nav>-->
    
	</body>
</html>