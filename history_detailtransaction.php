<?php
include("include/header.php");
include('include/navbar.php');
include('include/connect_db.php');
$id=$_GET['id'];
$query="SELECT * FROM detail WHERE transaksi_id=$id";
$querydate=mysqli_query($con,"SELECT tanggal FROM transaksi WHERE transaksi_id=$id");
$rs1=mysqli_query($con,$query);
 $date=$_GET['date'];
?>
<!DOCTYPE html>
<head>
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	</head>
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
        <h3 class="sty"><strong>Detail Transaction History</strong></h3>
        <h4 class="sty"><strong><?php echo $date;?></strong></h4>
    </div>
    <br>

    <table class="table table-hover">
        <thead>
            <tr>
                <th width=5%># </th>
                <th width="20%">ITEM</th>
                <th width="15%">QUANTITY</th>
                <th width="5%">DESCRIPTION</th>
                <th width="5%">STATUS</th>
            </tr>
        </thead>
        <tbody id="table-result-other">
            <?php 

            $c=1;
            while($row=mysqli_fetch_array($rs1)){?>
                <tr>
                    <td class='pad'><?php echo $c; $c++;?> </td>
                    <td class='pad'><?php echo $row['item'];?></td>
                    
                    <td class='pad'><?php echo $row['quantity'];?></td>
                    <td class='pad'><?php echo $row['description'];?></td>
                    <td>
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