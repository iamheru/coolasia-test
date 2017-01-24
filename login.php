<?php 
ob_start();
	include 'config.php';
$usr='admin';
$pwd='anything';
$username=mysqli_real_escape_string($conn,$_POST['txtusername']);
$password=mysqli_real_escape_string($conn,$_POST['txtpassword']);
$dept=mysqli_real_escape_string($conn,$_POST['department']);
//$query="SELECT users_name,users_pass,users_role FROM t_user WHERE users_name='$username' AND users_pass='$password' LIMIT 1";
//$result=mysqli_pg_query($query);
//if ($username==$usr && $password==$pwd) {
	session_set_cookie_params(9000);
	session_start();
	session_regenerate_id();
//	$_SESSION['user']=$data['users_name'];
//	$_SESSION['role']=$data['users_role'];
	$_SESSION['user']=$usr;
	$_SESSION['role']=$dept;
	header ("location:main.php");
//} else {
//  header ("location:index.php?invalid=true");
//}

ob_end_flush();
?>
