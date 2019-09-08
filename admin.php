<?php
	include("includes/header.php");
	include("includes/config.php");
	include("includes/function.php");
	session_start();
	$msg="";$msg1="";
	$fname="";$password="";
	if(isset($_POST['submit']))
	{
		$fname=$_POST['name'];
		$password=$_POST['pass'];
		if (empty($fname))
		{
			$msg="<div class='error'>Please Enter Your Name</div>";
		}
		else if (empty($password)) {
			$msg1="<div class='error'>Please Enter Your Password</div>";
		}	else {
			$pass=mysqli_query($con,"SELECT password FROM admin WHERE name='$fname'");
			$pass_w=mysqli_fetch_array($pass);
			$dpass=$pass_w['password'];
			if($password!==$dpass){
				$msg1="<div class='error'>Password is Wrong</div>";
			}
			else{
				$_SESSION['name']=$fname;
				header("location:admin-panel.php");
			}
		}
	}
	?>
	<title>Admin Login</title>
	<style type="text/css">
		#body-bg {
			background: url("images/showcase.jpg")
		}
	</style>
</head>
<body id="body-bg">
	<div class="container" style="padding-top: auto;">
		<div class="login-form col-md-4 offset-md-4">
			<div class="jumbotron" style="margin-top:50px; padding-top:20px;padding-bottom: 10px">
				<h2 align="center">Owner Login</h2>
			</br>
			<form method="POST">
				<div class="form-group">
					<label>User Name:</label>
					<input type="text" name="name" class="form-control" placeholder="User Name" value="<?php echo $fname?>" />
					<?php echo $msg; ?>
				</div>
				<div class="form-group">
					<label>Password :</label>
					<input type="password" name="pass" class="form-control" placeholder="Password" value="" />
					<?php echo $msg1; ?>
				</div>
				<div class="form-group">
					<center><input type="submit" name="submit" value="Login" class="btn btn-success"/></center>
				</div>
			</form>
	</div>
</body>
</html>