<?php
  $con = mysqli_connect("localhost",'root','','sis');
  if($con) {
    echo "connection is successful";
  }
  else {
    echo "server failed";
  }
  session_start();
  if(isset($_POST['submit'])){
	$reg = $_SESSION['name'];
    
    $new_pass = $_POST['new_pass'];
	$con_pass = $_POST['con_new_pass'];
	
	echo $reg;
	if($new_pass == $con_pass){
		$sql1 ="UPDATE `personal_info` SET `password`='$new_pass' WHERE `reg_num`='$reg_num'";
		$res= mysqli_query($con,$sql1);
		
		if($res){
		  header("Location:customer_mainpage.html");
		}
		else {
			echo "record is worang";
		}
	}
	else{
		echo "<h1>password cannot be changed!!!!</h1>";
	}
}

?>
