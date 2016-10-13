<?php session_start();
	include '../service.php';
	include '../include/connect_db.php';

	//METHOD POST
	$id=$_POST['id'];
	$alamat=$_POST['alamat'];
	$telepon=$_POST['telp'];
	$tanggal=$_POST['tanggal'];
	$credit=$_POST['credit'];
	$total=$_SESSION['total'];
	$expdate = date('Y-m-d',strtotime($_POST['exp-date']));
	$client->call("transfer",array("card_number" => $credit,"code" => $_POST['bank'], "expire" => $expdate, "account" => '83070123456789101101', "description" => "GLJoe", "balance" => $total));
	$query="INSERT INTO transaksi(member_id,new_alamat,new_telepon,tanggal,credit_card,total,status_acc) VALUES(".$id.",'".$alamat."','".$telepon."','".$tanggal."','".$credit."',".$total.",0)";

	//INSERT DB TRANSAKSI
	if($rs=mysqli_query($con,$query)){

		//AMBIL DARI TRANSAKSI
		$rsid = mysqli_query($con,"SELECT * FROM transaksi WHERE member_id=".$id." AND new_alamat='".$alamat."' AND new_telepon='".$telepon."'  AND tanggal='".$tanggal."' AND credit_card='".$credit."' AND total=".$total." AND status_acc=0");
		$rowid=mysqli_fetch_array($rsid);

		//INSERT KE DETAIL TRANSAKSI
		for($j=1;$j<=$_SESSION['counter'];$j++){
			if(isset($_SESSION['order'][$j]['size'])){
				$string = $_SESSION['order'][$j]['size'];
			}
			else{
				$string='';
			}
			$string.='# ';
			if($_SESSION['order'][$j]['nama'] == 'Pizza Custom'){
				$query_dummy_a=mysqli_query($con,"SELECT t.nama,d.type FROM dummy d JOIN topping t ON t.topping_id=d.topping_id WHERE d.type='A' AND member_id=".$_SESSION['user_id'] );
				$query_dummy_b=mysqli_query($con,"SELECT t.nama,d.type FROM dummy d JOIN topping t ON t.topping_id=d.topping_id WHERE d.type='B' AND member_id=".$_SESSION['user_id'] );
				$query_dummy_c=mysqli_query($con,"SELECT t.nama,d.type FROM dummy d JOIN topping t ON t.topping_id=d.topping_id WHERE d.type='C' AND member_id=".$_SESSION['user_id'] );
				$query_dummy_d=mysqli_query($con,"SELECT t.nama,d.type FROM dummy d JOIN topping t ON t.topping_id=d.topping_id WHERE d.type='D' AND member_id=".$_SESSION['user_id'] );
				//A
				$string.='A[';
				while($row=mysqli_fetch_array($query_dummy_a))
				{
					$string.=$row[0];
					$string.=' ';
				}
				$string.='] ';

				//B
				$string.='B[';
				while($row=mysqli_fetch_array($query_dummy_b))
				{
					$string.=$row[0];
					$string.=' ';
				}
				$string.='] ';

				//C
				$string.='C[';
				while($row=mysqli_fetch_array($query_dummy_c))
				{
					$string.=$row[0];
					$string.=' ';
				}
				$string.='] ';

				//D
				$string.='D[';
				while($row=mysqli_fetch_array($query_dummy_d))
				{
					$string.=$row[0];
					$string.=' ';
				}
				$string.='] ';

				echo $string;
			}
			if($_SESSION['order'][$j]['quantity'] <> 0){
				$detailquery="INSERT INTO detail VALUES(null,".$rowid['transaksi_id'].",'".$_SESSION['order'][$j]['nama']."',".$_SESSION['order'][$j]['quantity'].",'".$string."',0)";
				$detailrs=mysqli_query($con,$detailquery);
			}
		}
		
		echo 	"<link rel='stylesheet' href='../css/bootstrap.min.css'>
				<div class='alert alert-success'>
  					<strong>Success!</strong> Transaction Ordered.
				</div>";

		$dummy = mysqli_query($con, "DELETE FROM dummy WHERE member_id=".$id);

		//SESSION UNSET
		unset($_SESSION['total']);
		unset($_SESSION['order']);
		unset($_SESSION['counter']);
		
		header( "refresh:5;url=../index.php" );
	
	}
	else{ //GAGAL
		echo 	"<link rel='stylesheet' href='../css/bootstrap.min.css'>
				<div class='alert alert-danger'>
  					<strong>Error!</strong> Oops sorry there is something wrong with the order.<br/> You will be redirected to the homepage in 5 seconds.
				</div>";
		header( "refresh:5;url=../index.php" );
	}
?>