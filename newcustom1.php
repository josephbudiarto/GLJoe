<?php $button=$_GET['i'];
include("include/connect_db.php");
  $query1="SELECT * FROM size";
  $rs1=mysqli_query($con,$query1);
  $query2="SELECT * FROM topping where type='crust'";
  $rs2=mysqli_query($con,$query2);
  $query3="SELECT * FROM topping where type='sauce'";
  $rs3=mysqli_query($con,$query3);
  $query4="SELECT * FROM topping where type='topping'";
  $rs4=mysqli_query($con,$query4);
  ?>
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css"/>
  <script src="js/jquery.js"></script>
  <script src="js/jcanvas.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.js"></script>
  <title>Custom Pizza</title>
</head>
<body onload="updateData('A');">

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
  </style>


<script type="text/javascript">  
  var button = <?php echo $button; ?> ;
  
  function updateData(a)
  {
    var xmlhttp = new XMLHttpRequest();
    var url = "json_jquery.php?type="+a;

    xmlhttp.onreadystatechange=function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
          myFunction(xmlhttp.responseText);
        }
    }

    xmlhttp.open("GET", url, true);
    xmlhttp.send();
    
  }

var im = new Array();
var _sx=0;
var _sy=0;
var _sWidth=300;
var _sHeight=300;

  function myFunction(response){
    //alert(response);
      var arr = JSON.parse(response);
      var i;
      i=0;
    
      $('a').click(function(){
         if(button == 4)
         {

            if(($(this).text()) == 'A')
            {
              im = new Array();
              updateData('A');
              $('canvas').clearCanvas();
              
              _sWidth = 300;
              _sHeight = 300;
              _sx = 0;
              _sy = 0;
              
              draw();
            }
            if(($(this).text()) == 'B')
            {
              im = new Array();
              updateData('B');
              $('canvas').clearCanvas();
              
              _sWidth = 300;
              _sHeight = 300;
              _sx = 300;
              _sy = 0;
             
              draw();
            }
             if(($(this).text()) == 'C')
            {
              im = new Array();
              updateData('C');
              $('canvas').clearCanvas();
              
              _sWidth = 300;
              _sHeight = 300;
              _sx = 0;
              _sy = 300;
              
              draw();
            }
             if(($(this).text()) == 'D')
            {
              im = new Array();
              updateData('D');
              $('canvas').clearCanvas();
              
              _sWidth = 300;
              _sHeight = 300;
              _sx = 300;
              _sy = 300;
              
              draw();
            }
         }
         
    
      });
      
      var out = " ";
      $.each(arr,function(i,item)
      {
        im[i]=item.image;
        //alert(im[0]);        
        i++;
      });

      draw();
}
function draw()
{
       $('canvas').drawImage({
            type:'image',
            source: 'images/plain.png' ,
            x:150 +_sx, y:180+_sy,
            sWidth: _sWidth,
            sHeight: _sHeight,
            sx:_sx, sy: _sy
            })

       for(var j=0;j<im.length;j++)
       {
        //alert(im[j]);
         $('canvas').drawImage({
            type:'image',
            source: im[j] ,
            x: 150+_sx, y: 180+_sy,
            sWidth: _sWidth,
            sHeight: _sHeight,
            sx:_sx, sy: _sy
            }) 
        }
       
       // Redraw layers to ensure correct ordering
 }
 
 
    </script>
    <?php include('include/navbar.php');
    $_SESSION['topping-counter']=0;
  ?>
   
<div class="container-fluid" style="padding-top: 110px;">
<div class="well col-md-6" >
<div class="btn-group btn-group-justified">
<?php if($button == 1){?>
  <a href="#" class="btn btn-default" id="siteA">A</a>
<?php }else if($button == 2){
  ?>
  <a href="#" class="btn btn-default" id="siteA" >A</a>
  <a href="#" class="btn btn-default" id="siteB">B</a>
<?php }else{?>
  <a href="#" class="btn btn-default" id="siteA" value="A">A</a>
  <a href="#" class="btn btn-default" id="siteB" value="B">B</a>
  <a href="#" class="btn btn-default" id="siteC" value="C">C</a>
  <a href="#" class="btn btn-default" id="siteD" value="D">D</a>
<?php }?>
</div>
 <canvas width="720" height="620">
     
    </canvas>
</div>

<div class="col-md-1 " ></div>
<div class="well col-md-3 " >
<div class="btn-group btn-group-justified">

<form >
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
  <?php 
      while($row1 = mysqli_fetch_array($rs1)){ ?>
      <button type="button" name="size-<?php echo $row1[0];?>" id="size-<?php echo $row1[0];?>" class="btn btn-warning active btn-sm" ><?php echo $row1[0]; ?></button>
      <?php }?>
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
    <?php 
      while($row2 = mysqli_fetch_array($rs2)){ ?>
        <button type="button" id="crust-<?php echo $row2[0];?>">
          <span id="sauce" class="glyphicon glyph2icon-remove" aria-hidden="true"></span>
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
    <div class="panel-body">
      <?php 
      while($row3 = mysqli_fetch_array($rs3)){ ?>
        <button type="button" id="sauce-<?php echo $row3[0];?>">
          <span id="sauce" class="glyphicon glyphicon-remove" aria-hidden="true"></span>
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
    <div class="panel-body">
      <?php 
        while($row4 = mysqli_fetch_array($rs4)){ ?>
          <button type="button" id="topping-<?php echo $row4[0];?>">
            <span id="sauce" class="glyphicon glyphicon-remove" aria-hidden="true"></span>
            <?php echo $row4[1];?>
          </button>
      <?php }?>
    </div>
  </div>
</div>
  <!-- end topping -->
  </div>
  </fieldset>
  <button type = "button" onclick="order()">order</button>
  </form>
  </div>
</div>
	

<!--MODAL-->
</body>
</html>



