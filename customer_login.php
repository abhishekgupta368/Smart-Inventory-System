<?php
  $con = mysqli_connect("localhost",'root','','sis');
  if($con) {
    echo "connection is successful";
  }
  else {
    echo "server failed";
  }

  if(isset($_POST['Submit'])){
    
	session_start();
	$_SESSION['name']= $_POST['registraion_number'];
	$reg = $_POST['registraion_number'];
	$pass = $_POST['password'];
	
	echo $reg;
	echo "<br>";
	echo $pass;
	
	$sql="SELECT * FROM `personal_info`";
	$res = mysqli_query($con,$sql);
	
	while($row = mysqli_fetch_array($res)){
		
		if($row['reg_num']==$reg and $row['password']==$pass)
		{	
			header('Location:customer/customer_mainpage.html');
			break;
		}
		else 
		{
			echo "record is invalid!!!!!";
		}
	}
  }
?>