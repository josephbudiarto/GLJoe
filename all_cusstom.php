 <?php session_start();
 echo $_GET['i'];
 if(isset($_SESSION['user'])){

 }
 else{
  $_SESSION['custom'] = $_GET['i'];
  header('location:login.php');
}

  //echo $_GET['i'];
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
    .sty
    {
      display: inline-block;
      border-bottom: solid 5px #000;
      line-height: 1.1;
      margin-bottom: 0;
      padding-bottom: 10px;
      vertical-align: middle;
      text-transform: uppercase;
      letter-spacing: 0.06em;
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
    //SCRIPT LILI !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
    var button = <?php echo $button; ?> ;
    
    function updateData(a)
    {
      var xmlhttp = new XMLHttpRequest();
      var url = "json_jquery.php?type="+a;

      xmlhttp.onreadystatechange=function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
          myFunction(xmlhttp.responseText,a);
        }
      }

      xmlhttp.open("GET", url, true);
      xmlhttp.send();
    }
    function start()
    {
      updateData('A');
      updateData('B');
      updateData('C');
      updateData('D');
    }
    function myFunction(response,id){

     if(button == 4)
     {
      if(id == 'A')
      {
        ////alert('a');
        var arr = JSON.parse(response);
        var i;
        i=0;

        var out = " ";
        im = new Array();
        $.each(arr,function(i,item)
        {
          im[i]=item.image;
          ////alert(im[i]);
          i++;
        });

        _sWidth = 263;
        _sHeight = 263;
        _sx = 0;
        _sy = 0;

        draw();
      }
      else if(id=='B')
      {
        //alert('b');
        var arr = JSON.parse(response);
        var i;
        i=0;

        var out = " ";
        im = new Array();
        $.each(arr,function(i,item)
        {
          im[i]=item.image;
          //alert(im[i]);
          i++;
          
        });

        _sWidth = 263;
        _sHeight = 263;
        _sx = 263;
        _sy = 0;

        draw();
      }
      else if(id == 'C')
      {
        //alert('c');
        var arr = JSON.parse(response);
        var i;
        i=0;

        var out = " ";
        im = new Array();
        $.each(arr,function(i,item)
        {
          im[i]=item.image;
          //alert(im[i]);
          i++;
          
        });
        _sWidth = 263;
        _sHeight = 263;
        _sx = 0;
        _sy = 263;

        draw();
      }
      else if(id=='D')
      {
        //alert('d');
        var arr = JSON.parse(response);
        var i;
        i=0;

        var out = " ";
        im = new Array();
        $.each(arr,function(i,item)
        {
          im[i]=item.image;
          //alert(im[i]);
          i++;
          
        });
        _sWidth = 263;
        _sHeight = 263;
        _sx = 263;
        _sy = 263;

        draw();
      }
    }

    else if(button==2)
    {
      if(id == 'A')
      {
        ////alert('a');
        var arr = JSON.parse(response);
        var i;
        i=0;

        var out = " ";
        im = new Array();
        $.each(arr,function(i,item)
        {
          im[i]=item.image;
          ////alert(im[i]);
          i++;
        });

        _sWidth = 263;
        _sHeight = 523;
        _sx = 0;
        _sy = 70;

        draw();
      }
      else if(id=='B')
      {
        //alert('b');
        var arr = JSON.parse(response);
        var i;
        i=0;

        var out = " ";
        im = new Array();
        $.each(arr,function(i,item)
        {
          im[i]=item.image;
          //alert(im[i]);
          i++;
          
        });

        _sWidth = 263;
        _sHeight = 523;
        _sx = 263;
        _sy = 70;

        draw();
      }
    }
    else if(button==1)
    {
      if(id == 'A')
      {
        ////alert('a');
        var arr = JSON.parse(response);
        var i;
        i=0;

        var out = " ";
        im = new Array();
        $.each(arr,function(i,item)
        {
          im[i]=item.image;
          ////alert(im[i]);
          i++;
        });

        _sWidth = 523;
        _sHeight = 523;
        _sx = 150;
        _sy = 100;

        draw();
      }
    }
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

<body onload="start();">
  <?php
  include "include/navbar.php";
  $_SESSION['topping-counter']=0;
  $userid = $_SESSION['user_id'];
  ?>
  <div class="container-fluid" style="padding-top: 30px;">

    <div class="well col-md-6" style=" background-color:white; border-color:black" >
      <label class=sty><h1> Here's &nbsp your &nbsp custom &nbsp pizza :</h1></label>
      <canvas width="720" height="620" id="canvas1" align="center" style="padding-top:20px; display: block;"></canvas>
      
    </div>

    <div class="col-md-1 " ></div>
    <div class="well col-md-3 " style=" background-color:white; border-color:black ;padding-top: 30px;" id="top">
      
        <label class=sty><h2> Price &nbsp List &nbsp  :</h2></label>
        <hr>
        <?php include ("controller/priceList.php"); ?>
        <hr>
        
         <button type="button" class="btn btn-large btn-block btn-primary " onclick=window.location="controller/custom_order.php?i=<?php echo $button ?>"><h4><strong>Order</strong></h4></button>
      
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