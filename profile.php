<?php
include("includes/header.php");
include("includes/config.php");
session_start();
include("includes/function.php");


if(logged_in())
{
	header("location:login.php");
}
else if (isset($_COOKIE["name"])) 
{
	//echo "you are logged through cookie";
	$mail=$_COOKIE['name'];	
	$result=mysqli_query($con,"SELECT first_name,last_name,mail,dob,exp FROM user WHERE mail='$mail'");
	$retrive=mysqli_fetch_array($result);
	//print_r();
	$first_name=$retrive['first_name'];
	$last_name=$retrive['last_name'];
	$dob=$retrive['dob'];
	$exp=$retrive['exp'];
	$mail=$retrive['mail'];
	?>
	<title>Profile Page</title>
	<style type="text/css">
		#body-bg{
			background-color: #c3c3a2;
		}
		#tbl{
			border: 10px;
			padding: 25px;
			margin: 60px;
			height: 30px;
			width: 30px;
		}
	</style>
	</head>
	<body id="body-bg">
		<div class="container" style="background-color:  #ebebe0; margin-top: 20px; margin-bottom:20px;width:1200px;height: 640px; ">
			<h2 align="center">Welcome <?php echo ucfirst($first_name)." ".ucfirst($last_name)?> </h2>
		<a href="Logout.php"><button class="btn btn-outline-success" style="float: right;">Logout</button></a>
		<div class="card">
		<div class="card-header">
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-bordered table-stripped" id="dataTable" width="100%" cellspacing="0">
						<thead>
							<tr>
								<td>First Name</td>
								<td>Last Name</td>
								<td>Email</td>
								<td>Date of Birth</td>
								<td>Experience</td>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><?php echo $first_name; ?></td>
								<td><?php echo $last_name; ?></td>
								<td><?php echo $mail; ?></td>
								<td><?php echo $dob; ?></td>
								<td><?php echo $exp; ?></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
	<?php
}else{
	//echo "you are logged through cookie";
	$mail=$_SESSION["mail"];
	$result=mysqli_query($con,"SELECT first_name,last_name,dob,mail,exp FROM user WHERE mail='$mail'");
	$retrive=mysqli_fetch_array($result);
	//print_r();
	$first_name=$retrive['first_name'];
	$last_name=$retrive['last_name'];
	$dob=$retrive['dob'];
	$mail=$retrive['mail'];
	$exp=$retrive['exp'];
	?>
	<title>Profile Page</title>
	<style type="text/css">
		#body-bg{
			background-color: #c3c3a2;
		}
		#tbl{
			border: 10px;
			padding: 25px;
			margin: 60px;
			height: 30px;
			width: 30px;
		}
	</style>
	</head>
	<body id="body-bg">
		<div class="container" style="background-color:  #ebebe0; margin-top: 20px; margin-bottom:20px;width:1200px;height: 640px; ">
			<h2 align="center">Welcome <?php echo ucfirst($first_name)." ".ucfirst($last_name)?> </h2>
			<hr><br>
		<a href="Logout.php"><button class="btn btn-outline-success" style="float: right;">Logout</button></a>
	<br>
	<div class="card">
		<div class="card-header">
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-bordered table-stripped" id="dataTable" width="100%" cellspacing="0">
						<thead>
							<tr>
								<td>First Name</td>
								<td>Last Name</td>
								<td>Email</td>
								<td>Date of Birth</td>
								<td>Experience</td>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><?php echo $first_name; ?></td>
								<td><?php echo $last_name; ?></td>
								<td><?php echo $mail; ?></td>
								<td><?php echo $dob; ?></td>
								<td><?php echo $exp; ?></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
	<?php 	
}
?>	