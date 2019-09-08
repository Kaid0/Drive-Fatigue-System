<!DOCTYPE html>
</html>
<?php
	include("includes/header.php");
	include("includes/config.php");

	$Licenseno="";
	$Type="";
	$Seat="";


	if (isset($_POST['submit'])) 
	{
	$Licenseno=$_POST['license'];
	$Type=$_POST['type'];
	$Seat=$_POST['seats'];


	mysqli_query($con,"INSERT INTO vechiles(license,type,seats) VALUES ('$Licenseno','$Type','$Seat')");

	$Licenseno="";
	$Type="";
	$Seat="";
	}
	?>
<title>Vechile Form</title>
 <style type="text/css">
	#body_bg {
		background: url("images/showcase.jpg") center no-repeat fixed;
	}
	.error {
		color: red;
	}
	.success
	{
		color: green;
		font-weight: bold;
	}
</style>
<body id="body_bg">
	<div class="container">
		<button type="button" class="btn btn-primary float-right">
			<a href="vechiles.php" style="color: white;">Back</a>
		</button>
		<div class="login-form col-md-4 offset-md-4">
			<div class="jumbotron" style="margin-top:20px; padding-top:20px;padding-bottom: 20px;">
				<h3 align="center">Vechile Form</h3>
				<form method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label>License No :</label>
						<input type="text" name="license" placeholder="License No" class="form-control" value="<?php echo $Licenseno; ?>">
					</div>
					<div class="form-group">
						<label>Type :</label>
						<input type="text" name="type" placeholder="Type" class="form-control" value="<?php echo $Type; ?>">
					</div>
					<div class="form-group">
						<label>Seats Capacity :</label>
						<input type="number" name="seats" placeholder="Seat Capacity" class="form-control" value="<?php echo $Seat; ?>">
					</div>
					<center><input type="submit" value="Submit" name="submit" class="btn btn-success"></center>
				</form>
			</div>
		</div>
	</div>
</body>
</html>
