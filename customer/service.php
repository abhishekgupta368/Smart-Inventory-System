<?php

  $con = mysqli_connect("localhost",'root','','sis');
  if($con) {
    echo "connection is successful<br>";
  }
  else {
    echo "server failed";
  }
  function create_id(){
	$id = array();
	for($i=0;$i<12;$i++){
		array_push($id,rand(0,9));
	}
    $val = join("",$id);
	$res= "your order id: "+$val;
    return $res;
  }
  $id = create_id();
	require __DIR__ . '/Twilio/autoload.php';
	use Twilio\Rest\Client;

	// Your Account SID and Auth Token from twilio.com/console
	$account_sid = 'your account sid';
	$auth_token = 'your account token';
	// In production, these should be environment variables. E.g.:
	// $auth_token = $_ENV["TWILIO_ACCOUNT_SID"]

	// A Twilio number you own with SMS capabilities
	$twilio_number = "your Twilio number";

	$client = new Client($account_sid, $auth_token);
	$client->messages->create(
		// Where to send a text message (your cell phone?)
		'your number',
		array(
			'from' => $twilio_number,
			'body' => 'your order has been placed.<br>your Order-Id: '+$id
		)
	); 	

  if(isset($_POST['submit'])){
    $reg_num = $_POST['registraion_number'];
    $weight = $_POST['weight'];
	$mat_type = $_POST['material'];
	$storage="";
	if(100 < $weight && $weight <=200){
		$storage="Pallet Racking";
	}
	else if(200 < $weight && $weight <=300){
		$storage="Bulk Racking";
	}
	else if(300 < $weight && $weight <=400){
		$storage="Cantilever Racking";
	}
	else if(400 < $weight && $weight <=500){
		$storage="Caron Flow Rack";
	}
	else if(500 < $weight && $weight <=1000){
		$storage="Mezzanines";
	}
	else{
		echo "INVALID INPUT!!!!!";
	}
	
    $sql1 ="INSERT INTO `store_info`(`order_id`, `reg_num`, `weight`, `storage_type`, `material_type`) VALUES ('$id','$reg_num','$weight','$storage','$mat_type')";
    $res= mysqli_query($con,$sql1);
    echo $id;
	if($res){
      header("Location:customer_mainpage.html");
    }
    else {
		echo $res;
        echo "record is worang";
    }
	
  }
mysqli_close($con);
?>
