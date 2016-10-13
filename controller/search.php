<?php include("../include/connect_db.php");
	
	$key="";
	if(isset($_GET['key'])){
		$key = $_GET['key'];
		if($key==NULL){
			$query="SELECT * FROM member";
		}
		else{
			$query="SELECT * FROM member WHERE username LIKE '".$key."%' OR name LIKE '".$key."%' OR email LIKE '".$key."%' OR no_telp LIKE '".$key."%' OR alamat LIKE '".$key."%'";	
		}
		
		$rs=mysqli_query($con,$query);

		while($row = mysqli_fetch_array($rs)) {
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
		}
	}
?>