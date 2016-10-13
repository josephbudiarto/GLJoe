<?php session_start();
	include "include/connect_db.php";
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
	$pizza=mysqli_query($con,"SELECT COUNT(*) as count FROM detail d JOIN pizza p ON(d.item=p.nama) WHERE d.status_acc = 1");
	$pasta=mysqli_query($con,"SELECT COUNT(*) as count FROM detail d JOIN other o ON(d.item=o.nama) WHERE o.category='pasta' AND d.status_acc = 1");
	$snack=mysqli_query($con,"SELECT COUNT(*) as count FROM detail d JOIN other o ON(d.item=o.nama) WHERE o.category='snack' AND d.status_acc = 1");
	$drink=mysqli_query($con,"SELECT COUNT(*) as count FROM detail d JOIN other o ON(d.item=o.nama) WHERE o.category='drink' AND d.status_acc = 1");
	$pizzarow=mysqli_fetch_array($pizza);
	$pastarow=mysqli_fetch_array($pasta);
	$snackrow=mysqli_fetch_array($snack);
	$drinkrow=mysqli_fetch_array($drink);

	$January = mysqli_query($con,"SELECT COUNT(*) as count FROM transaksi WHERE MONTH(tanggal) = 1 AND status_acc=1");
	$February = mysqli_query($con,"SELECT COUNT(*) as count FROM transaksi WHERE MONTH(tanggal) = 2 AND status_acc=1");
	$March = mysqli_query($con,"SELECT COUNT(*) as count FROM transaksi WHERE MONTH(tanggal) = 3 AND status_acc=1");
	$April = mysqli_query($con,"SELECT COUNT(*) as count FROM transaksi WHERE MONTH(tanggal) = 4 AND status_acc=1");
	$May = mysqli_query($con,"SELECT COUNT(*) as count FROM transaksi WHERE MONTH(tanggal) = 5 AND status_acc=1");
	$June = mysqli_query($con,"SELECT COUNT(*) as count FROM transaksi WHERE MONTH(tanggal) = 6 AND status_acc=1");
	$July = mysqli_query($con,"SELECT COUNT(*) as count FROM transaksi WHERE MONTH(tanggal) = 7 AND status_acc=1");
	$August = mysqli_query($con,"SELECT COUNT(*) as count FROM transaksi WHERE MONTH(tanggal) = 8 AND status_acc=1");
	$September = mysqli_query($con,"SELECT COUNT(*) as count FROM transaksi WHERE MONTH(tanggal) = 9 AND status_acc=1");
	$October = mysqli_query($con,"SELECT COUNT(*) as count FROM transaksi WHERE MONTH(tanggal) = 10 AND status_acc=1");
	$November = mysqli_query($con,"SELECT COUNT(*) as count FROM transaksi WHERE MONTH(tanggal) = 11 AND status_acc=1");
	$December = mysqli_query($con,"SELECT COUNT(*) as count FROM transaksi WHERE MONTH(tanggal) = 12 AND status_acc=1");

	$jan = mysqli_fetch_array($January);
	$feb = mysqli_fetch_array($February);
	$mar = mysqli_fetch_array($March);
	$apr = mysqli_fetch_array($April);
	$may = mysqli_fetch_array($May);
	$jun = mysqli_fetch_array($June);
	$jul = mysqli_fetch_array($July);
	$aug = mysqli_fetch_array($August);
	$sept = mysqli_fetch_array($September);
	$oct = mysqli_fetch_array($October);
	$nov = mysqli_fetch_array($November);
	$dec = mysqli_fetch_array($December);

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
<body bgcolor="white">
    <div id="wrapper">
        <!-- Sidebar -->
        <div id="sidebar-wrapper" >
		    <ul class="sidebar-nav">
		        <li class="sidebar-brand">
		            <a href="#" style="background-color:#ffa127;color: white;"><strong>GL JOE's</strong></a>
		        </li>
		        <li id="overview" class="selected" style="background-color: #ffe6c6"><a href="admin.php"><strong><i class="fa fa-dashboard"></i> Dashboard</strong></a></li>
		        <li id="menus"><a href="menus.php"><strong><i class="fa fa-book"></i>  Menus</strong></a></li>
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

