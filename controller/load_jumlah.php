<?php include("../include/connect_db.php");
	
	if(isset($_GET['i'])){
		$i = $_GET['i'];
	}
	$count=1;
	$query="SELECT * FROM member";
	$rs=mysqli_query($con,$query);
	$rscount=mysqli_query($con,"SELECT COUNT(*) FROM member");
	$rowcount=mysqli_fetch_array($rscount);

	while($row=mysqli_fetch_array($rs)){
		if($count <= $i && $row['member_id'] != NULL){
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
	}?>
	<tr>
		<td colspan="8">There are <?php echo $rowcount[0]-$count+1;?> more member.</td>
	</tr>