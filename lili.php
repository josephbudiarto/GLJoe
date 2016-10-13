<?php session_start();?>
<!doctype html>
	<head>
		<link rel="stylesheet" href="css/bootstrap.css">
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/style.css"/>
  <script src="js/jquery.js"></script>
  <script type="text/javascript" src="js/bootstrap.js"></script>
		<style>
			.relative{
				background: url("images/e.jpg") no-repeat;
				background-size: 100% 100%;
				background-position: center top;
				background-attachment: fixed;
				-webkit-background-size: cover;
				-moz-background-size: cover;
				-o-background-size: cover;
			}
		</style>
		<!--
		<script>
		
			function myFunction(){
		        if(window.XMLHttpRequest){
		            xmlhttp = new XMLHttpRequest();
		        }
		        xmlhttp.onreadystatechange = function(){
		            if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
		                document.getElementById('custom-pizza').innerHTML = xmlhttp.responseText;
		            }
		        };
		        xmlhttp.open('GET','custom.php',true);
		        xmlhttp.send();
			}

		</script>
		-->
	</head>
	<body class="relative">
		
		<?php include('include/navbar.php');?>

		<div class="container-fluid" ><br><br><br><br><br><br>
			<div class="col-md-5" align="center" >
				<h1 align="center" style="color:black; font-family:impact;">RECIPE PIZZA</h1><br><br><br><br><a href='menu.php'>
				<img src="images/Untitled-1.png" height="80%" width="80%" onmouseover="this.src='images/Untitled-11.png'" onmouseout="this.src='images/Untitled-1.png'"></a>
			</div>
			<div class="col-md-2" align="center">
				<svg height="750" width="200">
				  <line x1="80" y1="0" x2="80" y2="750" style="stroke:rgb(0,0,0);stroke-width:4" />
				  Sorry, your browser does not support inline SVG.
				</svg>
			</div>
			<div class="col-md-5" align="center" id="custom-pizza" >
				<h1 align="center" style="color:black; font-family:impact;">CUSTOM PIZZA</h1><br><br><br>
				<a data-toggle="modal" data-target="#myModal ">
				<img src="images/88.png" height="90%" width="90%" onmouseover="this.src='images/888.png'" onmouseout="this.src='images/88.png'" >
				</a>
			</div>


<!-- Modal -->
<div class="modal fade col-md-6 col-md-offset-6" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
 
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h2 class="modal-title">mau brp potong?</h2>
      </div>
      <div class="modal-body" align="center">
        
 
    <div class="btn-group " data-toggle="buttons">
  <label class="btn btn-warning active">
    <input type="radio" value ="1" name="options" id="option" autocomplete="off" checked> 1 
  </label>
  <label class="btn btn-warning">
    <input type="radio" value="2" name="options" id="option" autocomplete="off"> 2 
  </label>
  <label class="btn btn-warning">
    <input type="radio" value="4" name="options" id="option" autocomplete="off"> 4 
  </label>
</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button><!--<a href="custom.php" style="text-decoration: none">-->
        <button type="button" class="btn btn-success" onclick="valueFunction()"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></button><!--</a>-->
      </div>
    </div>
  </div>
</div>
</div>

</div>


<script type="text/javascript">
	function valueFunction(){
	var radios = document.getElementsByName('options');

	for (var i = 0, length = radios.length; i < length; i++) {
	    if (radios[i].checked) {
	        window.location='newcustom.php?i='+radios[i].value;
	        break;
	    }
	}
	    }
</script>

	</body>
</html>