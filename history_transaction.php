<?php 
include('include/header.php');
include('include/navbar.php');
include('include/connect_db.php');

$query="SELECT t.transaksi_id as transaksi_id,t.new_alamat as new_alamat, t.new_telepon as new_telepon, t.status_acc as status_acc,t.member_id as member_id, m.name as name, t.tanggal as tanggal, t.total as total FROM transaksi t JOIN member m ON(t.member_id=m.member_id) where m.member_id='".$_SESSION['user_id']."' order by t.status_acc asc";

$rs1=mysqli_query($con,$query);

?>
<!DOCTYPE html>
<head>
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- <script src="js/jquery.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script> -->
</head>
<?php

;?>

<style>
	.navside{
		position: absolute;
		top: 140px;
		
	}
	.sty
	{
		display: inline-block;
		border-bottom: solid 5px #38a7bb;
		line-height: 1.1;
		margin-bottom: 0;
		padding-bottom: 10px;
		vertical-align: middle;
		text-transform: uppercase;
		letter-spacing: 0.06em;
	}
</style>
<body class="relative">
    <br><br><Br><br><br>
    <div class="col-md-offset-2 col-md-3" >
       <!-- copy -->

       <div class="heading">
        <h3 class="sty"><strong>Transaction History</strong></h3>

    </div>
    <br>

    <table class="table table-hover">
        <thead>
            <tr>
                <th width=5%># </th>
                <th width="20%">TANGGAL</th>
                <th width="15%">HARGA</th>
                <th width="5%">STATUS</th>
                <!-- <th width="5%">ACTION</th> -->
            </tr>
        </thead>
        <tbody id="table-result-other">
            <?php 
            $c=1;
            while($row=mysqli_fetch_array($rs1)){?>
                <tr>
                    <td class='pad' onclick=window.location='history_detailtransaction.php?id=<?php echo $row[0]?>'><?php echo $c; $c++;?> </td>
                    <td class='pad' onclick=window.location='history_detailtransaction.php?id=<?php echo $row[0]?>'><?php echo $row['tanggal'];?></td>
                    
                    <td class='pad' onclick=window.location='history_detailtransaction.php?id=<?php echo $row[0]?>'><?php echo $row['total'];?></td>
                    
                    <td onclick=window.location='history_detailtransaction.php?id=<?php echo $row[0]?>'>
                    <?php 
                    if($row['status_acc'] == 1)
                    {
                        echo '<i class="fa fa-check"></i>';
                    }
                    else
                    {
                        echo '<i class="fa fa-minus"></i>';
                    }
                    ?></td>
                    <!--  -->
                </tr>
                <?php }?>
            </tbody>
        </table>


        <!-- -->
    </div>
    <div class="col-md-offset-4 col-md-2">
       <br>
       <h4 class="sty" ><strong>Customer Section </strong></h4>
       <br><br>

       <ul class="nav nav-pills nav-stacked" >
         <li class="" ><a href="user.php" style="color:black"><i class="fa fa-user"></i> Personal Information</a></li>
         <li class="active"><a href="history_transaction.php" style="color:white"><i class="fa fa-tag"></i> Transaction History </a></li>
         <li class=""><a href="changepassword.php" style="color:black"><i class="fa fa-lock"></i> Change Password</a></li>
         <li class=""><a href="logout.php" style="color:black"><i class="fa fa-sign-out"></i> Log-out</a></li>
     </ul>

 </div>

</body>
</html>