<?php  session_start();
  $con=mysqli_connect("127.0.0.1","root","");
  mysqli_select_db($con,"gljoe");

  $n = $_SESSION['custom'];
  $size='';
  
  if(isset($_SESSION['custom-size'])){
      $size=$_SESSION['custom-size'];
  }
  else{
    $size='L';
  }
  

  $query_size=mysqli_query($con,"SELECT price FROM size WHERE size='".$size."'");

  $precentage =100;
  while($row=mysqli_fetch_array($query_size))
  {
    $precentage=$row[0];  
  }
  $total=70000*$precentage/100;
 $query=mysqli_query($con,"SELECT d.type as tipe, d.topping_id as topping_id, t.harga as harga, t.nama as nama FROM dummy d join topping t ON(d.topping_id = t.topping_id) WHERE d.member_id=".$_SESSION['user_id']." ORDER BY d.type ASC  ");
  
  while($rows=mysqli_fetch_array($query))
  {
    $total=$total + $rows['harga']/$n;
  }
  
  if(isset($_SESSION['counter'])){
    $_SESSION['counter']++;
  }
  else{
    $_SESSION['counter'] = 1;
  }  

  $_SESSION['order'][$_SESSION['counter']]['nama']="Pizza Custom";
  $_SESSION['order'][$_SESSION['counter']]['harga']=$total;
  $_SESSION['order'][$_SESSION['counter']]['size']=$size;
  $_SESSION['order'][$_SESSION['counter']]['quantity']=1;

  /*echo $_SESSION['counter']."<br/>";
  echo $_SESSION['order'][$_SESSION['counter']]['nama']."<br/>";
  echo $_SESSION['order'][$_SESSION['counter']]['size']."<br/>";
  echo $_SESSION['order'][$_SESSION['counter']]['harga']."<br/>";
  echo $_SESSION['order'][$_SESSION['counter']]['quantity']."<br/>";
  */
  header('location:../lili.php');
?>