<br><br>
<ul class="nav nav-tabs" style="background-color:#ffe263; color:black">
  <li class="active" style="color:black"><a href="#home" data-toggle="tab" aria-expanded="true"><h3 style="color:black ; "><i class="fa  fa-bar-chart"></i> Sales Chart</h3></a></li>
  <li class="" style="color:black"><a href="#dropdown1" data-toggle="tab" aria-expanded="false"><h3 style="color:black ; "><i class="fa  fa-pie-chart"></i> Transaction Chart</h3></a></li>
   <li class="" style="color:black"><a href="#dropdown2" data-toggle="tab" aria-expanded="false"><h3 style="color:black ; "><i class="fa  fa-list-alt"></i> Member Log</h3></a></li>
</ul>
<div id="myTabContent" class="tab-content">
  <div class="tab-pane fade active in" id="home">
            <!--CONTAINER BAR GRAPH-->
        <div class="container-fluid" style="background-color: white; ">
        <div class="row">
         <h2 style="color:black"><strong>&nbsp &nbsp <i class="fa  fa-bar-chart"></i> SALES CHARTS</strong></h2>
         <br>
			<div class="col-md-10 ">
	            <div class="panel-body">
	           
			        <div style="width: 70%;">
						<canvas id="canvas" height="400" width="550"></canvas>
					</div>
				</div>
			</div>
			
		</div>
        </div>

  </div>

     <div class="tab-pane fade" id="dropdown1">
   	<div class="container-fluid" style="background-color: white; ">
		    <div class="row">
		    <h2 style="color:black"><strong>&nbsp &nbsp <i class="fa  fa-pie-chart"></i> TRANSACTION CHARTS PER ITEM CATEGORY</strong></h2>
		<br><br><br>
		        <div class="col-md-5 col-sm-5 col-xs-5 col-md-offset-1 col-sm-offset-1">
		            <div class="panel-body">
		            	
						<div id="canvas-holder" style="width: 100%;">
							<canvas id="chart-area" width="300" height="300"/></canvas>
						</div>
					</div>
				</div>

				<div class="col-md-5 col-sm-5 col-xs-5">
					<br>
					<div class="jumbotron">LEGENDS :<br>
						<table class="table">
							<tr>
								<td align="center"><div style="width:30px;height:30px; background-color: #F7464A;"></div></td>
								<td>Pizza</td>
								<td><?php echo $pizzarow['count'];?></td>
							</tr>
							<tr>
								<td align="center"><div style="width:30px;height:30px; background-color: #46BFBD;"></div></td>
								<td>Pasta</td>
								<td><?php echo $pastarow['count'];?></td>
							</tr>
							<tr>
								<td align="center"><div style="width:30px;height:30px; background-color: #FDB45C;"></div></td>
								<td>Snack</td>
								<td><?php echo $snackrow['count'];?></td>
							</tr>
							<tr>
								<td align="center"><div style="width:30px;height:30px; background-color: #949FB1;"></div></td>
								<td>Drink</td>
								<td><?php echo $drinkrow['count'];?></td>
							</tr>	
						</table>
					</div>
				</div>
			</div>
		</div>
  </div>
 
  <div class="tab-pane fade" id="dropdown2">
    
<section id="result" style="display:block;">
<h2 style="color:black"><strong>&nbsp &nbsp <i class="fa  fa-list-alt"></i> Member Log</strong></h2>
	<div class="col-sm-10 ">
            <div class="row col-md-5 col-md-offset-1 ">
            <table class="table table-striped">
                <thead>
                    <tr>

                        <th width="10%">#</th>
                        <th width="25%">Date</th>
                        <th width="20%">Time</th>
                        <th width="30%">Member Log</th>
                    </tr>
                </thead>
                <tbody>
                	<?php $counter=1;$log=mysqli_query($con,"SELECT l.date as date, l.time as time, m.name as name FROM log l JOIN member m ON(l.member_id = m.member_id) ORDER BY l.date DESC LIMIT 50"); while($rowlog=mysqli_fetch_array($log)){?>
                	<tr>
                		<td><?php echo $counter++;?></td>
                		<td><?php echo $rowlog['date'];?></td>
                		<td><?php echo $rowlog['time'];?></td>
                		<td><?php echo $rowlog['name'];?></td>
                	</tr>
                	<?php } ?>
                </tbody>
            </table>
            </div>
	</div>
