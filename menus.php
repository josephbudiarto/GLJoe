<?php session_start();
include("include/connect_db.php");

	if(isset($_SESSION['user'])){
		if(isset($_SESSION['pengaman'])== "adminmasuk"){

		}
		else{	
			header('location:login.php');
		}
	}
	else{
		header('location:index.php');
	}

	$query1="SELECT * FROM pizza";
	$rs1=mysqli_query($con,$query1);
	$query2="SELECT * FROM topping";
	$rs2=mysqli_query($con,$query2);
	$query3="SELECT * FROM other";
	$rs3=mysqli_query($con,$query3);
?>
<!DOCTYPE html>
<html>
<head>
	<?php include("include/header.php");?>
		
    <title>Menus</title>
	<script>
		function searchPizzaFunction(){
			var sta = document.getElementById('search-pizza').value;
	        if(window.XMLHttpRequest){
	            xmlhttp = new XMLHttpRequest();
	        }
	        xmlhttp.onreadystatechange = function(){
	            if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
	                document.getElementById('table-result-pizza').innerHTML = xmlhttp.responseText;
	            }
	        };
	        xmlhttp.open('GET','controller/search_menu.php?pizza='+sta,true);
	        xmlhttp.send();
		}
		function searchToppingFunction(){
			var sta = document.getElementById('search-topping').value;
	        if(window.XMLHttpRequest){
	            xmlhttp = new XMLHttpRequest();
	        }
	        xmlhttp.onreadystatechange = function(){
	            if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
	                document.getElementById('table-result-topping').innerHTML = xmlhttp.responseText;
	            }
	        };
	        xmlhttp.open('GET','controller/search_menu.php?topping='+sta,true);
	        xmlhttp.send();
		}
		function searchOtherFunction(){
			var sta = document.getElementById('search-other').value;
	        if(window.XMLHttpRequest){
	            xmlhttp = new XMLHttpRequest();
	        }
	        xmlhttp.onreadystatechange = function(){
	            if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
	                document.getElementById('table-result-other').innerHTML = xmlhttp.responseText;
	            }
	        };
	        xmlhttp.open('GET','controller/search_menu.php?other='+sta,true);
	        xmlhttp.send();
		}
		function badgeFunction(){
	        if(window.XMLHttpRequest){
	            xmlhttp = new XMLHttpRequest();
	        }
	        xmlhttp.onreadystatechange = function(){
	            if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
	                document.getElementById('new_badge').innerHTML = xmlhttp.responseText;
	            }
	        };
	        xmlhttp.open('GET','controller/cek_badge.php',true);
	        xmlhttp.send();
			setTimeout(badgeFunction, 1500);
		}
		badgeFunction(); //!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

		function modalFunction(sta){
	        if(window.XMLHttpRequest){
	            xmlhttp = new XMLHttpRequest();
	        }
	        xmlhttp.onreadystatechange = function(){
	            if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
	                document.getElementById('hasil-ajax').innerHTML = xmlhttp.responseText;
	            }
	        };
	        xmlhttp.open('GET','controller/get_value.php?id='+sta,true);
	        xmlhttp.send();
		}
		function modalToppingFunction(sta){
	        if(window.XMLHttpRequest){
	            xmlhttp = new XMLHttpRequest();
	        }
	        xmlhttp.onreadystatechange = function(){
	            if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
	                document.getElementById('hasil-ajax-topping').innerHTML = xmlhttp.responseText;
	            }
	        };
	        xmlhttp.open('GET','controller/get_value_topping.php?id='+sta,true);
	        xmlhttp.send();
		}

		function modalOtherFunction(sta){
	        if(window.XMLHttpRequest){
	            xmlhttp = new XMLHttpRequest();
	        }
	        xmlhttp.onreadystatechange = function(){
	            if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
	                document.getElementById('hasil-ajax-other').innerHTML = xmlhttp.responseText;
	            }
	        };
	        xmlhttp.open('GET','controller/get_value_other.php?id='+sta,true);
	        xmlhttp.send();
		}

		function deletePizzaFunction(id){
			var r = confirm('Are you sure ?');
  			if(r == true){
					window.location='controller/deletepizza.php?id='+id;
  			}
		}
		function deleteToppingFunction(id){
			var r = confirm('Are you sure ?');
  			if(r == true){
					window.location='controller/deletetopping.php?id='+id;
  			}
		}
		function deleteOtherFunction(id){
			var r = confirm('Are you sure ?');
  			if(r == true){
					window.location='controller/deleteother.php?id='+id;
  			}
		}
	</script>
