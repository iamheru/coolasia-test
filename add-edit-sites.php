<?php
	session_start();
	if (! isset($_SESSION['role'])) {
		header("Location: index.php");
	}
	include "config.php";
	$flag=mysqli_real_escape_string($conn,$_POST['flag']);
	$site_name=mysqli_real_escape_string($conn,$_POST['site_name']);
	$site_address=mysqli_real_escape_string($conn,$_POST['site_address']);
	$site_lat=mysqli_real_escape_string($conn,$_POST['site_lat']);
	$site_lng=mysqli_real_escape_string($conn,$_POST['site_lng']);
	if ($flag=="Create") {
		$query="INSERT INTO t_site (sub_dept,site_name,site_address,site_lat,site_lng) VALUES ('FO','$site_name','$site_address',$site_lat,$site_lng)";
	} 
	else if ($flag=="Edit") {	
		$site_id=mysqli_real_escape_string($conn,$_POST['site_id']);			
		$query="UPDATE t_site SET site_name='$site_name', site_address='$site_address', site_lat=$site_lat, site_lng=$site_lng WHERE site_id=$site_id";
	} elseif ($flag=="Delete") {
		$site_id=mysqli_real_escape_string($conn,$_POST['site_id']);			
		$query="DELETE FROM t_site WHERE site_id=$site_id";
	} else {
		exit("Failed");
	}	
	$data=mysqli_query($conn,$query);
	if ($data) 
		echo 'Success';
	else 
	    echo 'Failed';
?>