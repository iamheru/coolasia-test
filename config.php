<?php 
$dbhostname = "localhost"; 
$dbusername = "root"; 
$dbpassword = "";
$dbdatabase = "coolasia"; 
$conn = new mysqli($dbhostname,$dbusername,$dbpassword,$dbdatabase); 
if (!$conn) {
	die ("Error conecting to database server"); 
	exit;
}
?>