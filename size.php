<?php include"include/connect_db.php";
	$query=mysqli_query($con,"SELECT * FROM size");
?>
<!DOCTYPE html>
<html>
<head>
	<?php include("include/header.php");?>
	<title>Size</title>
	<script>
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
	        xmlhttp.open('GET','controller/get_size_value.php?id='+sta,true);
	        xmlhttp.send();
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
		        <li id="overview" ><a href="admin.php"><strong><i class="fa fa-dashboard"></i> Dashboard</strong></a></li>
		        <li id="menus"><a href="menus.php"><strong><i class="fa fa-book"></i>  Menus</strong></a></li>
		        <li id="size" class="selected" style="background-color: #ffe6c6"><a href="size.php"><strong><i class="fa fa-font"></i> Size</strong></a></li>
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


        <div class="container-fluid">
			<div class="container-fluid table-responsive" style="padding-top: 70px;">
			<div class="row">
			<h2 style="color:black"><strong>&nbsp &nbsp <i class="fa  fa-font"></i> SIZE LIST</strong></h2>
					<br>
			<div class="col-md-10 ">
				<div class="col-md-9">
				
				<table class="table table-striped">
					<thead>
						<tr>
							<th width="45%">SIZE</th>
							<th width="45%">HARGA</th>
							<th width="10%">TOOLS</th>
						</tr>
					</thead>
					<tbody id="table-result-pizza">
					<?php
						while($row1 = mysqli_fetch_array($query)){
							echo "<tr>
									<td class='pad'>".$row1['size']."</td>
									<td class='pad'>".$row1['price']."</td>
									<td class='pad' align='center'>
										<button type='button' class='btn glyphicon glyphicon-pencil btn-sm btn-warning' data-toggle='modal' data-target='#myModal' onclick=modalFunction('".$row1['size']."')></button>
									</td>
								</tr>";
						}
					?>
					</tbody>
				</table>
			</div>
			</div>
			</div>
			
		<!-- Modal PIZZA-->
		<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title" id="myModalLabel">Edit Size</h4>
		      </div>
		      <div class="modal-body" id="hasil-ajax">
		        ...
		      </div>
		      <div class="modal-footer">
		      </div>
		    </div>
		  </div>
		</div>

</div>

    </div>	<!--End of Wrapper-->

    <script src="js/bootstrap.min.js"></script>
    <script>
    //TOGGLE SIDEBAR
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>
</body>
</html>