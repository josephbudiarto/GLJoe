 <?php 
 include('include/navbar.php');
  if(isset($_SESSION['user'])){
  }
  else{
    $_SESSION['custom'] = $_GET['i'];
    header('location:login.php');
  }
  $_SESSION['custom'] = $_GET['i'];
  $button=$_GET['i'];
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
  <script language="JavaScript">

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
      function priceFunction(i){
        var harga = document.getElementById('price'+i).innerHTML;
        var qty = document.getElementById('quantity'+i).innerHTML;
        document.getElementById('subtotal'+i).innerHTML = parseInt(harga) * parseInt(qty);
      }
        function cancelFunction(){
          var r = confirm('Are you sure you want to cancel ?');
          if(r == true){
          window.location='controller/cancel.php'
          }
        }
        function orderFunction(id){
        if(window.XMLHttpRequest){
                xmlhttp = new XMLHttpRequest();
            }
            xmlhttp.onreadystatechange = function(){
                if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
                    document.getElementById('badge-order').innerHTML = xmlhttp.responseText;
                }
            };
        xmlhttp.open('GET','controller/cek_order_snack.php?id='+id,true);
            xmlhttp.send();
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
    function toppingFunction(i,user,canvas){
      //alert(i+user+canvas);
      if(window.XMLHttpRequest){
          xmlhttp = new XMLHttpRequest();
      }
      xmlhttp.onreadystatechange = function(){
          if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
            //document.getElementById('h').innerHTML = xmlhttp.responseText;
            updateData(canvas);
          }
      };
      xmlhttp.open('GET','controller/db.php?topping='+i+'&user=' + user + '&canvas='+canvas,true);
      xmlhttp.send();
    }

    function valueFunction(i){      
      if(window.XMLHttpRequest){
          xmlhttp = new XMLHttpRequest();
      }
      xmlhttp.onreadystatechange = function(){
          if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
              document.getElementById('hasilsize').innerHTML = xmlhttp.responseText;
          }
      };
      xmlhttp.open('GET','controller/custom_value.php?value='+i,true);
      xmlhttp.send();
    }
    
    function call(i,button){
      if(window.XMLHttpRequest){
          xmlhttp = new XMLHttpRequest();
      }
      xmlhttp.onreadystatechange = function(){
          if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
            document.getElementById('top').innerHTML = xmlhttp.responseText;
          }
      };
      xmlhttp.open('GET','controller/canvas.php?value='+i+'&button='+button,true);
      xmlhttp.send();
    }
  </script>
  <script type="text/javascript">
    //SCRIPT LILI !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
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
    if(button==2)
    {
      _sWidth = 300;
      _sHeight = 600;
      _sx = 0;
      _sy = 70;
    }
    else if(button==1)
    {
      _sWidth = 700;
      _sHeight = 600;
      _sx = 50;
      _sy = 80;
    }

      function myFunction(response){
        ////alert(response);
          var arr = JSON.parse(response);
          var i;
          i=0;
          
          var out = " ";
          im = new Array();
          $.each(arr,function(i,item)
          {
            im[i]=item.image;
            i++;
          });

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
             else if(button==2)
             {
                if(($(this).text()) == 'A')
                {
                  im = new Array();
                  updateData('A');
                  $('canvas').clearCanvas();
                  
                  _sWidth = 300;
                  _sHeight = 600;
                  _sx = 0;
                  _sy = 70;
                  
                  draw();
                }
                if(($(this).text()) == 'B')
                {
                  im = new Array();
                  updateData('B');
                  $('canvas').clearCanvas();
                  
                  _sWidth = 300;
                  _sHeight = 600;
                  _sx = 300;
                  _sy = 70;
                 
                  draw();
                }
             }
             else if(button==1)
             {
              if(($(this).text()) == 'A')
                {
                  im = new Array();
                  updateData('A');
                  $('canvas').clearCanvas();
                  
                  _sWidth = 700;
                  _sHeight = 600;
                  _sx = 50;
                  _sy = 80;
                  
                  draw();
                }
             }
        
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
             $('canvas').drawImage({
                type:'image',
                source: im[j] ,
                x: 150+_sx, y: 180+_sy,
                sWidth: _sWidth,
                sHeight: _sHeight,
                sx:_sx, sy: _sy
                }) 
            }
     }
  </script>
</head>

<body onload="updateData('A')">
  <?php 
    $_SESSION['topping-counter']=0;
    $userid = $_SESSION['user_id'];
    $_SESSION['canvas'] = "A";
  ?>
<div class="container-fluid" style="padding-top: 110px;">
  <div class="well col-md-6" >
    <div class="btn-group btn-group-justified">
    <?php if($button == 1){?>
      <a href="#" class="btn btn-default" onclick="call('A',<?php echo $button;?>)">A</a>
    <?php }else if($button == 2){
      ?>
      <a href="#" class="btn btn-default" onclick="call('A',<?php echo $button;?>)">A</a>
      <a href="#" class="btn btn-default" onclick="call('B',<?php echo $button;?>)">B</a>
    <?php }else{?>
      <a href="#" class="btn btn-default" onclick="call('A',<?php echo $button;?>)">A</a>
      <a href="#" class="btn btn-default" onclick="call('B',<?php echo $button;?>)">B</a>
      <a href="#" class="btn btn-default" onclick="call('C',<?php echo $button;?>)">C</a>
      <a href="#" class="btn btn-default" onclick="call('D',<?php echo $button;?>)">D</a>
    <?php }?>
    </div>
    <canvas width="720" height="620" id="canvas1" align="center" style="padding-top:20px; display: block;"></canvas>
    <canvas width="720" height="620" id="canvas2" align="center" style="padding-top:20px; display: none;"></canvas>
    <canvas width="720" height="620" id="canvas3" align="center" style="padding-top:20px; display: none;"></canvas>
    <canvas width="720" height="620" id="canvas4" align="center" style="padding-top:20px; display: none;"></canvas>
  </div>

  <div class="col-md-1 " ></div>
  <div class="well col-md-3 " id="top">
    <div class="btn-group btn-group-justified">
      <form>
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
              <!--CRUST-->
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
              <!--SAUCE-->
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

              <!-- TOPPING-->
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
                <!-- end topping -->
          </div>
        </fieldset><hr>
        <button type="button" class="btn btn-large btn-block btn-primary" onclick=window.location="all_cusstom.php?i=<?php echo $button;?>"><h4>Done</h4></button>
      </form>
    </div>

    

  </div>
 
  <div class="col-md-6">
    
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

</div>
</body>
</html>