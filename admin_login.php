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
	$_SESSION['name']= $_POST['user_id'];
	$reg = $_POST['user_id'];
	$pass = $_POST['password'];
	
	echo $reg;
	echo "<br>";
	echo $pass;
	
	$sql="SELECT * FROM `admin`";
	$res = mysqli_query($con,$sql);
	
	while($row = mysqli_fetch_array($res)){
		
		if($row['admin_id']==$reg and $row['password']==$pass)
		{	
			header('Location:admin/admin_mainpage.html');
			break;
		}
		else 
		{
			echo "record is invalid!!!!!";
		}
	}
  }
?>