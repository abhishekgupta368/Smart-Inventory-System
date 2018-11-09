<!DOCTYPE html>
<?php
	$database= mysqli_connect("localhost","root","","sis") ;
	if($database){
		echo "";
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
		
</style>

<table class="table1">
		<tr><h1 class="head">Customer Record</h1></tr>
		<tr>
			<th class="th3">Registration Number</th>
			<th class="th3">Name</th>
			<th class="th3">Contact</th>
			<th class="th3">Address</th>
			<th class="th3">E-Mail</th>
		</tr>
		
		<tr>
		<?php
		$sql2="SELECT * FROM `personal_info`";
		$r=mysqli_query($database,$sql2);
		while($row = mysqli_fetch_array($r)){
			$reg_num= $row['reg_num'];
			$name= $row['name'];
			$contact= $row['contact'];
			$address = $row['address'];
			$email = $row['email'];
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
	<p><a href="admin_mainpage.html" style="margin-left:650px; text-decoration: none;color: black; border: 1px solid black; padding: 5px 39px; background-color: green; color: white;" >GO BACK</a></p>
	</body>
</html>