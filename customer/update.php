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
    $reg_num = $_POST['registraion_number'];
    $name= $_POST['name'];
    $contact = $_POST['contact'];
    $address = $_POST['address'];
    $email = $_POST['email'];
	
    $sql1 ="UPDATE `personal_info` SET `name`='$name',`contact`='$contact',`address`='$address',`email`='$email' WHERE `reg_num`='$reg'";
    $res= mysqli_query($con,$sql1);
    
	if($res){
      
	  header("Location:customer_mainpage.html");
    }
    else {
        echo "record is worang";
    }
  }

?>
