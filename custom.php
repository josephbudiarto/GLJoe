<?php $button=$_GET['i'];include "include/connect_db.php";$query=mysqli_query($con, "SELECT * FROM topping");?>
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css"/>
  <script src="js/jquery.js"></script>
  <script type="text/javascript" src="js/bootstrap.js"></script>
  <title>Custom Pizza</title>
</head>
<body>
<script>
  function priceFunction(i){
      var harga = document.getElementById('price'+i).innerHTML;
      var qty = document.getElementById('quantity'+i).innerHTML;
      document.getElementById('subtotal'+i).innerHTML = parseInt(harga) * parseInt(qty);
  }
    function quantityFunctionMinus(i){
      if(window.XMLHttpRequest){
            xmlhttp = new XMLHttpRequest();
        }
        xmlhttp.onreadystatechange = function(){
            if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
                document.getElementById('quantity'+i).innerHTML = xmlhttp.responseText;
                priceFunction(i);
            }
        };
        xmlhttp.open('GET','controller/quantity.php?quantity='+i,true);
        xmlhttp.send();
    }
    function quantityFunctionPlus(i){
      if(window.XMLHttpRequest){
            xmlhttp = new XMLHttpRequest();
        }
        xmlhttp.onreadystatechange = function(){
            if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
                document.getElementById('quantity'+i).innerHTML = xmlhttp.responseText;
                priceFunction(i);
            }
        };
        xmlhttp.open('GET','controller/quantityplus.php?quantity='+i,true);
        xmlhttp.send();
    }
    function cancelFunction(){
      var r = confirm('Are you sure you want to cancel ?');
      if(r == true){
      window.location='controller/cancel.php'
      }
    }
  function checkoutFunction(){
    if(window.XMLHttpRequest){
            xmlhttp = new XMLHttpRequest();
        }
        xmlhttp.onreadystatechange = function(){
            if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
                document.getElementById('hasil').innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open('GET','controller/load_order.php',true);
        xmlhttp.send();
  }
</script>

<script type="text/javascript">
  var dir='A';
  <?php
  $dir1 = array();
  $dir2 = array();
  $dir3 = array();
  $dir4 = array();
  ?>
  var dir1 = new Array();
  var dir2 = new Array();
  var dir3 = new Array();
  var dir4 = new Array();

  var imgar = new Array();
  <?php while($row=mysqli_fetch_assoc($query)){
          for($i=1;$i<=4;$i++){?>
            var <?php echo $row['nama'].$i;?> = 0;
            var img<?php echo $i?> = loadImage('', draw);
            imgar.push(img<?php echo $i?>);
            dir<?php echo $i;?>.push('<?php echo $row['nama'].$i;?>');
            <?php if($i==1) array_push($dir1, $row['nama'].$i);
                  else if($i==2) array_push($dir2,$row['nama'].$i);
                  else if($i==3) array_push($dir3,$row['nama'].$i);
                  else if($i==4) array_push($dir4,$row['nama'].$i);?>
  <?php   }
        }?>
          //alert('<?php echo implode(" ",$dir1);?>' + dir1);

    function loadImage(src, onload) {
      var img = new Image();

      img.onload = onload;
      img.src = src;

      return img;
    }
    var imagesLoaded = 0;
    function draw() {
      var myvar = "<?php echo $button;?>";
        if(myvar == '1'){
          //canvas1
          if(dir == 'A'){
            ctx1.drawImage(img, 0, 0);
            for(var i=1;i<=4;i++){
              if(dir1[i]==1 && i==1){
                ctx1.drawImage(imgar[i], 40, 50);
              }
              if(dir1[i]==1 && i !=1){
                ctx1.drawImage(imgar[i], 0, 0);
              }
            }
          }
        }
        if(myvar == '2'){
          //canvas1
          if(dir == 'A'){
              ctx1.drawImage(img, 0, 0,img.width/2,img.height,0,0,img.width/2,img.height);
              for(var i=1;i<=4;i++){
                if(dir1[i] == 1 && i==1){
                  ctx1.drawImage(imgar[i], 0, 0,imgar[i].width/2,imgar[i].height,40,60,imgar[i].width/2,imgar[i].height );
                }
                if(dir1[i] == 1 !=1){
                  ctx1.drawImage(imgar[i], 0, 0,imgar[i].width/2,imgar[i].height,0,0,imgar[i].width/2,imgar[i].height );
                }
              }
          }
            //canvas2
            if(dir == 'B'){
              ctx2.drawImage(img, img.width/2,0,img.width/2,img.height,img.width/2,0,img.width/2,img.height );
              for(var i=1;i<=4;i++){
                if(dir2[i] == 1 && i==1){
                  ctx2.drawImage(imgar[i], imgar[i].width/2,0,imgar[i].width/2,imgar[i].height,img.width/2,50,img1.width/2,img1.height );
                }
                if(dir2[i] == 1 !=1){
                  ctx1.drawImage(imgar[i], 0, 0,imgar[i].width/2,imgar[i].height,0,0,imgar[i].width/2,imgar[i].height );
                }
              }
              if(tomato2==1){
                ctx2.drawImage(img1, img1.width/2,0,img1.width/2,img1.height,img.width/2,50,img1.width/2,img1.height );
              }
              if(saussage2==1){
                ctx2.drawImage(img2, img2.width/2,0,img2.width/2,img2.height,img.width/2,0,img2.width/2,img2.height );
              }
              if(bacil2 == 1){
               ctx2.drawImage(img3, img3.width/2,0,img3.width/2,img3.height,img.width/2,0,img3.width/2,img3.height ); 
              }
            }
          }
               
        if(myvar == '4'){
          //canvas1
          //context.drawImage(imageObj, sourceX, sourceY, sourceWidth, sourceHeight, destX, destY, destWidth, destHeight);
          if(dir == 'A'){
          ctx1.drawImage(img, 0, 0,img.width/2,img.height/2,0,0,img.width/2,img.height/2);
          if(tomA==1)
          {ctx1.drawImage(img1, 0, 0,img1.width/2,img1.height/2,40,50,img1.width/2,img1.height/2 );}
          if(sosisA==1)
          {ctx1.drawImage(img2, 0, 0,img2.width/2,img2.height/2,0,0,img2.width/2,img2.height/2 );}
          if(paprikaA==1)
          {ctx1.drawImage(img3, 0, 0,img3.width/2,img3.height/2,0,0,img3.width/2,img3.height/2 );}
          }
          //canvas2
          if(dir == 'B'){
          ctx2.drawImage(img, img.width/2,0,img.width/2,img.height/2,img.width/2,0,img.width/2,img.height/2 );
          if(tomB==1){ctx2.drawImage(img1, img1.width/2,0,img1.width/2,img1.height/2,img.width/2,50,img1.width/2,img1.height/2 );}
          if(sosisB==1){ctx2.drawImage(img2, img2.width/2,0,img2.width/2,img2.height/2,img.width/2,0,img2.width/2,img2.height/2 );}
          if(paprikaB==1){ctx2.drawImage(img3, img3.width/2,0,img3.width/2,img3.height/2,img.width/2,0,img3.width/2,img3.height/2 );}
          }
          //canvas3
          //context.drawImage(imageObj, sourceX, sourceY, sourceWidth, sourceHeight, destX, destY, destWidth, destHeight);
          if(dir == 'C'){
          ctx3.drawImage(img, 0,img.height/2,img.width/2,img.height/2,0,img.height/2,img.width/2,img.height/2);
          if(tomC==1){ctx3.drawImage(img1, 0,img1.height/2,img1.width/2,img1.height/2,50,img1.height/2+60,img1.width/2,img1.height/2);}
          if(sosisC==1){ctx3.drawImage(img2, 0,img2.height/2,img2.width/2,img2.height/2,0,img2.height/2,img2.width/2,img2.height/2);}
          if(paprikaC==1){ctx3.drawImage(img3, 0,img3.height/2,img3.width/2,img3.height/2,0,img3.height/2,img3.width/2,img3.height/2);}
          }
          //canvas4
          if(dir == 'D'){
          ctx4.drawImage(img, img.width/2,img.height/2,img.width/2,img.height/2,img.width/2,img.height/2,img.width/2,img.height/2 );
          if(tomD==1)
          {
          ctx4.drawImage(img1, img1.width/2,img.height/2,img1.width/2,img1.height/2,img.width/2,img.height/2+50,img1.width/2,img1.height/2 );
          }
          if(sosisD==1)
          {
          ctx4.drawImage(img2, img2.width/2,img.height/2,img2.width/2,img2.height/2,img.width/2,img.height/2,img2.width/2,img2.height/2 );
          }
          if(paprikaD==1)
          {
          ctx4.drawImage(img3, img3.width/2,img.height/2,img3.width/2,img3.height/2,img.width/2,img.height/2,img3.width/2,img3.height/2 );
          }
          }
        }
    }
  /*var tomA,tomB,tomC,tomD;
  var sosisA,sosisB,sosisC,sosisD;
  var paprikaA,paprikaB,paprikaC,paprikaD;
  var jamurA,jamurB,jamurC,jamurD;*/
  var sauceA,sauceB,sauceC,sauceD;
  var crust;
  /*tomA =0;
  tomB =0;
  tomC =0;
  tomD =0;
  sosisA=0;
  sosisB=0;
  sosisC=0;
  sosisD=0;
  paprikaA=0;
  paprikaB=0;
  paprikaC=0;
  paprikaD=0;
  jamurA=0;
  jamurB=0;
  jamurC=0;
  jamurD=0;*/
  crust=0;
  sauceA=0;
  sauceB=0;
  sauceC=0;
  sauceD=0;
</script>
<style>
  .relative{
    background: url("images/or.jpg") no-repeat;
    background-size: 100% 100%;
    background-position: center top;
    background-attachment: fixed;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    margin:20px 200px 40px 200px;
  }
  .wrapper {
      position: fixed;
      bottom:10px;
      right:10px;
      background-color: orange;
      background: url("images/dollars.png") no-repeat;
      background-size: 100% 100%;
      border-width: 10px;
  }
</style>
  <?php include('include/navbar.php');
    /*if(isset($_SESSION['custom']['status'])){}
    else{
      $_SESSION['custom']['status']="false";
    }*/
    $_SESSION['topping-counter']=0;
  ?>

<div class="container-fluid" style="padding-top: 110px;">
<div class="well col-md-6" >
<div class="btn-group btn-group-justified">
<?php if($button == 1){?>
  <a href="#" class="btn btn-default" onclick="call1(1);">A</a>
<?php }else if($button == 2){
  ?>
  <a href="#" class="btn btn-default" onclick="call1(2);">A</a>
  <a href="#" class="btn btn-default" onclick="call2(2);">B</a>
<?php }else{?>
  <a href="#" class="btn btn-default" onclick="call1(4);">A</a>
  <a href="#" class="btn btn-default" onclick="call2(4);">B</a>
  <a href="#" class="btn btn-default" onclick="call3(4);">C</a>
  <a href="#" class="btn btn-default" onclick="call4(4);">D</a>
<?php }?>
</div>
<canvas width="720" height="620" id="canvas1" align="center" style="padding-top:20px; display: block;"></canvas>
<canvas width="720" height="620" id="canvas2" align="center" style="padding-top:20px; display: none;"></canvas>
<canvas width="720" height="620" id="canvas3" align="center" style="padding-top:20px; display: none;"></canvas>
<canvas width="720" height="620" id="canvas4" align="center" style="padding-top:20px; display: none;"></canvas>
</div>
<div class="col-md-1"> </div>
<div class="well col-md-5" ><form >
  <fieldset>
  <legend><strong>Choose the topings</strong></legend>
<!--topping-->
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
      <button type="button" name="option" id="option" class="btn btn-warning active btn-sm" onclick="valueFunction(1)">S</button>
      <button type="button" name="option" id="option" class="btn btn-warning active btn-sm" onclick="valueFunction(2)">M</button>
      <button type="button" name="option" id="option" class="btn btn-warning active btn-sm" onclick="valueFunction(3)">L</button>
      <!--CHECK ONLY--><div id='hasilsize'></div>
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
    <div class="panel-body">
  <button type="button" id="sauce-button1" onclick="top1(1)"><span id="sauce" class="glyphicon glyphicon-remove" aria-hidden="true"></span>  Chessy</button>
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
    <div class="panel-body">
  <button type="button" id="sauce-button2" onclick="topsauce(1)"><span id="tomato1" class="glyphicon glyphicon-remove" aria-hidden="true"></span>  Chilli</button>

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

  <script>
    function toppingFunction(i){
      if(window.XMLHttpRequest){
            xmlhttp = new XMLHttpRequest();
        }
        xmlhttp.onreadystatechange = function(){
            if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
                document.getElementById('hasiltopping').innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open('GET','controller/custom_topping.php?topping='+i,true);
        xmlhttp.send();
    }
  </script>

  <div id="collapseOne" class="panel-collapse collapse " role="tabpanel" aria-labelledby="headingOne">
    <div class="panel-body">
    
    
      <button type="button" id="tomato-button" onclick="toppingFunction('tomato');top1(1);">
        <span id="tomato" class="glyphicon glyphicon-remove" aria-hidden="true"></span>  Tomato</button>
      <button type="button" id="saussage-button" onclick="toppingFunction('saussage');top2(1);">
        <span id="saussage" class="glyphicon glyphicon-remove" aria-hidden="true"></span>  Saussage</button>
      <button type="button" id="bacil-button" onclick="toppingFunction('bacil');top3(1);">
        <span id="bacil" class="glyphicon glyphicon-remove" aria-hidden="true"></span>  Bacil</button>
    

      <!--ONLY FOR TESTING--><div id="hasiltopping">ABC</div>
    </div>
  </div>

  </div>
  <!-- end topping -->
</div>

<!--topping-->
  </fieldset>
  <button type = "button" onclick="order()">order</button>
  </form>
  </div>
</div>
	

	<div class="wrapper" align="center"><br />
    <a href='#' data-toggle="modal" data-target="#myModal" onclick="checkoutFunction()"><img src='images/blank.png' width="70px"height="50px" caption="check"><br>
    <h4><span class="label label-warning" id="badge-order"><?php echo $_SESSION['counter'];?></span></h4>
    
    </a>
  </div>

<!--MODAL-->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="margin:0px;">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <form action="controller/cek_order_submit.php" method="post">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">RECEIPT</h4>
            </div>
            <div class="modal-body" id='modal-body'>
                                <div class='container'>
                <div class='col-md-6'>
                  <table class='table'>
                    <thead>
                      <th>#</th>
                      <th>Pizza</th>
                      <th>Size</th>
                      <th>Price</th>
                      <th>Quantity</th>
                      <th>Sub</th>
                    </thead>
                    <tbody id="hasil"></tbody>
                    <tbody id="subtotal"></tbody>
                  </table>
                </div>
              </div>
            </div>
			<div class="modal-footer">
                <button type="reset" class="btn btn-danger" onclick="cancelFunction()"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Cancel</button>
					<button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Order</button>
            </div>
			</form>
		</div>
	</div>
</div>



<script>

  var canvas1 = document.getElementById("canvas1");
  var ctx1 = canvas1.getContext("2d");

  var canvas2 = document.getElementById("canvas2");
  var ctx2 = canvas2.getContext("2d");
 

  var canvas3 = document.getElementById("canvas3");
  var ctx3 = canvas3.getContext("2d");
 
  var canvas4 = document.getElementById("canvas4");
  var ctx4 = canvas4.getContext("2d");
 
  var img = loadImage('images/plain.png', draw);

function top1(a){
	
	if(dir == 'A' && tomato1 == 0){
		img1 = loadImage('images/empty.png', draw);
	  document.getElementById('tomato').removeAttribute('class');
    document.getElementById('tomato').setAttribute("class", "glyphicon glyphicon-remove"); 
    document.getElementById('tomato-button').removeAttribute('class');
}
  if(dir == 'A' && tomato1 == 1){
  	img1 = loadImage('images/top1.png', draw);
    document.getElementById('tomato').removeAttribute('class');
    document.getElementById('tomato').setAttribute("class", "glyphicon glyphicon-check"); 
    document.getElementById('tomato-button').removeAttribute('class');
  }
  if(dir == 'B' && tomato2 == 0){  
  	img1 = loadImage('images/empty.png', draw);
    document.getElementById('tomato').removeAttribute('class');
    document.getElementById('tomato').setAttribute("class", "glyphicon glyphicon-remove"); 
    document.getElementById('tomato-button').removeAttribute('class');
  }
  if(dir == 'B' && tomato2 == 1){
  	img1 = loadImage('images/top1.png', draw);
    document.getElementById('tomato').removeAttribute('class');
    document.getElementById('tomato').setAttribute("class", "glyphicon glyphicon-check"); 
    document.getElementById('tomato-button').removeAttribute('class');
  }
  if(dir == 'C' && tomato3 == 0){
  	img1 = loadImage('images/empty.png', draw);
    document.getElementById('tomato').removeAttribute('class');
    document.getElementById('tomato').setAttribute("class", "glyphicon glyphicon-remove"); 
    document.getElementById('tomato-button').removeAttribute('class');
  }
  if(dir == 'C' && tomato3 == 1){
  	img1 = loadImage('images/top1.png', draw);
    document.getElementById('tomato').removeAttribute('class');
    document.getElementById('tomato').setAttribute("class", "glyphicon glyphicon-check"); 
    document.getElementById('tomato-button').removeAttribute('class');
  }
  if(dir == 'D' && tomato4 == 0){
  	img1 = loadImage('images/empty.png', draw);
    document.getElementById('tomato').removeAttribute('class');
    document.getElementById('tomato').setAttribute("class", "glyphicon glyphicon-remove"); 
    document.getElementById('tomato-button').removeAttribute('class');
  }
  if(dir == 'D' && tomato4 == 1){
  	img1 = loadImage('images/top1.png', draw);
    document.getElementById('tomato').removeAttribute('class');
    document.getElementById('tomato').setAttribute("class", "glyphicon glyphicon-check"); 
    document.getElementById('tomato-button').removeAttribute('class');
  }
  if(a == 1)
  {
	  if(document.getElementById('tomato').getAttribute('class') == "glyphicon glyphicon-check"){
	  img1 = loadImage('images/empty.png', draw);
	  document.getElementById('tomato').removeAttribute('class');
	    document.getElementById('tomato').setAttribute("class", "glyphicon glyphicon-remove"); 
	    document.getElementById('tomato-button').removeAttribute('class');
	  if(dir == 'A'){tomato1 = 0;}
	  if(dir == 'B'){tomato2 = 0;}
	  if(dir == 'C'){tomato3 = 0;}
	  if(dir == 'D'){tomato4 = 0;}
	  //document.getElementById('tomato-button').setAttribute("class", "btn btn-danger");
	  }
	  else{
	  img1 = loadImage('images/top1.png', draw);
	  document.getElementById('tomato').removeAttribute('class');
	    document.getElementById('tomato').setAttribute("class", "glyphicon glyphicon-check"); 
	    document.getElementById('tomato-button').removeAttribute('class');
	  if(dir == 'A'){tomato1 = 1;}
	  if(dir == 'B'){tomato2 = 1;}
	  if(dir == 'C'){tomato3 = 1;}
	  if(dir == 'D'){tomato4 = 1;}
	  
	  //document.getElementById('tomato-button').setAttribute("class", "btn btn-success");
  }
}
}

function top2(a){
	//	alert(a);
  if(dir == 'A' && saussage1 == 0){
  	img2 = loadImage('images/empty.png', draw);
    document.getElementById('saussage').removeAttribute('class');
    document.getElementById('saussage').setAttribute("class", "glyphicon glyphicon-remove"); 
    document.getElementById('saussage-button').removeAttribute('class');
  }
  if(dir == 'A' && saussage1 == 1){
  	img2 = loadImage('images/sosis.png', draw);
    document.getElementById('saussage').removeAttribute('class');
    document.getElementById('saussage').setAttribute("class", "glyphicon glyphicon-check"); 
    document.getElementById('saussage-button').removeAttribute('class');
  }
  if(dir == 'B' && saussage2 == 0){
  	img2 = loadImage('images/empty.png', draw);
    document.getElementById('saussage').removeAttribute('class');
    document.getElementById('saussage').setAttribute("class", "glyphicon glyphicon-remove"); 
    document.getElementById('saussage-button').removeAttribute('class');
  }
  if(dir == 'B' && saussage2 == 1){
  	img2 = loadImage('images/sosis.png', draw);
    document.getElementById('saussage').removeAttribute('class');
    document.getElementById('saussage').setAttribute("class", "glyphicon glyphicon-check"); 
    document.getElementById('saussage-button').removeAttribute('class');
  }
  if(dir == 'C' && saussage3 == 0){
  	img2 = loadImage('images/empty.png', draw);
    document.getElementById('saussage').removeAttribute('class');
    document.getElementById('saussage').setAttribute("class", "glyphicon glyphicon-remove"); 
    document.getElementById('saussage-button').removeAttribute('class');
  }
  if(dir == 'C' && saussage3 == 1){
  	img2 = loadImage('images/sosis.png', draw);
    document.getElementById('saussage').removeAttribute('class');
    document.getElementById('saussage').setAttribute("class", "glyphicon glyphicon-check"); 
    document.getElementById('saussage-button').removeAttribute('class');
  }
  if(dir == 'D' && saussage4 == 0){
  	img2 = loadImage('images/empty.png', draw);
    document.getElementById('saussage').removeAttribute('class');
    document.getElementById('saussage').setAttribute("class", "glyphicon glyphicon-remove"); 
    document.getElementById('saussage-button').removeAttribute('class');
  }
  if(dir == 'D' && saussage4 == 1){
  	img2 = loadImage('images/sosis.png', draw);
    document.getElementById('saussage').removeAttribute('class');
    document.getElementById('saussage').setAttribute("class", "glyphicon glyphicon-check"); 
    document.getElementById('saussage-button').removeAttribute('class');
  }
  if(a==1){
  if(document.getElementById('saussage').getAttribute('class') == "glyphicon glyphicon-check"){
  img2 = loadImage('images/empty.png', draw);
  document.getElementById('saussage').removeAttribute('class');
  document.getElementById('saussage').setAttribute("class", "glyphicon glyphicon-remove");
  document.getElementById('saussage-button').removeAttribute('class');
  if(dir == 'A'){saussage1 = 0;}
  if(dir == 'B'){saussage2 = 0;}
  if(dir == 'C'){saussage3 = 0;}
  if(dir == 'D'){saussage4 = 0;}
  }
  else{
  img2 = loadImage('images/sosis.png', draw);
  document.getElementById('saussage').removeAttribute('class');
  document.getElementById('saussage').setAttribute("class", "glyphicon glyphicon-check");
  document.getElementById('saussage-button').removeAttribute('class');
  if(dir == 'A'){saussage1 = 1;}
  if(dir == 'B'){saussage2 = 1;}
  if(dir == 'C'){saussage3 = 1;}
  if(dir == 'D'){saussage4 = 1;}
  //document.getElementById('tomato-button').setAttribute("class", "btn btn-success");
  }
}
}
function top3(a){
	//alert(a);
	if(dir == 'A' && bacil1 == 0){
		img3 = loadImage('images/empty.png', draw);
    document.getElementById('bacil').removeAttribute('class');
  document.getElementById('bacil').setAttribute("class", "glyphicon glyphicon-remove");
  document.getElementById('bacil-button').removeAttribute('class');
  }
  if(dir == 'A' && paprikaA == 1){
  	img3 = loadImage('images/sayur.png', draw);
    document.getElementById('bacil').removeAttribute('class');
  document.getElementById('bacil').setAttribute("class", "glyphicon glyphicon-check");
  document.getElementById('bacil-button').removeAttribute('class');
  }
  if(dir == 'B' && paprikaB == 0){
  	img3 = loadImage('images/empty.png', draw);
  	document.getElementById('bacil').removeAttribute('class');
  document.getElementById('bacil').setAttribute("class", "glyphicon glyphicon-remove");
  document.getElementById('bacil-button').removeAttribute('class');
  }
  if(dir == 'B' && paprikaB == 1){
  	img3 = loadImage('images/sayur.png', draw);
    document.getElementById('bacil').removeAttribute('class');
  document.getElementById('bacil').setAttribute("class", "glyphicon glyphicon-check");
  document.getElementById('bacil-button').removeAttribute('class');
  }
  if(dir == 'C' && paprikaC == 0){
  	img3 = loadImage('images/empty.png', draw);
  	document.getElementById('bacil').removeAttribute('class');
  document.getElementById('bacil').setAttribute("class", "glyphicon glyphicon-remove");
  document.getElementById('bacil-button').removeAttribute('class');
  }
  if(dir == 'C' && paprikaC == 1){
  	img3 = loadImage('images/sayur.png', draw);
    document.getElementById('bacil').removeAttribute('class');
  document.getElementById('bacil').setAttribute("class", "glyphicon glyphicon-check");
  document.getElementById('bacil-button').removeAttribute('class');
  }
  if(dir == 'D' && paprikaD == 0){
  	img3 = loadImage('images/empty.png', draw);
  	document.getElementById('bacil').removeAttribute('class');
  document.getElementById('bacil').setAttribute("class", "glyphicon glyphicon-remove");
  document.getElementById('bacil-button').removeAttribute('class');
  }
  if(dir == 'D' && paprikaD == 1){
  	img3 = loadImage('images/sayur.png', draw);
    document.getElementById('bacil').removeAttribute('class');
  document.getElementById('bacil').setAttribute("class", "glyphicon glyphicon-check");
  document.getElementById('bacil-button').removeAttribute('class');
  }

if(a==1){
  if(document.getElementById('bacil').getAttribute('class') == "glyphicon glyphicon-check"){
  img3 = loadImage('images/empty.png', draw);
    document.getElementById('bacil').removeAttribute('class');
  document.getElementById('bacil').setAttribute("class", "glyphicon glyphicon-remove");
  document.getElementById('bacil-button').removeAttribute('class');
  
  if(dir == 'A'){paprikaA = 0;}
  if(dir == 'B'){paprikaB = 0;}
  if(dir == 'C'){paprikaC = 0;}
  if(dir == 'D'){paprikaD = 0;}
  //document.getElementById('tomato-button').setAttribute("class", "btn btn-danger");
  }
  else{
  	  document.getElementById('bacil').removeAttribute('class');
  document.getElementById('bacil').setAttribute("class", "glyphicon glyphicon-check");
  document.getElementById('bacil-button').removeAttribute('class');
  
  img3 = loadImage('images/sayur.png', draw);
  if(dir == 'A'){paprikaA = 1;}
  if(dir == 'B'){paprikaB = 1;}
  if(dir == 'C'){paprikaC = 1;}
  if(dir == 'D'){paprikaD = 1;}
  //document.getElementById('tomato-button').setAttribute("class", "btn btn-success");
  }
}
}


function call1(){
  dir="<?php echo 'A';?>";
<?php echo 'top1(0);top2(0);top3(0);'; ?>
  img = loadImage('images/plain.png', draw);
  document.getElementById('canvas1').style.display="block";
  document.getElementById('canvas2').style.display="none";
  document.getElementById('canvas3').style.display="none";
  document.getElementById('canvas4').style.display="none";
}
function call2(){
  dir="<?php echo 'B';?>";
<?php echo 'top1(0);top2(0);top3(0);'; ?>
  img = loadImage('images/plain.png', draw);
  document.getElementById('canvas1').style.display="none";
  document.getElementById('canvas2').style.display="block";
  document.getElementById('canvas3').style.display="none";
  document.getElementById('canvas4').style.display="none";
}
function call3(){
  dir="<?php echo 'C';?>";
<?php echo 'top1(0);top2(0);top3(0);'; ?>
  img = loadImage('images/plain.png', draw);
  document.getElementById('canvas1').style.display="none";
  document.getElementById('canvas2').style.display="none";
  document.getElementById('canvas3').style.display="block";
  document.getElementById('canvas4').style.display="none";
}
function call4(){
  dir="<?php echo 'D';?>";
<?php echo 'top1(0);top2(0);top3(0);'; ?>
  img = loadImage('images/plain.png', draw);
  document.getElementById('canvas1').style.display="none";
  document.getElementById('canvas2').style.display="none";
  document.getElementById('canvas3').style.display="none";
  document.getElementById('canvas4').style.display="block";
}

function order()
{
  /*if(window.XMLHttpRequest){
      xmlhttp = new XMLHttpRequest();
  }
  xmlhttp.onreadystatechange = function(){
      if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
          document.getElementById('badge-order').innerHTML = xmlhttp.responseText;
      }
  };
  xmlhttp.open('GET','controller/custom_order.php',true);
  xmlhttp.send();
  */
  var radios = document.getElementsByName('options');
  var ukuran;

  for (var i = 0, length = radios.length; i < length; i++){
    if (radios[i].checked) {
        ukuran = radios[i].value ;
        break;
    }
  }
  alert("size : " + ukuran + "\n\nDIR A\n tomato A : " + tomA + "\nsosis A : " + sosisA + "\npaprika A : " + paprikaA +
    "\n \n DIR B\n tomato B : " + tomB + "\nsosis B : " + sosisB + "\npaprika B : " + paprikaB +
    "\n\n DIR C\n tomato C : " + tomC + "\nsosis C : " + sosisC + "\npaprika C : " + paprikaC + 
    "\n\n DIR D\n tomato D : " + tomD + "\nsosis D : " + sosisD + "\npaprika D : " + paprikaD);
}
</script>
</body>
</html>