<?php
include( 'includes/header.php');
include('includes/config.php');
include('includes/navbar.php'); 
session_start();
$name=$_SESSION['name'];
if (isset($name)) 
{

  $result=mysqli_query($con,"SELECT id,first_name,last_name,mail,exp FROM user");
  $row=mysqli_num_rows($result);
	echo'<title>Admin Panel</title>';
	echo'<div class="container">';
	echo'<div class="card shadow mb-4">';
	  echo'<div class="card-header py-3">';
	    echo'<br><h6 class="m-0 font-weight-bold text-primary">Admin Profile 
	    </h6>';
	  echo'</div>';


	echo "<h2 style='text-align: center;'>Welcome to Admin Panel</h2></br>";
	echo '<div class="card">';
	echo '<div class="card-header">';
	echo '<h5 class="large-box bg-info " style="text-align: right;">Registered Users: '.$row;
	echo '</div>';
	 echo'<div class="table-responsive">';

	      echo'<table class="table table-bordered table-stripped" id="dataTable" width="100%" cellspacing="0">';
	      echo'<thead style="align: center;">';
	          echo'<tr>';
	            echo'<th> ID </th>';
	            echo'<th> FIRST NAME </th>';
	            echo'<th> LAST NAME </th>';
	            echo'<th>Email </th>';
	            // echo'<th>Phone No </th>';
	            echo'<th>Experience</th>';
	            echo'<th>EDIT </th>';
	            echo'<th>DELETE </th>';
	          echo'</tr>';
	        echo'</thead>';

	while($retrive=mysqli_fetch_array($result))
    	{
    		$id=$retrive['id'];
    		$fname=$retrive['first_name'];
    		$lname=$retrive['last_name'];
    		$mail=$retrive['mail'];
    		// $phone=$retrive['phoneno'];
    		$exp=$retrive['exp'];

    		echo"<tbody>";
	        echo"<tr>";
	        echo "<th>$id</th>";
	        echo"<td> $fname</td>";
	        echo"<td> $lname</td>";
	        echo"<td> $mail </td>";
	        // echo"<td> $phone </td>";
	        echo"<td> $exp </td>";
	        echo"<td><a href='update-panel.php?user=$id'> <button class='btn btn-success'> UPDATE</button> </a></td>";
			echo "<td><a href='delete-admin.php?del=$id'><button class='btn btn-danger'>DELETE</button></a></td>";
    		echo "</tbody>";
    	}
    	echo "</table>";
    }
    else
    {
    	header("location:admin.php");
	}

?>
