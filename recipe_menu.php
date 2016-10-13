<?php include('include/connect_db.php');
	$query="SELECT * FROM pizza";
	$rs=mysqli_query($con,$query);
?>
<!DOCTYPE html>
<html>
<head>
	<?php include('include/header.php');?>
	<title>Pizza Menu Recipes</title>
</head>
<body>
	<?php
		echo "<div class='container-fluid'><div class='row'>";
		while($row=mysqli_fetch_array($rs)){
			echo "
			  <div class='col-sm-8 col-md-3'>
			    <div class='thumbnail' id='thumbnail'>
			      <img src='images/".$row['image']."' alt='".$row['nama']."' style='width:100%;height:auto;'>
			      <div class='caption'>
			        <h3>".$row['nama']."</h3> <p><a href='' class='btn btn-warning' role='button'>Order now</a></p>
			        <div class='container-fluid'>
			        <p>".$row['description']."<br><h3>".$row['harga']."</h3></p></div>
			      </div>
			    </div>
			  </div>";
					}
		echo "</div></div>";
	?>
<script>
	function equalHeight(group) {    
    var tallest = 0;    
    group.each(function() {       
        var thisHeight = $(this).height();       
        if(thisHeight > tallest) {          
            tallest = thisHeight;       
        }    
    });    
    group.each(function() { $(this).height(tallest); });
} 

$(document).ready(function() {   
    equalHeight($(".thumbnail")); 
});
</script>
</body>
</html>