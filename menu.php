<?php include('include/navbar.php');?>

<!DOCTYPE html>
<head>
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<script src="js/jquery.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
	<script>
		function modalUkuranFunction(i){
			if(window.XMLHttpRequest){
				xmlhttp = new XMLHttpRequest();
			}
			xmlhttp.onreadystatechange = function(){
				if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
					document.getElementById('pizza-ukuran-id').innerHTML = xmlhttp.responseText;
				}
			};
			xmlhttp.open('GET','controller/pizza_ukuran.php?id='+i,true);
			xmlhttp.send();
		}
		function quantityFunctionMinus(i){
			if(window.XMLHttpRequest){
				xmlhttp = new XMLHttpRequest();
			}
			xmlhttp.onreadystatechange = function(){
				if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
					document.getElementById('quantity'+i).innerHTML = xmlhttp.responseText;
					priceFunction(i);
				}
			};
			xmlhttp.open('GET','controller/quantity.php?quantity='+i,true);
			xmlhttp.send();
		}
		function quantityFunctionPlus(i){
			if(window.XMLHttpRequest){
				xmlhttp = new XMLHttpRequest();
			}
			xmlhttp.onreadystatechange = function(){
				if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
					document.getElementById('quantity'+i).innerHTML = xmlhttp.responseText;
					priceFunction(i);
				}
			};
			xmlhttp.open('GET','controller/quantityplus.php?quantity='+i,true);
			xmlhttp.send();
		}

		function priceFunction(i){
			var harga = document.getElementById('price'+i).innerHTML;
			var qty = document.getElementById('quantity'+i).innerHTML;
			document.getElementById('subtotal'+i).innerHTML = parseInt(harga) * parseInt(qty);
		}

		function cancelFunction(){
			var r = confirm('Are you sure you want to cancel ?');
			if(r == true){
				window.location='controller/cancel.php'
			}
		}
		function orderFunction(id){
			if(window.XMLHttpRequest){
				xmlhttp = new XMLHttpRequest();
			}
			xmlhttp.onreadystatechange = function(){
				if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
					document.getElementById('badge-order').innerHTML = xmlhttp.responseText;
				}
			};
			xmlhttp.open('GET','controller/cek_order.php?id='+id,true);
			xmlhttp.send();
		}
		function checkoutFunction(){
			if(window.XMLHttpRequest){
				xmlhttp = new XMLHttpRequest();
			}
			xmlhttp.onreadystatechange = function(){
				if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
					document.getElementById('hasil').innerHTML = xmlhttp.responseText;
				}
			};
			xmlhttp.open('GET','controller/load_order.php',true);
			xmlhttp.send();
		}
	</script>
	<style>
		.relative{
			background: url("images/or.jpg") no-repeat;
			background-size: 100% 100%;
			background-position: center top;
			background-attachment: fixed;
			-webkit-background-size: cover;
			-moz-background-size: cover;
			-o-background-size: cover;
			margin:20px 200px 40px 200px;
		}
		.wrapper {
			position: fixed;
			bottom:10px;
			right:10px;
			background-color: orange;
			background: url("images/dollars.png") no-repeat;
			background-size: 100% 100%;
			border-width: 10px;
		}
	</style>
	<!--JSON SCRIPT-->
	<script type="text/javascript">
		var xmlhttp = new XMLHttpRequest();
		var url = "controller/pizza_json.php";

		xmlhttp.onreadystatechange=function() {
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				myFunction(xmlhttp.responseText);
			}
		}
		xmlhttp.open("GET", url, true);
		xmlhttp.send();

		function myFunction(response) {
			var arr = JSON.parse(response);
			var i;
			var out = " ";

			for(i = 0; i < arr.length; i++) {
				var har = arr[i].harga;
				var m = arr[i].harga * 0.8;
				var s = arr[i].harga * 0.6;
				out += "<div class='col-sm-4'><div class='thumbnail'><img src='images/" + arr[i].image + "' alt='" + arr[i].nama + "' style='width:400px;height:270px;' ><div class=''><h3 align='center'>" + arr[i].nama + "</h3><p align='center'><strong>Large : Rp "+ har +",-<br>Medium : Rp "+ m +",-<br>Small : Rp "+s+",-</strong><br><br><a onclick='modalUkuranFunction(" + arr[i].pizza_id + ")' data-toggle='modal' data-target='#myModalUkuran' class='btn btn-warning btn-sm' role='button'><span class='glyphicon glyphicon-shopping-cart'></span>  PESAN</a></p></div><div class='jumbotron' align='center' style='background-color:white; margin-top:0px;padding-top:0px;padding-bottom:0px;'></div></div></div>"
			}
			document.getElementById("pizza_result").innerHTML = out;
		}
	</script>
</head>
<body class="relative">
		<div class='container-fluid' style='padding-top:100px;'>
		<div class='row'>
			<div id="pizza_result"></div>
		</div>
	</div>


	<div class="wrapper" align="center"><br />
		<a href='#' data-toggle="modal" data-target="#myModal" onclick="checkoutFunction()"><img src='images/blank.png' width="70px"height="50px" caption="check"><br>
			<h4><span class="label label-warning" id="badge-order"><?php echo $_SESSION['counter'];?></span></h4>

		</a>
	</div>

	<!--MODAL-->
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog modal-md" role="document">
			<div class="modal-content">
				<form action="controller/cek_order_submit.php" method="post">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel">RECEIPT</h4>
					</div>
					<div class="modal-body" id='modal-body'>
						<div class='container'>
							<div class='col-md-6'>
								<table class='table'>
									<thead>
										<th>#</th>
										<th>Pizza</th>
										<th>Size</th>
										<th>Price</th>
										<th>Quantity</th>
										<th>Sub</th>
									</thead>
									<tbody id="hasil"></tbody>
									<tbody id="subtotal"></tbody>
								</table>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="reset" class="btn btn-danger" onclick="cancelFunction()"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Cancel</button>
						<button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Order</button>
					</div>
				</form>
			</div>
		</div>
	</div>

</div>


<!--MODAL UKURAN-->
<div class="modal fade" id="myModalUkuran" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h2 class="modal-title">What size ?</h2>
			</div>
			<div class="modal-body" align="center">

				<div id='pizza-ukuran-id'>

				</div>
			</div>
			<div class="modal-footer">
			</div>
		</div>
	</div>
</div>

<script>
	function equalHeight(group) {    
		var tallest = 0;    
		group.each(function() {       
			var thisHeight = $(this).height();       
			if(thisHeight > tallest) {          
				tallest = thisHeight;       
			}    
		});    
		group.each(function() { $(this).height(tallest); });
	} 

	$(document).ready(function() {   
		equalHeight($(".well")); 
	});

</script>

</body>
</html>