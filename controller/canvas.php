<?php session_start();
	$_SESSION['canvas'] = $_GET['value'];
	$button = $_GET['button'];
	include "../include/connect_db.php";

		$query1="SELECT * FROM size";
		$rs1=mysqli_query($con,$query1);
		$query2="SELECT * FROM topping where type='crust'";
		$rs2=mysqli_query($con,$query2);
		$query3="SELECT * FROM topping where type='sauce'";
		$rs3=mysqli_query($con,$query3);
		$query4="SELECT * FROM topping where type='topping'";
	 	$rs4=mysqli_query($con,$query4);
	 	$userid = $_SESSION['user_id'];
?>

<fieldset>
  <legend><strong>Choose the toppings</strong></legend>
	<!--SIZE-->
	<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true" >
		<div class="panel panel-default">
			  <div class="panel-heading" role="tab" id="headingzero">
			    <h4 class="panel-title">
			      <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapsezero" aria-expanded="true" aria-controls="collapsezero">
			        <strong>Size</strong>
			      </a>
			    </h4>
			  </div>
			  <div id="collapsezero" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingzero">
			    <div class="panel-body">
			      <div class="btn-group " data-toggle="buttons">
			      <?php 
			          while($row1 = mysqli_fetch_array($rs1)){ ?>
			          <button type="button" name="size-<?php echo $row1[0];?>" id="size-<?php echo $row1[0];?>" class="btn btn-warning active btn-sm" onclick='valueFunction("<?php echo $row1[0];?>");'><?php echo $row1[0]; ?></button>
			          <?php }?>
			          <div id="hasilsize"></div>
			      </div>
			    </div>
			  </div>
		</div>
		<div class="panel panel-default">
				<div class="panel-heading" role="tab" id="headingTwo">
				  <h4 class="panel-title">
				    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
				      <strong>Crust</strong>
				    </a>
				  </h4>
				 </div>
		  <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
		    <div class="panel-body" id="top-crust">
		    <?php 
		      while($row2 = mysqli_fetch_array($rs2)){ ?>
		        <button type="button" id="crust-<?php echo $row2[0];?>" onclick=toppingFunction(<?php echo $row2[0];?>,'<?php echo $userid;?>','<?php echo $_SESSION["canvas"];?>')>
		          <?php echo $row2[1];?>
		        </button>
		    <?php }?>
		    </div>
		  </div>
	  </div>
	  <div class="panel panel-default">
	    <div class="panel-heading" role="tab" id="headingThree">
	      <h4 class="panel-title">
	        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
	          <strong>Sauce</strong>
	        </a>
	      </h4>
	    </div>
	  <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
	    <div class="panel-body" id="top-sauce">
	      <?php 
	      while($row3 = mysqli_fetch_array($rs3)){ ?>
	        <button type="button" id="sauce-<?php echo $row3[0]; ?>" onclick=toppingFunction(<?php echo $row3[0];?>,'<?php echo $userid;?>','<?php echo $_SESSION["canvas"];?>')>
	          <?php echo $row3[1];?>
	        </button>
	      <?php }?>
	    </div>
	  </div>
	</div>

	  <!-- toppping-->
	  <div class="panel panel-default">
	  <div class="panel-heading" role="tab" id="headingOne">
	    <h4 class="panel-title">
	      <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-control="collapseOne" >
	        <strong>Topping</strong>
	      </a>
	    </h4>
	  </div>
	  <div id="collapseOne" class="panel-collapse collapse " role="tabpanel" aria-labelledby="headingOne">
	    <div class="panel-body" id="top-topping">
	      <?php 
	        while($row4 = mysqli_fetch_array($rs4)){ ?>
	          <button type="button" id="topping-<?php echo $row4[0];?>" onclick=toppingFunction(<?php echo $row4[0];?>,'<?php echo $userid;?>','<?php echo $_SESSION["canvas"];?>')>
	            <?php echo $row4[1];?>
	          </button>
	      <?php }?>
	    </div>
	  </div>
	</div>
	  </div>
</fieldset>
<hr>
<button type="button" class="btn btn-large btn-block btn-primary" onclick=window.location="all_cusstom.php?i=<?php echo $button;?>"><h4>Done</h4></button>