</head>
<body>
    <div id="wrapper">
        <!-- Sidebar -->
        <div id="sidebar-wrapper" >
		    <ul class="sidebar-nav">
		        <li class="sidebar-brand">
		            <a href="#" style="background-color:#ffa127;color: white;"><strong>GL JOE's</strong></a>
		        </li>
		        <li id="overview"  ><a href="admin.php"><strong><i class="fa fa-dashboard"></i> Dashboard</strong></a></li>
		        <li id="menus" style="background-color: #ffe6c6"><a href="menus.php"><strong><i class="fa fa-book"></i>  Menus</strong></a></li>
		        <li id="size"><a href="size.php"><strong><i class="fa fa-font"></i> Size</strong></a></li>
		        <li id="member"><a href="member.php"><strong><i class="fa fa-users"></i> Member List</strong></a></li>
		        <li id="transaction"><a href="transaction.php"><strong><i class="fa fa-navicon"></i> Transaction List</strong></a></li>
		        <li id="new_order"><a href="neworder.php"><strong><i class="fa fa-plus"></i> New Order &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp</strong> <span class="label label-default label-as-badge" id="new_badge"></span></a></li>
		    </ul>
		</div>
        <!-- TOGGLE SIDEBAR -->
        <div id="page-content-wrapper" class="col-md-12" style="background-color:#ffa127;height:60px; width:100%;padding:10px;position:fixed;z-index:100;">
            <a href="#menu-toggle" class="btn btn-default" id="menu-toggle"><i class="fa fa-lg fa-bars"></i></a>
            <a href="logout.php" class="btn btn-default"><i class="fa fa-sign-out"></i> Logout</a>
        </div>



<bR><br>



