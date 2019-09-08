
	<?php
	include("includes/header.php");
	include("includes/config.php");
	include("includes/function.php");
	session_start();
	$msg="";$msg1="";
	$email="";$password="";
	if(isset($_POST['submit']))
	{
		$email=$_POST['mail'];
		$password=$_POST['pass'];
		$checkbox=isset($_POST['check']);
		if (empty($email)) {
			$msg="<div class='error'>Please Enter Your Email</div>";
		}
		else if (empty($password)) {
			$msg1="<div class='error'>Please Enter Your Password</div>";
		}	else if (email_exists($email,$con)) {
			$pass=mysqli_query($con,"SELECT password FROM user WHERE mail='$email'");
			$pass_w=mysqli_fetch_array($pass);
			$dpass=$pass_w['password'];
			$pass=md5($password);
			if($pass!==$dpass){
				$msg1="<div class='error'>Password is Wrong</div>";
			}
			else{
				$_SESSION['mail']=$email;
				if($checkbox=='on'){
					setcookie("name",$email,time()+360);
				}
				header("location:profile.php");
			}
		}
		else
		{
				$msg="<div class='error'>Email Dose not Exists</div>";
		}
	}
	?>
	<title>Login Form</title>
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
		<div class="login-form col-md-4 offset-md-4">
			<div class="jumbotron" style="margin-top:50px; padding-top:20px;padding-bottom: 10px">
				<h2 align="center">Login Form</h2>
			</br>
			<form method="POST">
				<div class="form-group">
					<label>Email :</label>
					<input type="email" name="mail" class="form-control" value="<?php echo $email; ?>"/>
					<?php echo $msg; ?>
				</div>
				<div class="form-group">
					<label>Password :</label>
					<input type="password" name="pass" class="form-control" value="<?php echo $password; ?>" />
					<?php echo $msg1; ?>
				</div>
				<div class="form-group">
					<input type="checkbox" name="check"/>
					&nbsp; Keep me Logged In
				</div></br>
				<div class="form-group">
					<center><input type="submit" name="submit" value="Login" class="btn btn-success"/></center>
					<br>
					<center><a href="signup.php">Create New Account ?</a></center>
				</div>
			</form>
	</div>
</body>
</html>