<?php
include( 'includes/header.php');
include('includes/config.php');
include('includes/navbar.php'); 
session_start();
$name=$_SESSION['name'];
if (isset($name)) 
{

  $result=mysqli_query($con,"SELECT ID,Drivername,Vechileno FROM test");
  $row=mysqli_num_rows($result);
	echo'<title>Driver Status</title>';
	echo'<div class="container">';
	echo'<div class="card shadow mb-4">';
	echo'<div class="card-header py-3">';
    echo'<br><h4 class="m-1 font-weight-bold text-primary">Assign 
    </h4>';
    echo"<button type='button' class='btn btn-primary'><a href='assign-form.php' style='color: white;'><b>Assign Vechiles</b></a></button>";
  echo'</div>';
	  
	echo '<div class="card">';
	echo '<div class="card-header">';
	echo '</div>';
	 echo'<div class="table-responsive">';

	      echo'<table class="table table-bordered table-stripped" id="dataTable" width="100%" cellspacing="0">';
	      echo'<thead style="align: center;">';
	          echo'<tr>';
	            echo'<th> ID </th>';
	            echo'<th> Drivers Name </th>';
	            echo'<th> Vechile No </th>';
	        echo'</thead>';

	while($retrive=mysqli_fetch_array($result))
    	{
    		$id=$id=($id+1);
    		$dname=$retrive['Drivername'];
    		$Vno=$retrive['Vechileno'];

    		echo"<tbody>";
	        echo"<tr>";
	        echo "<th>$id</th>";
	        echo"<td> $dname</td>";
	        echo"<td> $Vno</td>";
    		echo "</tbody>";
    	}
    	echo "</table>";
    }
    else
    {
    	header("location:admin.php");
	}
?>