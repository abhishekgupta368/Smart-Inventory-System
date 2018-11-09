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
			width:400px;
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
			<th class="th3">Name</th>
			<th class="th3">Supplier Name</th>
			<th class="th3">City</th>
			<th class="th3">State</th>
		</tr>
		
		<tr>
		<?php
		$sql2="SELECT * FROM `supp_info`";
		$r=mysqli_query($database,$sql2);
		while($row = mysqli_fetch_array($r)){
			$supp_id= $row['supp_id'];
			$supp_name= $row['supp_name'];
			$city= $row['city'];
			$state = $row['state'];
		?>	
			
			<td><?php echo $supp_id; ?></td>
			<td><?php echo $supp_name; ?></td>
			<td><?php echo $city; ?></td>
			<td><?php echo $state; ?></td>
			<tr>
			</tr>
			
		<?php
		}
		?>
		
	</table>
	<p><a href="admin_mainpage.html" style="margin-left:650px; text-decoration: none;color: black; border: 1px solid black; padding: 5px 39px; background-color: green; color: white;" >GO BACK</a></p>
	</body>
</html>