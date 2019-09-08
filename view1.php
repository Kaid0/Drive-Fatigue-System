<?php
include( 'includes/header.php');
include('includes/config.php');
include('includes/navbar.php'); 
session_start();
$name=$_SESSION['name'];
if (isset($name)) 
{

  $result=mysqli_query($con,"SELECT ID,Drivername,Vechileno,NoofBlinks,Yawningcount,Lastupdate FROM test");
  $row=mysqli_num_rows($result);
	echo'<title>Driver Status</title>';
	echo'<div class="container">';
	echo'<div class="card shadow mb-4">';
	  echo'<div class="card-header py-3">';
	    echo'<br><h6 class="m-0 font-weight-bold text-primary">Driver Status 
	    </h6>';
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
	            echo'<th> No Of Blinks </th>';
	            echo'<th> Yawning Count </th>';
	            echo'<th> Last Updated </th>';
	        echo'</thead>';

	while($retrive=mysqli_fetch_array($result))
    	{
    		$id=$id=($id+1);
    		$dname=$retrive['Drivername'];
    		$Vno=$retrive['Vechileno'];
    		$Nob=$retrive['NoofBlinks'];
    		$Yawn=$retrive['Yawningcount'];
    		$lu=$retrive['Lastupdate'];

    		echo"<tbody>";
	        echo"<tr>";
	        echo "<th>$id</th>";
	        echo"<td> $dname</td>";
	        echo"<td> $Vno</td>";
	        echo"<td>$Nob</td>";
	        echo"<td> $Yawn</td>";
	        echo"<td> $lu</td>";
    		echo "</tbody>";
    	}
    	echo "</table>";
    }
    else
    {
    	header("location:admin.php");
	}
?>