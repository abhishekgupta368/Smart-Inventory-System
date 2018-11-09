<?php
	$database= mysqli_connect("localhost","root","","sis") ;
	if($database){
		//echo "connection successful";
	}
	else{
		echo "connection aborted";
	}
		
		
	if($database){
		$reg=$_POST['registration_number'];
		$sql2="DELETE FROM `store_info` WHERE reg_num='$reg'";
		$r=mysqli_query($database,$sql2);
		if($r){
			header('Location:customer_request.php');
		}
		else{
			header("Location:admin_mainpage.html");
			echo $r;
			}
		}
	?>
	