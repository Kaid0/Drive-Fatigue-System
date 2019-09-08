<html>
<head>
	<?php
	include("includes/config.php");
	include("includes/function.php");

	$msg="";$msg2="";$msg3="";$msg4="";$msg5="";$msg6="";$msg7="";$msg8="";$msg9="";
	$firstname="";
	$lastname="";
	$email="";
	$date="";
	$Exp="";
	$password="";
	$c_password="";
	

	if (isset($_POST['submit'])) 
	{
	    $firstname =$_POST['fname'];
		$lastname =$_POST['lname'];
		$email = $_POST['mail'];
		$date = $_POST['dob'];
		$Exp = $_POST['exp'];
		$password = $_POST['pass'];
		$c_password = $_POST['cpass'];
		$checkbox = isset($_POST['check']);

		if (strlen($firstname)<3) {
			$msg ="<div class ='error'> First name must contain atleast 3 characters</div>";
		}
		else if (strlen($lastname)<3) {
			$msg2 ="<div class ='error'> Last name must contain atleast 3 characters</div>";
		}
		else if (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
			$msg3 = "<div class ='error'> Enter valid Email</div>";
		}
		else if (email_exists($email,$con))
		{
			$msg3 ="<div class = 'error'>Email Exists</div>";
		}

		/**else if (empty($date) 
		{
			$msg4 ="<div class ='error'> Please Enter Your Date of Birth</div>";
		}**/
		else if (empty($password)) {
			$msg5 ="<div class ='error'> Please Enter Your Password</div>";
		}
		else if (strlen($password)<3)
		{
			$msg5 ="<div class ='error'> Password must contain atleast 5 characters</div>";
		}
		else if ($password!==$c_password) {
			$msg6 ="<div class ='error'> Password is not same</div>";
		}
		else if ($checkbox=="") {
			$msg8 ="<div class ='error'> Plese Agree our terms and conditions</div>";
		}
		else
		{
		$password=md5($password);
			mysqli_query($con,"INSERT INTO user(first_name,last_name,mail,dob,password,exp) VALUES ('$firstname','$lastname','$email','$date','$password','$Exp')");
			$msg9 = "<div class ='success'><center>You are Successfully Registered</center></div>";
			$firstname="";$lastname="";$email="";$date="";$password="";$c_password="";$Exp="";
			
		}
	}


	?>
<title>Sign Up Form</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
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
		<div class="login-form col-md-4 offset-md-4">
			<div class="jumbotron" style="margin-top:20px; padding-top:20px;padding-bottom: 20px;">
				<h3 align="center">Sign Up Form</h3>
				<?php echo $msg9; ?>
			</br>
				<form method="post" enctype="multipart/form-data">
					<div class="form-group">
					<label>First Name :</label>
					<input type="text" name="fname" placeholder="Your First Name" class="form-control" value="<?php echo $firstname; ?>">
					<?php echo $msg;?>
					</div> 
					<div class="form-group">
					<label>Last Name :</label>
					<input type="text" name="lname" placeholder="Your Last Name" class="form-control"  value="<?php echo $lastname; ?>">
					<?php echo $msg2; ?>
					</div> 
					<div class="form-group">
					<label>Email :</label>
					<input type="email" name="mail" placeholder="Your Email" class="form-control"  value="<?php echo $email; ?>">
					<?php echo $msg3; ?>
					</div> 
					<div class="form-group">
					<label>Date of Birth :</label>
					<input type="date" name="dob" class="form-control"  value="<?php echo $date; ?>">
					<?php echo $msg4; ?>
					</div>
					<div class="form-group">
					<label>Experience :</label>
					<input type="text" name="exp" placeholder="Experience" class="form-control"  value="<?php echo $Exp; ?>">
					<?php echo $msg4; ?>
					</div>  
					<div class="form-group">	
					<label>Password :</label>
					<input type="Password" name="pass" placeholder="Password" class="form-control"  value="<?php echo $password; ?>">
					<?php echo $msg5; ?>
					</div> 
					<div class="form-group">
					<label>Re-enter Password :</label>
					<input type="Password" name="cpass" placeholder="Re-enter Password" class="form-control"  value="<?php echo $c_password; ?>">
					<?php echo $msg6; ?>
					</div> 
					</br>
					<div class="form-group">
					<input type="checkbox" name="check">
					I Agree to the terms and conditions.
					<?php echo $msg8; ?>
					</div></br> 
					<center><input type="submit" value="Submit" name="submit" class="btn btn-success"></center></br>
					<center><a href="login.php">Already Registered ?</a></center>
				</form>
			</div>
		</div>
	</div>
</body>
</html>