</section>
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
    //AJAX SHOW PAGE
    /*$(document).ready(function(){
		$("#menus").click(function(){
			$('#result').load('menus.php');
			document.getElementById('menus').setAttribute("class", "selected");
			document.getElementById('transaction').removeAttribute('class');
			document.getElementById('member').removeAttribute('class');
			document.getElementById('staff').removeAttribute('class');
		});
		$("#transaction").click(function(){
			$('#result').load('transaction.php');
			document.getElementById('transaction').setAttribute("class", "selected");
			document.getElementById('menus').removeAttribute('class');
			document.getElementById('member').removeAttribute('class');
			document.getElementById('staff').removeAttribute('class');
		});
		$("#member").click(function(){
			$('#result').load('member.php');
			document.getElementById('member').setAttribute("class", "selected");
			document.getElementById('menus').removeAttribute('class');
			document.getElementById('transaction').removeAttribute('class');
			document.getElementById('staff').removeAttribute('class');
		});
		$("#staff").click(function(){
			$('#result').load('staff.php');
			document.getElementById('staff').setAttribute("class", "selected");
			document.getElementById('menus').removeAttribute('class');
			document.getElementById('transaction').removeAttribute('class');
			document.getElementById('member').removeAttribute('class');
		});
	});

	//Function Call To Hide Section
	function call(){
		document.getElementById('result').style.display="block";
		document.getElementById('default').style.display="none";
		document.getElementById('overview').removeAttribute('class');
	}
	function call2(){//FOR OVERVIEW
		document.getElementById('default').style.display="block";
		document.getElementById('result').style.display="none";
		document.getElementById('menus').removeAttribute('class');
		document.getElementById('transaction').removeAttribute('class');
		document.getElementById('member').removeAttribute('class');
		document.getElementById('staff').removeAttribute('class');
		document.getElementById('overview').setAttribute("class", "selected");
	}*/

	//CHART JAVA SCRIPT
	var pizza = <?php echo $pizzarow['count'] ;?>;
	var pasta = <?php echo $pastarow['count'] ;?>;
	var snack = <?php echo $snackrow['count'] ;?>;
	var drink = <?php echo $drinkrow['count'] ;?>;

	var jan = <?php echo $jan['count'];?>;
	var feb = <?php echo $feb['count'];?>;
	var mar = <?php echo $mar['count'];?>;
	var apr = <?php echo $apr['count'];?>;
	var may = <?php echo $may['count'];?>;
	var jun = <?php echo $jun['count'];?>;
	var jul = <?php echo $jul['count'];?>;
	var aug = <?php echo $aug['count'];?>;
	var sept = <?php echo $sept['count'];?>;
	var oct = <?php echo $oct['count'];?>;
	var nov = <?php echo $nov['count'];?>;
	var dec = <?php echo $dec['count'];?>;


	window.onload = function(){
		var ctx = document.getElementById("canvas").getContext("2d");
		window.myBar = new Chart(ctx).Bar(barChartData, {
			responsive : true
		});
		var ct = document.getElementById("chart-area").getContext("2d");
		window.myPie = new Chart(ct).Pie(pieData);
	}
	var randomScalingFactor = function(){ return Math.round(Math.random()*100)};
	var barChartData = {
		labels : ["January","February","March","April","May","June","July","August","September","October","November","December"],
		datasets : [
			{
				fillColor : "rgba(255, 230, 198, 1)",
				strokeColor : "rgba(218, 184, 140, 1)",
				highlightFill: "rgba(255, 230, 198, 1)",
				highlightStroke: "rgba(0,0,0,0.3)",
				data : [jan,feb,mar,apr,may,jun,jul,aug,sept,oct,nov,dec]
			}
			/*,{
				fillColor : "rgba(151,187,205,0.5)",
				strokeColor : "rgba(151,187,205,0.8)",
				highlightFill : "rgba(151,187,205,0.75)",
				highlightStroke : "rgba(151,187,205,1)",
				data : [randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor()]
			}*/
		]

	}
	
	var pieData = [
				{
					value: pizza,
					color:"#F7464A",
					highlight: "#FF5A5E",
					label: "Pizza"
				},
				{
					value: pasta,
					color: "#46BFBD",
					highlight: "#5AD3D1",
					label: "Pasta"
				},
				{
					value: snack,
					color: "#FDB45C",
					highlight: "#FFC870",
					label: "Snack"
				},
				{
					value: drink,
					color: "#949FB1",
					highlight: "#A8B3C5",
					label: "Drink"
				}
			];

    </script>
</body>
</html>