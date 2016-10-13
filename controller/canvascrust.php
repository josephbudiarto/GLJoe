<?php session_start();
	$_SESSION['canvas'] = $_GET['value'];
	include "../include/connect_db.php";

	$query= mysqli_query($con,"SELECT * FROM topping WHERE type='crust'");
        while($rowcanvascrust = mysqli_fetch_array($query)){ ?>
          <button type="button" id="topping-<?php echo $rowcanvascrust[0];?>" onclick=toppingFunction(<?php echo $rowcanvascrust[0];?>,'<?php echo $_SESSION["user_id"];?>','<?php echo $_SESSION["canvas"]?>')>
            <span id="sauce" class="glyphicon glyphicon-remove" aria-hidden="true"></span>
            <?php echo $rowcanvascrust[1];?>
          </button>
      <?php }
?>