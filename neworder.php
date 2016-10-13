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
	$query="SELECT t.transaksi_id as transaksi_id,t.new_alamat as new_alamat, t.new_telepon as new_telepon, t.status_acc as status_acc,t.member_id as member_id, m.name as name, t.tanggal as tanggal, t.total as total FROM transaksi t JOIN member m ON(t.member_id=m.member_id) WHERE t.status_acc=0;";
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

		function searchOtherFunction(){
			var key = document.getElementById('search-other').value;
			if(window.XMLHttpRequest){
	            xmlhttp = new XMLHttpRequest();
	        }
	        xmlhttp.onreadystatechange = function(){
	            if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
	                document.getElementById('table-result-other').innerHTML = xmlhttp.responseText;
	            }
	        };
	        xmlhttp.open('GET','controller/search_other_function.php?key='+key+'&status=0',true);
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
		        <li id="size"><a href="size.php"><strong><i class="fa fa-font"></i> Size</strong></a></li>
		        <li id="member"><a href="member.php"><strong><i class="fa fa-users"></i> Member List</strong></a></li>
		        <li id="transaction"><a href="transaction.php"><strong><i class="fa fa-navicon"></i> Transaction List</strong></a></li>
		        <li id="new_order" class="selected" style="background-color: #ffe6c6"><a href="neworder.php"><strong><i class="fa fa-plus"></i> New Order &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp</strong> <span class="label label-default label-as-badge" id="new_badge"></span></a></li>
		    </ul>
		</div>
        <!-- TOGGLE SIDEBAR -->
        <div id="page-content-wrapper" class="col-md-12" style="background-color:#ffa127;height:60px; width:100%;padding:10px;position:fixed;z-index:100;">
            <a href="#menu-toggle" class="btn btn-default" id="menu-toggle"><i class="fa fa-lg fa-bars"></i></a>
            <a href="logout.php" class="btn btn-default"><i class="fa fa-sign-out"></i> Logout</a>
        </div>


        <div class="container-fluid table-responsive" style="padding-top: 70px;">
			<div class="row">
			<h2 style="color:black"><strong>&nbsp &nbsp <i class="fa  fa-plus-square"></i> New Order</strong></h2>
					<br>
					<div class="col-md-3">
						<div class="input-group">
		    				<span class="input-group-addon"><i class="fa fa-search"></i></span>
		    				<input type="text" type="text" aria-controls="example" id="search-other" placeholder="Search..." onkeyup="searchOtherFunction()" class="form-control">
		  				</div>
		  			</div>
					<div class="col-md-10 ">
				
							<table class="table table-hover">
								<thead>
									<tr>
										<th width="20%">NAME</th>
										<th width="25%">ALAMAT</th>
										<th width="20%">TELEPHONE</th>
										<th width="15%">HARGA</th>
										<th width="15%">TANGGAL</th>
										<th width="5%">ACC</th>
									</tr>
								</thead>
								<tbody id="table-result-other">
								<?php while($row=mysqli_fetch_array($rs)){?>
									<tr>
										<td class='pad' onclick=window.location='neworder_detail.php?id=<?php echo $row["transaksi_id"]?>'><?php echo $row['name'];?></td>
										<td class='pad' onclick=window.location='neworder_detail.php?id=<?php echo $row["transaksi_id"]?>'><?php echo $row['new_alamat'];?></td>
										<td class='pad' onclick=window.location='neworder_detail.php?id=<?php echo $row["transaksi_id"]?>'><?php echo $row['new_telepon'];?></td>
										<td class='pad' onclick=window.location='neworder_detail.php?id=<?php echo $row["transaksi_id"]?>'><?php echo $row['total'];?></td>
										<td class='pad' onclick=window.location='neworder_detail.php?id=<?php echo $row["transaksi_id"]?>'><?php echo $row['tanggal'];?></td>
										<td><button class="btn btn-success btn-sm" onclick="window.location='controller/acc.php?id=<?php echo $row['transaksi_id']?>'"><span class="glyphicon glyphicon-ok"></span></button></td>
									</tr>
								<?php }?>
								</tbody>
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