<?php session_start();

	$status = "false";
	$_SESSION['custom'][$_SESSION['custom-counter']]['temporary']=NULL;
	for($i=1;$i<=$_SESSION['topping-counter'];$i++){
		if($_SESSION['custom'][$_SESSION['custom-counter']]['topping'][$i] == $_GET['topping']){
			//$_SESSION['custom'][$_SESSION['custom-counter']]['topping'][$i] = NULL;
			$status="true";
			break;
		}
		else{
			$status="false";
		}
	}
	if($status=="true"){
		$counter=0;
		for($j=1;$j<=$_SESSION['topping-counter'];$j++){
			if($_SESSION['custom'][$_SESSION['custom-counter']]['topping'][$j] == $_GET['topping']){
				$_SESSION['custom'][$_SESSION['custom-counter']]['topping'][$i] = NULL;
			}
			else{
				$_SESSION['custom'][$_SESSION['custom-counter']]['temporary'][++$counter]=$_SESSION['custom'][$_SESSION['custom-counter']]['topping'][$j];
			}
		}
		$_SESSION['custom'][$_SESSION['custom-counter']]['topping']=$_SESSION['custom'][$_SESSION['custom-counter']]['temporary'];
		$_SESSION['topping-counter'] = $counter;
	}
	else if($status=="false"){
		$_SESSION['custom'][$_SESSION['custom-counter']]['topping'][++$_SESSION['topping-counter']]=$_GET['topping'];
	}

	//echo $status;
	for($i=1;$i<=$_SESSION['topping-counter'];$i++){
		echo $_SESSION['custom'][$_SESSION['custom-counter']]['topping'][$i];
	}
	
?>