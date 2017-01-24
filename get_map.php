<?php 
	include "config.php";
	$query="SELECT tracking_id,tracking_datetime,t_site.site_name,t_site.site_lat AS lat,t_site.site_lng AS lng, t_site.site_address, t_worker.worker_name FROM t_tracking
					INNER JOIN t_worker ON t_worker.worker_id = t_tracking.worker_id
					INNER JOIN t_site ON t_site.site_id = t_tracking.site_id
					ORDER BY tracking_datetime DESC LIMIT 10";
	$result=mysqli_query($conn,$query);
	$rows = array();
		while($data = mysqli_fetch_array($result)) {
			$rows[] = $data;
		}
	echo json_encode($rows);
	$db = NULL;
?> 

