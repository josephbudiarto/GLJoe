<?php session_start();
	if(isset($_SESSION['user']) && isset($_SESSION['user_id'])){
		if(isset($_SESSION['order'])){

		}
		else{
			header('location:index.php');
		}
	}
	else{
		header('location:login.php');
	}
	
	include('include/connect_db.php');
	
	$subtotal =0;
	$pajak=0;
	$total=0;
	for($j=1;$j<=$_SESSION['counter'];$j++){
		$subtotal+= (intval($_SESSION['order'][$j]['harga'])*intval($_SESSION['order'][$j]['quantity']));
	}
	$pajak = ($subtotal/100)*10;
	$total = $subtotal+$pajak;

	$query="SELECT * FROM member WHERE member_id=".$_SESSION['user_id'];
	$rs=mysqli_query($con,$query);
	$row=mysqli_fetch_array($rs);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="css/bootstrap.min.css">
	<?php include('include/header.php');?>
    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>-->
	<script src="js/moment.js"></script>
    <script type="text/javascript" src="js/bootstrap-datetimepicker.js"></script>
</head>
<body style='background-color: white;color:black;'>
	<div class='container' style="padding-top: 20px;">
	<div class='well'>
		<h1><strong><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Detail Transaction</strong></h1>
	</div>
		<div class='well col-md-7'>
		
		<h3><strong>Transaction</strong></h3>
			<table class="table" border="0">
				<thead class="thead-default">
					<tr>
						<td><strong>Item</strong></td>
						<td align="center"><strong>Price</strong></td>
						<td align="center"><strong>Quantity</strong></td>
						<td align="center"><strong>Sub</strong></td>
					</tr>
				</thead>
				<tbody>
			<?php
				for($i=1;$i<=$_SESSION['counter'];$i++){
					if($_SESSION['order'][$i]['quantity'] <> 0){?>
						<tr>
							<td><?php echo $_SESSION['order'][$i]['nama']?></td>
							<td align="center"><?php echo $_SESSION['order'][$i]['harga']?></td>
							<td align="center"><?php echo $_SESSION['order'][$i]['quantity']?></td>
							<td align="center"><?php echo $_SESSION['order'][$i]['harga'] * $_SESSION['order'][$i]['quantity'];?></td>
						</tr>
					
			<?php }}?>
						<tr>
							<td><strong>Subtotal</strong></td>
							<td></td>
							<td></td>
							<td align="center"><strong><?php echo $subtotal;?></strong></td>
						</tr>
						<tr>
							<td><strong>Pajak 10%</strong></td>
							<td></td>
							<td></td>
							<td align="center"><strong><?php echo $pajak;?></strong></td>
						</tr>
						<tr style="background:cyan;">
							<td><strong>TOTAL</strong></td>
							<td></td>
							<td></td>
							<td align="center"><strong><?php echo $total;?></strong></td>
						</tr>
				</tbody>
			</table>
		</div>
		<?php $_SESSION['total']=$total;?>
		<div class='col-md-5'>
			<div class='well'>
				<h3><strong>Information Order</strong></h3>
				<form action="controller/transaksi_submit.php" method="post">
					<div class="form-group">
						<label for="id">Member ID</label>
						<input type="text" id="id" name="id" value="<?php echo $row['member_id'];?>" readonly class="form-control">
					</div>
					<div class="form-group">
						<label for="name">Name</label>
						<input type="text" id="name" name="name" value="<?php echo $row['name'];?>" readonly class="form-control">
					</div>
					<div class="form-group">
						<label for="alamat">Alamat</label>
						<div class="input-group">
							<input type="text" id="alamat" name="alamat" value="<?php echo $row['alamat'];?>" required class="form-control"><span class="input-group-addon">Change if necessary</span>
						</div>
					</div>
					<div class="form-group">
						<label for="telp">Telephone</label>
						<div class="input-group">
							<input type="text" id="telp" name="telp" value="<?php echo $row['no_telp'];?>" required class="form-control"><span class="input-group-addon">Change if necessary</span>
						</div>
					</div>
					<div class="form-group">
						<label for="tanggal">Date</label>
						<input type="text" id="tanggal" name="tanggal" value="<?php $tanggal = date("Y-m-d"); echo $tanggal;?>" class="form-control" readonly>
					</div>
					<div class="form-group">
						<label for="credit">Credit Card Number</label>
						<input type="text" id="credit" name="credit" required class="form-control">
					</div>
					<div class="form-group">
						<label for="credit">3 Digit Belakang</label>
						<input type="text" id="bank" name="bank" required class="form-control">
					</div>
					<div class="form-group">
						<label for="credit">Expiry Date</label>
						<div class="input-group date" id="datetimepicker2" name="datetimepicker2">
							<input type="text" id="exp-date" name="exp-date" required class="form-control"><span class="input-group-addon glyphicon glyphicon-calendar"></span>
						</div>
					</div>
					<div class="form-group">
						<button type="submit" id="submit" name="submit" class="btn btn-success btn-block">Submit Order</button>
					</div>
					
				</form>
				<div class="form-group">
						<button type="reset" onclick="reset()" id="cancel" name="cancel" class="btn btn-danger btn-block">Cancel Order</button>
					</div>
		</div>
	</div>

<script>
	$(function () {
		$('#datetimepicker2').datetimepicker({
			format: 'YYYY/MM/DD'
		});
	});
	function reset(){
			var r = confirm('Are you sure ?');
  			if(r == true){
  				window.location='controller/cancel.php'
				//window.location='index.php';
  			}
  		$_
	}
</script>
</body>
</html>