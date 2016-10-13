<?php session_start();
	$subtotal =0;
	$pajak=0;
	$total=0;
	for($j=1;$j<=$_SESSION['counter'];$j++){
		$subtotal+= (intval($_SESSION['order'][$j]['harga'])*intval($_SESSION['order'][$j]['quantity']));
	}
	$pajak = ($subtotal/100)*10;
	$total = $subtotal+$pajak;
?>

<tr >
	<td>Subtotal</td>
	<td></td>
	<td><?php echo $subtotal;?></td>
	<td></td>
</tr>
<tr>
	<td>Pajak 10%</td>
	<td></td>
	<td><?php echo $pajak;?></td>
	<td></td>
</tr>
<tr>
	<td></td>
	<td>TOTAL</td>
	<td><?php echo $total;?></td>
	<td></td>
</tr>
