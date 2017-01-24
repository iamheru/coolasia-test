<?php 
$dbhostname = "YOUR DB HOSTNAME"; 
$dbusername = "YOUR DB USERNAME"; 
$dbpassword = "YOUR DB PASSWORD";
$dbdatabase = "YOUR DB"; 
$conn = new mysqli($dbhostname,$dbusername,$dbpassword,$dbdatabase); 
if (!$conn) {
	die ("Error connecting to database server"); 
	exit;
}
?>
