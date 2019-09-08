<?php
include( 'includes/header.php');
include('includes/config.php');
include('includes/navbar.php'); 
session_start();
$name=$_SESSION['name'];
if (isset($name)) 
{

  $result=mysqli_query($con,"SELECT license,type,seats FROM vechiles");
  $row=mysqli_num_rows($result);
	echo'<title>Admin Panel</title>';
	echo'<div class="container">';
	echo'<div class="card shadow mb-4">';
	  echo'<div class="card-header py-3">';
	    echo'<br><h5 class="m-1 font-weight-bold text-primary"><b>Vechiles</b>
	    </h5>';
	    echo "<button type='button' class='btn btn-primary'><a href='vechile-form.php' style='color: white;'><b>Add Vechile</b></a></button>";
	  echo'</div>';

	echo '<div class="card">';
	echo '<div class="card-header">';
	echo '</div>';
	 echo'<div class="table-responsive">';

	      echo'<table class="table table-bordered table-stripped" id="dataTable" width="100%" cellspacing="0">';
	      echo'<thead style="align: center;">';
	          echo'<tr>';
	            echo'<th> ID </th>';
	            echo'<th> License No </th>';
	            echo'<th> Type </th>';
	            echo'<th> Seats Capacity</th>';
	        echo'</thead>';

	while($retrive=mysqli_fetch_array($result))
    	{
    		$id=($id+1);
    		$Licenseno=$retrive['license'];
    		$Type=$retrive['type'];
    		$Seat=$retrive['seats'];

    		echo"<tbody>";
	        echo"<tr>";
	        echo"<td> $id</td>";
	        echo"<td> $Licenseno</td>";
	        echo"<td> $Type</td>";
	        echo"<td> $Seat</td>";
    	}
    	echo "</table>";
    }
    else
    {
    	header("location:admin.php");
	}

?>