<!DOCTYPE html>
<?php
	$database= mysqli_connect("localhost","root","","sis") ;
	if($database){
		//echo "connection successful";
	}
	else{
		echo "connection aborted";
	}
	?>	
<html>
	<head>
		<title>Smart inventory system</title>
		<meta charset='utf-8'/>	
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script>
			$(document).ready(function () {
				$("html").fadeIn(2000);	
			});		
		</script>
	</head>
	<!-- -->
<style>
	.table1{
			margin:50px auto;
			text-align:center;
			color:white;
			border:2px solid black;
			background-color:black;
			opacity:0.8;
		}
		
	.th1
		{	padding-right:31px;
			padding-left:31px;
		}
	.th2{
			padding-right:59px;
			padding-left:59px;
		}
	.th3{
			padding-right:40px;
			padding-left:40px;
		}
	body{
			background-image:url('../images/banner.png');
			background-size:cover;
			background-repeat:no-repeat;
			background-attachment:fixed;
			margin-top:0px;
		}
	.head{
			margin-left:400px;
			margin-right:400px;
			text-align:center;
			color:white;
			border:2px solid black;
			background-color:black;
			opacity:0.8;
			
		}
	.remove{
		margin-left:560px;
		margin-right:500px;
		padding:20px 20px 20px 20px;
		color:white;
		background-color:black;
		opacity:0.8;
	}
		
</style>

<table class="table1">
		<tr><h1 class="head">Customer Record</h1></tr>
		<tr>
			<th class="th3">Order Id</th>
			<th class="th3">Registration Number</th>
			<th class="th3">Weight</th>
			<th class="th3">Storage</th>
			<th class="th3">Material-Type</th>
		</tr>
		
		<tr>
		<?php
		$sql2="SELECT * FROM `store_info`";
		$r=mysqli_query($database,$sql2);
		while($row = mysqli_fetch_array($r)){
			$reg_num= $row['order_id'];
			$name= $row['reg_num'];
			$contact= $row['weight'];
			$address = $row['storage_type'];
			$email = $row['material_type'];
		?>	
			
			<td><?php echo $reg_num; ?></td>
			
			<td><?php echo $name; ?></td>
			<td><?php echo $contact; ?></td>
			<td><?php echo $address; ?></td>
			<td><?php echo $email; ?></td>
			<tr>
			</tr>
			
		<?php
		}
		?>
		
	</table>
	<div class="remove">
		<form action="delete.php" method="POST" enctype="">
			<h1>Remove Records</h1>
			<p>Enter Registration Number</p>
			<input pattern="[1-9]{2}[A-Za-z]{3}[0-9]{4}" type="text" placeholder="16BCE0109" name="registration_number">
			<input type="submit" name="submit" value="submit">
		</form>
	</div>
	
	<p><a href="admin_mainpage.html" style="margin-left:650px; text-decoration: none;color: black; border: 1px solid black; padding: 10px 50px; background-color: green; color: white;" >GO BACK</a></p>
	</body>
</html>