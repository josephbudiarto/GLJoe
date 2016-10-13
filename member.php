<?php session_start(); include("include/connect_db.php");
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
	$query="SELECT * FROM member";
	$rs=mysqli_query($con,$query);
	$rscount=mysqli_query($con,"SELECT COUNT(*) FROM member");
	$rowcount=mysqli_fetch_array($rscount);
	$count=1;
?>

<!DOCTYPE html>
<html>
<head>
	<?php include("include/header.php");?>
	<script type="text/javascript">

		function searchFunction(){
	        var sta = document.getElementById('search').value;
	        if(window.XMLHttpRequest){
	            xmlhttp = new XMLHttpRequest();
	        }
	        xmlhttp.onreadystatechange = function(){
	            if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
	                document.getElementById('table-result').innerHTML = xmlhttp.responseText;
	            }
	        };
	        xmlhttp.open('GET','controller/search.php?key='+sta,true);
	        xmlhttp.send();

	    	}

    	function jumlahFunction(){
	        var sta = document.getElementById('jumlah').value;
	        if(window.XMLHttpRequest){
	            xmlhttp = new XMLHttpRequest();
	        }
	        xmlhttp.onreadystatechange = function(){
	            if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
	                document.getElementById('table-result').innerHTML = xmlhttp.responseText;
	            }
	        };
	        xmlhttp.open('GET','controller/load_jumlah.php?i='+sta,true);
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
		function removeFunction(id){
			var r = confirm('Are you sure ?');
  			if(r == true){
					window.location='controller/remove_member.php?id='+id;
  			}
		}
		/*
		function modalFunction(sta){
	        if(window.XMLHttpRequest){
	            xmlhttp = new XMLHttpRequest();
	        }
	        xmlhttp.onreadystatechange = function(){
	            if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
	                document.getElementById('hasil-ajax').innerHTML = xmlhttp.responseText;
	            }
	        };
	        xmlhttp.open('GET','controller/member_modal.php?id='+sta,true);
	        xmlhttp.send();
		}*/
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
		        <li id="member" class="selected" style="background-color: #ffe6c6"><a href="member.php"><strong><i class="fa fa-users"></i> Member List</strong></a></li>
		        <li id="transaction"><a href="transaction.php"><strong><i class="fa fa-navicon"></i> Transaction List</strong></a></li>
		        <li id="new_order"><a href="neworder.php"><strong><i class="fa fa-plus"></i> New Order &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</strong> <span class="label label-default label-as-badge" id="new_badge"></span></a></li>
		    </ul>
		</div>
        <!-- TOGGLE SIDEBAR -->
        <div id="page-content-wrapper" class="col-md-12" style="background-color:#ffa127;height:60px; width:100%;padding:10px;position:fixed;z-index:100;">
            <a href="#menu-toggle" class="btn btn-default" id="menu-toggle"><i class="fa fa-lg fa-bars"></i></a>
            <a href="logout.php" class="btn btn-default"><i class="fa fa-sign-out"></i> Logout</a>
        </div>
<div class="container-fluid table-responsive" style="padding-top: 70px;">
	<div class="row">
	<h2 style="color:black"><strong>&nbsp; &nbsp; <i class="fa  fa-users"></i> MEMBER'S TABLE </strong></h2>
					<br>
		<div class="col-md-10">
			<p>Show <select id="jumlah" onchange="jumlahFunction()">
						<option value="10">10</option>
						<option value="50">50</option>
						<option value="100">100</option>
					</select> rows &nbsp; | &nbsp;
					<input type="text" aria-controls="example" id="search" placeholder="Search..." onkeyup="searchFunction()"></p>
<!--<section id="table-result">-->
			<table class="table table-striped">
				<thead>
					<tr>
						<td class="pad" align="center">ID</td>
						<td class="pad" align="center">NAME</td>
						<td class="pad" align="center">USERNAME</td>
						<td class="pad" align="center">PASSWORD</td>
						<td class="pad" align="center">EMAIL</td>
						<td class="pad" align="center">TELEPON</td>
						<td class="pad" align="center">ALAMAT</td>
						<td class="pad" align="center">TOOLS</td>
					</tr>
				</thead>
				<tbody id="table-result">
				<?php
					while($row=mysqli_fetch_array($rs)){
						if($count <=10 && $row['member_id'] != NULL){
							echo "	<tr>
								<td class='pad' align='center'>".$row['member_id']."</td>
								<td class='pad' align='center'>".$row['name']."</td>
								<td class='pad' align='center'>".$row['username']."</td>
								<td class='pad' align='center'>".$row['password']."</td>
								<td class='pad' align='center'>".$row['email']."</td>
								<td class='pad' align='center'>".$row['no_telp']."</td>
								<td class='pad' align='center'>".$row['alamat']."</td>
								<td class='pad' align='center'>".
									//<button class='btn glyphicon glyphicon-pencil btn-warning btn-sm' data-toggle='modal' data-target='#myModal' onclick='modalFunction(".$row['member_id'].")'></button>
								"<button onclick='removeFunction(".$row['member_id'].")' class='btn glyphicon glyphicon-remove btn-danger btn-sm'></button>
								</td>
								</tr>";
							$count+=1;
						}
					}
				?>
					<tr>
						<td colspan="8">There are <?php echo $rowcount[0]-$count+1;?> more member.</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>
</div>
<!--</section>-->


<script src="js/bootstrap.min.js"></script>
<script type="text/javascript">
	//TOGGLE SIDEBAR
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
</script>
</body>
</html>