<?php session_start();
	for($i=1;$i<=$_SESSION['counter'];$i++){
?>
	<tr>
		<td><?php echo $i; ?></td>
		<td><?php echo $_SESSION['order'][$i]['nama']; ?></td>
		<?php if(isset($_SESSION['order'][$i]['size'])){?>
			<td><?php echo $_SESSION['order'][$i]['size']; ?></td>
		<?php } else{?>
			<td> - </td>
		<?php } ?>
		<td id="price<?php echo $i;?>"><?php echo $_SESSION['order'][$i]['harga']; ?></td>
		<td>
			<a onclick='quantityFunctionMinus(<?php echo $i;?>)' class='btn btn-warning btn-sm'><span class='glyphicon glyphicon-minus'></span></a> <span id="quantity<?php echo $i;?>"><?php echo $_SESSION['order'][$i]['quantity'];?></span> <a onclick='quantityFunctionPlus(<?php echo $i;?>)'class='btn btn-primary btn-sm'><span class='glyphicon glyphicon-plus'></span></a></td>
		<td id="subtotal<?php echo $i;?>"><?php echo $_SESSION['order'][$i]['harga']*$_SESSION['order'][$i]['quantity']; ?></td>
	</tr>
<?php } 
/*
	if(isset($_SESSION['custom']['status'])){
		if($_SESSION['custom']['status'] == "true"){
			echo "<tr><td colspan='5'></td></tr>
				<tr><td colspan='5'>CUSTOM PIZZA</td></tr>";

			for($j=1;$j<=$_SESSION['custom-counter'];$j++){

			}
		}else if($_SESSION['custom']['status'] == "false"){}
	}
*/
?>
