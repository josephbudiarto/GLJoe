<?php 
session_start();
    $user='';
    if(isset($_SESSION['user'])){
        $user=$_SESSION['user'];    
    }
    if(isset($_SESSION['user'])=="admin" && isset($_SESSION['pengaman'])=="adminmasuk"){
        header('location:admin.php');
    }
?>
<nav class="navbar navbar-fixed-top navbar-default" style="height=500px; font-family:impact;">
            <div class="container-fluid" >
                <div class="navbar-brand">
                    <a href="front.php"><img src="images/logo.png"></a>
                </div>
                <ul class="nav navbar-nav navbar-right">
                <?php 
                    $a='';
                    if($user ==$a){

                    }
                    else 
                        {echo '<li><a href="user.php"><h4>Hi, '.$user.' &nbsp &nbsp &nbsp</h4></a></li>' ;};
                    ?>
                    <li ><a href="index.php" style="height:80px;"><H4><strong>HOME</strong></H4><span class="sr-only">(current)</span></a></li>
                    <!--<li><a href="#"><H4><strong>ABOUT US</strong></H4></a></li>
                    <li><a href="#"><h4><strong>CONTACT</strong></h4></a></li>-->
                    <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><h4><strong>MENU</strong><span class="caret"></span></h4></a>
                        <ul class="dropdown-menu">
                            <li><a href="lili.php"><h4><img src="images/pizza2.png" height="20px" width="20px"><strong>PIZZA</strong></h4></a></li>
                            <li><a href="pasta.php"><h4><img src="images/pasta2.png" height="20px" width="20px"><strong>PASTA</strong></h4></a></li>
                            <li><a href="snack.php"><h4><img src="images/snacks2.png" height="20px" width="20px"><strong>SNACKS</strong></h4></a></li>
                            <li><a href="drink.php"><h4><img src="images/drinks2.png" height="20px" width="20px"><strong>DRINKS</strong></h4></a></li>
                      </ul>
                    </li>
                    <?php if($user == $a){?>
                        <li><a href="login.php"><h4><strong>LOGIN</strong></h4></a></li>
                    <?php }
                    else { ?>
                        <li><a href="logout.php"><h4><strong>LOGOUT</strong></h4></a></li>
                    <?php }?>
                </ul>
            </div>
        </nav>