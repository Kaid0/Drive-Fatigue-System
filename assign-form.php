<!DOCTYPE html>
</html>
<?php
	include("includes/header.php");
	include("includes/config.php");

	$dname="";
	$Vno="";


	if (isset($_POST['submit'])) 
	{
	$dname=$_POST['Drivername'];
	$Vno=$_POST['Vechileno'];



	mysqli_query($con,"INSERT INTO test(Drivername,Vechileno) VALUES ('$dname','$Vno')");

	$dname="";
	$Vno="";
	}
	?>
	<title>Assign Vechile</title>
	<style type="text/css">
		#body-bg{
			background: url("images/showcase.jpg") center no-repeat fixed;
		}
		.error{
			color: red;
		}
	</style>
</head>
<body id="body-bg">
	<div class="container">
		<button type="button" class="btn btn-primary float-right">
			<a href="assign.php" style="color: white;">Back</a>
		</button>
		<div class="login-form col-md-4 offset-md-4">
			<div class="jumbotron" style="margin-top:50px; padding-top:20px;padding-bottom: 10px">
				<h2 align="center">Assign</h2>
			</br>
			<form method="POST">
				<div class="form-group">
					<label>Driver Name :</label>
					<input type="input" name="Drivername" class="form-control" value="<?php echo $dname; ?>" />
				</div>
				<div class="form-group">
					<label>Vechile No :</label>
					<input type="text" name="Vechileno" class="form-control" value="<?php echo $Vno; ?>" />
				</div>
				<div class="form-group">
					<center><input type="submit" name="submit" value="Assign" class="btn btn-success"/></center>
					<br>
				</div>
			</form>
	</div>
</body>
</html>