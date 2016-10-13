<?php include("../include/connect_db.php");
	if(isset($_GET['pizza'])){
		$pizza=$_GET['pizza'];
		if($pizza != NULL){
			$query="SELECT * FROM pizza WHERE nama LIKE '".$pizza."%' OR description LIKE '%".$pizza."%'";
		}
		else{
			$query="SELECT * FROM pizza";
		}
		$rs=mysqli_query($con,$query);
		while($row1 = mysqli_fetch_array($rs)) {
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
			echo "<tr>
					<td colspan='7'><button class='btn btn-success btn-block glyphicon glyphicon-plus' onclick=window.location='addpizzaform.php'></button></td>
				</tr>";
	}
	else if(isset($_GET['topping'])){
		$topping=$_GET['topping'];
		if($topping != NULL){
			$query="SELECT * FROM topping WHERE nama LIKE '".$topping."%'";
		}
		else{
			$query="SELECT * FROM topping";
		}
		$rs=mysqli_query($con,$query);
		while($row2 = mysqli_fetch_array($rs)) {
			echo "<tr>
					<td class='pad' >".$row2['topping_id']."</td>
					<td class='pad' >".$row2['nama']."</td>
					<td class='pad' >".$row2['harga']."</td>
					<td class='pad' >".$row2['image']."</td>
					<td class='pad' >
						<button class='btn glyphicon glyphicon-pencil btn-warning' data-toggle='modal' data-target='#myModalTopping' onclick='modalToppingFunction(".$row2['topping_id'].")'></button>
						<button onclick=deleteToppingFunction(".$row2['topping_id'].")' class='btn glyphicon glyphicon-remove btn-danger'></button>
					</td>
				</tr>";
		}
			echo "<tr>
					<td colspan='6'><button class='btn btn-success btn-block glyphicon glyphicon-plus' onclick=window.location='addtoppingform.php'></button></td>
				</tr>";
	}
	else if(isset($_GET['other'])){
		$other=$_GET['other'];
		if($other != NULL){
			$query="SELECT * FROM other WHERE nama LIKE '".$other."%' OR description LIKE '%".$other."%' OR category LIKE '".$other."%'";
		}
		else{
			$query="SELECT * FROM other";
		}
		$rs=mysqli_query($con,$query);
		while($row3 = mysqli_fetch_array($rs)) {
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
		}
			echo "<tr>
					<td colspan='7'><button class='btn btn-success btn-block glyphicon glyphicon-plus' onclick=window.location='addotherform.php'></button></td>
				</tr>";
	}
?>