<div class="container-fluid" style="padding:0px">
<ul class="nav nav-tabs" id="myTab" style="background-color:#ffe263; color:black">
	  <li id="a" role="presentation" class="fade active in"><a href="#" onclick="calling()"><h3 style="color:black ; "><img src="images/pizza2.png" height="20px" width="20px">PIZZA</h3></a></li>
	  <li id="b" role="presentation"><a href="#"  onclick="calling2()"><h3 style="color:black ; "><i class="fa fa-plus-square"></i> TOPPINGS</h3></a></li>
	  <li id="c" role="presentation"><a href="#" onclick="calling3()"><h3 style="color:black ; "><i class="fa fa-ellipsis-h"></i> OTHERS</h3></a></li>
	</ul>
	<div id="myTabContent1" class="tab-content" style="display: block;">
		<div role="tabpanel" class="tab-pane fade in active" aria-labelledby="home-tab">
			<div class="container-fluid table-responsive" >
			<div class="row">
			<h2 style="color:black"><strong>&nbsp &nbsp <img src="images/pizza2.png" height="20px" width="20px"> Pizza List</strong></h2>
					<br>
					<div class="col-md-3">
						<div class="input-group">
		    <span class="input-group-addon"><i class="fa fa-search"></i></span>
		    <input type="text" type="text" aria-controls="example" id="search-pizza" placeholder="Search..." onkeyup="searchPizzaFunction()" class="form-control">
		  </div>
					</div>
					
			<br><br><br>
			<div class="col-md-10 ">
				
				
				<table class="table table-striped">
					<thead>
						<tr>
							<th width="5%" align="center">ID</th>
							<th width="15%">NAME</th>
							<th width="10%">HARGA</th>
							<th width="30%">DESCRIPTION</th>
							<th width="10%">IMAGE</th>
							<th width="10%">TOOLS</th>
						</tr>
					</thead>
					<tbody id="table-result-pizza">
					<?php
						while($row1 = mysqli_fetch_array($rs1)){
							echo "<tr>
									<td class='pad' align='center'>".$row1['pizza_id']."</td>
									<td class='pad'>".$row1['nama']."</td>
									<td class='pad'>".$row1['harga']."</td>
									<td class='pad'>".$row1['description']."</td>
									<td class='pad'>".$row1['image']."</td>
									<td class='pad' align='center'>
										<button type='button' class='btn glyphicon glyphicon-pencil btn-sm btn-warning' data-toggle='modal' data-target='#myModal' onclick='modalFunction(".$row1['pizza_id'].")'></button>
										<button onclick='deletePizzaFunction(".$row1['pizza_id'].")' class='btn glyphicon glyphicon-remove btn-sm btn-danger'></button>
									</td>
								</tr>";
						}
					?>
						<tr>
							<td colspan="7"><button class="btn btn-success btn-block glyphicon glyphicon-plus" onclick="window.location='addpizzaform.php'"></button></td>
						</tr>
					</tbody>
				</table>
			</div>
			</div>
			</div>
		</div>
	</div>

		<!-- Modal PIZZA-->
		<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title" id="myModalLabel">Edit Pizza</h4>
		      </div>
		      <div class="modal-body" id="hasil-ajax">
		        ...
		      </div>
		      <div class="modal-footer">
		      </div>
		    </div>
		  </div>
		</div>


		<div id="myTabContent2" class="tab-content" style="display: none;">
			<div role="tabpanel" class="tab-pane fade in active" aria-labelledby="home-tab">
			<div class="container-fluid table-responsive" >
			<div class="row">
			<h2 style="color:black"><strong>&nbsp &nbsp <i class="fa  fa-plus-square"></i> TOPPING LIST</strong></h2>
					<br>
					<div class="col-md-3">
						<div class="input-group">
		    <span class="input-group-addon"><i class="fa fa-search"></i></span>
		    <input type="text" type="text" aria-controls="example" id="search-topping" placeholder="Search..." onkeyup="searchToppingFunction()" class="form-control">
		  </div>
					</div>
					
			<br><br><br>
			<div class="col-md-10">
				
				
				<table class="table table-striped" >
					<thead >
						<tr >
							<th >ID</th>
							<th>NAME</th>
							<th>HARGA</th>
							<th>IMAGE PATH</th>
							<th>TYPE</th>
							<th>TOOLS</th>
						</tr>
					</thead>
					<tbody id="table-result-topping" >
					<?php while($row2 = mysqli_fetch_array($rs2)){
						echo "<tr>
								<td class='pad' >".$row2['topping_id']."</td>
								<td class='pad' >".$row2['nama']."</td>
								<td class='pad' >".$row2['harga']."</td>
								<td class='pad' >".$row2['image']."</td>
								<td class='pad' >".$row2['type']."</td>
								<td class='pad' >
									<button class='btn glyphicon glyphicon-pencil btn-warning' data-toggle='modal' data-target='#myModalTopping' onclick='modalToppingFunction(".$row2['topping_id'].")'></button>
									<button onclick='deleteToppingFunction(".$row2['topping_id'].")' class='btn glyphicon glyphicon-remove btn-danger'></button>
								</td>
							</tr>";
					}?>
						<tr>
							<td colspan="6"><button class="btn btn-success btn-block glyphicon glyphicon-plus" onclick="window.location='addtoppingform.php'"></button></td>
						</tr>
					</tbody>
				</table>
				</div></div></div>
			</div>
		</div>


		<!-- Modal TOPPING-->
		<div class="modal fade" id="myModalTopping" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title" id="myModalLabel">Edit Topping</h4>
		      </div>
		      <div class="modal-body" id="hasil-ajax-topping">
		        ...
		      </div>
		      <div class="modal-footer">
		      </div>
		    </div>
		  </div>
		</div>



		<div id="myTabContent3" class="tab-content" style="display: none;">
			<div role="tabpanel" class="tab-pane fade in active" aria-labelledby="home-tab">
			<div class="container-fluid table-responsive" >
			<div class="row">
			<h2 style="color:black"><strong>&nbsp &nbsp <i class="fa  fa-ellipsis-h"></i> OTHER LIST</strong></h2>
					<br>
					<div class="col-md-3">
						<div class="input-group">
		    <span class="input-group-addon"><i class="fa fa-search"></i></span>
		    <input type="text" type="text" aria-controls="example" id="search-other" placeholder="Search..." onkeyup="searchOtherFunction()" class="form-control">
		  </div>
					</div>
					
			<br><br><br>
			<div class="col-md-10">
				
			
				<table class="table table-striped">
					<thead>
						<tr>
							<th width="5%">ID</th>
							<th width="10%">NAME</th>
							<th width="10%">HARGA</th>
							<th width="10%">IMAGE</th>
							<th width="25%">DESCRIPTION</th>
							<th width="10%">Category</th>
							<th width="20%">TOOLS</th>
						</tr>
					</thead>
					<tbody id="table-result-other">
						<?php while($row3 = mysqli_fetch_array($rs3)){
							echo "<tr>
									<td class='pad' align='center'>".$row3['other_id']."</td>
									<td class='pad' align='center'>".$row3['nama']."</td>
									<td class='pad' align='center'>".$row3['harga']."</td>
									<td class='pad' align='center'>".$row3['image']."</td>
									<td class='pad'>".$row3['description']."</td>
									<td class='pad' align='center'>".$row3['category']."</td>
									<td class='pad' align='center'>
										<button class='btn btn-sm glyphicon glyphicon-pencil btn-warning' data-toggle='modal' data-target='#myModalOther' onclick='modalOtherFunction(".$row3['other_id'].")'></button>
										<button onclick='deleteOtherFunction(".$row3['other_id'].")' class='btn btn-sm glyphicon glyphicon-remove btn-danger'></button>
									</td>
								</tr>";
						}?>
						<tr>
							<td colspan="7"><button class="btn btn-success btn-block glyphicon glyphicon-plus" onclick="window.location='addotherform.php'"></button></td>
						</tr>
					</tbody>
				</table>
				</div></div></div>
			</div>
		</div>


		<!-- Modal OTHER-->
		<div class="modal fade" id="myModalOther" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title" id="myModalLabel">Edit Other</h4>
		      </div>
		      <div class="modal-body" id="hasil-ajax-other">
		        ...
		      </div>
		      <div class="modal-footer">
		      </div>
		    </div>
		  </div>
		</div>

</div>
</div>



<script src="js/bootstrap.min.js"></script>
<script type="text/javascript">
	//TOGGLE SIDEBAR
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });

	function calling(){
		document.getElementById('myTabContent1').style.display="block";
		document.getElementById('myTabContent2').style.display="none";
		document.getElementById('myTabContent3').style.display="none";
		document.getElementById('a').setAttribute("class", "active");
		document.getElementById('b').removeAttribute('class');
		document.getElementById('c').removeAttribute('class');
	}
	function calling2(){
		document.getElementById('myTabContent2').style.display="block";
		document.getElementById('myTabContent1').style.display="none";
		document.getElementById('myTabContent3').style.display="none";
		document.getElementById('b').setAttribute("class", "active");
		document.getElementById('a').removeAttribute('class');
		document.getElementById('c').removeAttribute('class');
	}
	function calling3(){
		document.getElementById('myTabContent3').style.display="block";
		document.getElementById('myTabContent2').style.display="none";
		document.getElementById('myTabContent1').style.display="none";
		document.getElementById('c').setAttribute("class", "active");
		document.getElementById('a').removeAttribute('class');
		document.getElementById('b').removeAttribute('class');
	}
</script>
</body>
</html>