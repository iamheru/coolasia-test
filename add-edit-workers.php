<?php
	session_start();
	if (! isset($_SESSION['role'])) {
		header("Location: index.php");
	}
	include "config.php";
	$flag=mysqli_real_escape_string($conn,$_POST['flag']);
	$worker_name=mysqli_real_escape_string($conn,$_POST['worker_name']);
	$worker_ic_no=mysqli_real_escape_string($conn,$_POST['worker_ic_no']);
	$worker_dob=mysqli_real_escape_string($conn,$_POST['worker_dob']);
	$worker_email=mysqli_real_escape_string($conn,$_POST['worker_email']);
	$worker_phone=mysqli_real_escape_string($conn,$_POST['worker_phone']);
	$worker_address=mysqli_real_escape_string($conn,$_POST['worker_address']);
	$worker_salary=mysqli_real_escape_string($conn,$_POST['worker_salary']);
	if ($flag=="Create") {
		$query="INSERT INTO t_worker (sub_dept,worker_ic_no,worker_name,worker_dob,worker_email,worker_phone,worker_address,worker_salary) VALUES ('FO','$worker_ic_no','$worker_name','$worker_dob','$worker_email','$worker_phone','$worker_address',$worker_salary)";
	} 
	else if ($flag=="Edit") {	
		$worker_id=mysqli_real_escape_string($conn,$_POST['worker_id']);			
		$query="UPDATE t_worker SET worker_ic_no=$worker_ic_no, worker_name=$worker_name, worker_dob=$worker_dob, worker_email=$worker_email, worker_email=$worker_email, worker_address=$worker_address, worker_salary=$worker_salary WHERE worker_id=$worker_id";
	} elseif ($flag=="Delete") {
		$worker_id=mysqli_real_escape_string($conn,$_POST['worker_id']);			
		$query="DELETE FROM t_worker WHERE worker_id=$worker_id";
	} else {
		exit("Failed");
	}	
	$data=mysqli_query($conn,$query);
	if ($data) 
		echo 'Success';
	else 
	    echo 'Failed';
?>