<?php session_start(); include('include/connect_db.php');
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
	$query="SELECT * FROM detail WHERE transaksi_id=".$_GET['id'];
	$rs=mysqli_query($con,$query);
?>
<!DOCTYPE html>
<head>
	<?php include("include/header.php");?>
    <title>Dashboard Admin</title>
	<script>
		function badgeFunction(){
	        //var sta = document.getElementById('').value;
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
			setTimeout(badgeFunction, 1000);
		}
		badgeFunction(); //!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
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
		        <li id="size"><a href="size.php"><strong><i class="fa fa-font"></i> Size</strong></a></li>
		        <li id="member"><a href="member.php"><strong><i class="fa fa-users"></i> Member List</strong></a></li>
		        <li id="transaction" class="selected" style="background-color: #ffe6c6"><a href="transaction.php"><strong><i class="fa fa-navicon"></i> Transaction List</strong></a></li>
		        <li id="new_order"><a href="neworder.php"><strong><i class="fa fa-plus"></i> New Order &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp</strong> <span class="label label-default label-as-badge" id="new_badge"></span></a></li>
		    </ul>
		</div>
        <!-- TOGGLE SIDEBAR -->
        <div id="page-content-wrapper" class="col-md-12" style="background-color:#ffa127;height:60px; width:100%;padding:10px;position:fixed;z-index:100;">
            <a href="#menu-toggle" class="btn btn-default" id="menu-toggle"><i class="fa fa-lg fa-bars"></i></a>
            <a href="logout.php" class="btn btn-default"><i class="fa fa-sign-out"></i> Logout</a>
        </div>


        <div class="container-fluid table-responsive" style="padding-top: 70px;">
			<div class="row">
			<h2 style="color:black"><strong>&nbsp &nbsp <i class="fa  fa-plus-square"></i> Order Detail</strong> <button class="btn btn-primary btn-sm" onclick="window.location='transaction.php'"><i class="fa  fa-arrow-left"></i> Back</button></h2>
					<br>
					<div class="col-md-10 ">
						<table class="table table-striped">
							<thead>
								<tr>
									<td width="5%">#</td>
									<td width="20%">Item</td>
									<td width="10%">Quantity</td>
									<td width="65%">Description</td>
								</tr>
							</thead>
						<?php $co=1; while($row = mysqli_fetch_assoc($rs)){?>
								<tr>
									<td><?php echo $co++;?></td>
									<td><?php echo $row['item']?></td>
									<td><?php echo $row['quantity']?></td>
									<td><?php echo $row['description']?></td>
								</tr>
						<?php }?>
						</table>
					</div>
			</div>
		</div>
	</div>

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