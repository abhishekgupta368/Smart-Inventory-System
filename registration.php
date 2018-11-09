<?php
	$servername='localhost';
	$username= 'root';
	$password= '';
	$database= 'sis';
	
	$conn = mysqli_connect($servername,$username,$password,$database);
	if(!($conn)){
		die("Connection failed "+mysqli_connect_error());
	}	
	else{
		echo "Connection established!!!!\n";
	}
	if(isset($_POST['submit'])){
		
		$file_get = $_FILES['foto']['name'];
		$temp = $_FILES['foto']['tmp_name'];

		$file_to_saved = "img/".$file_get; //Documents folder, should exist in       your host in there you're going to save the file just uploaded
		move_uploaded_file($temp, $file_to_saved);
			
		$reg_num = $_POST['registraion_number'];
		$name = $_POST['name'];
		$contact= $_POST['contact'];
		$address= $_POST['address'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		
		$sql= "INSERT INTO `personal_info`(`reg_num`, `name`, `contact`, `address`, `email`, `password`, `image`)
				VALUES ('$reg_num','$name','$contact','$address','$email','$password','$file_to_saved')";
		$res= mysqli_query($conn,$sql);
		
		if($res){
			header('Location: index.html');
		}
		else
		{
			header('Location: resgistration.html');
		}
	}
	else{
		echo "Probleam occur!!!!!!!\n";
	}
	mysqli_close($conn);
?>