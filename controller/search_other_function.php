<?php include("../include/connect_db.php");
	
	$key="";
	if(isset($_GET['key'])){
		$key = $_GET['key'];
		if($key==NULL){
			$query="SELECT t.transaksi_id as transaksi_id, t.new_alamat as new_alamat, t.new_telepon as new_telepon, t.member_id as member_id, m.name as name, t.tanggal as tanggal, t.total as total FROM transaksi t JOIN member m ON(t.member_id=m.member_id) WHERE t.status_acc=1";
		}
		else{
			$query="SELECT t.transaksi_id as transaksi_id, t.new_alamat as new_alamat, t.new_telepon as new_telepon, t.member_id as member_id, m.name as name, t.tanggal as tanggal, t.total as total FROM transaksi t JOIN member m ON(t.member_id=m.member_id) WHERE t.status_acc=1 AND (t.new_alamat LIKE '".$key."%' OR t.new_telepon LIKE '".$key."%' OR m.name LIKE '".$key."%' OR t.tanggal LIKE '".$key."%')";
		}
		
		$rs=mysqli_query($con,$query);

		while($row=mysqli_fetch_assoc($rs)){?>
			<tr>
				<td class='pad'><?php echo $row['name'];?></td>
				<td class='pad'><?php echo $row['new_alamat'];?></td>
				<td class='pad'><?php echo $row['new_telepon'];?></td>
				<td class='pad'><?php echo $row['total'];?></td>
				<td class='pad'><?php echo $row['tanggal'];?></td>
			</tr>
		<?php }
	}?>