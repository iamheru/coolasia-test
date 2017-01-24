<?php
	session_start();
	if (! isset($_SESSION[ 'role'])) {
		header( "Location: index.php");
	}

	$filter='';
	if ($_SESSION[ 'role']!='Admin' )
	$filter=" WHERE sub_dept='" .$_SESSION[ 'role']. "' ";
	
	include 'config.php';
	include 'header.php';
?>

<!-- BEGIN PAGE CONTAINER-->
<div class="page-content">
    <?php include 'menu.php'; ?>
    <div class="clearfix"></div>
    <div class="content">
        <div class="">
            <div class="col-md-8">
                <div class="grid-body" style="min-height:640px">
                    <div class="row">
                        <div id="map"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="grid simple horizontal red">
                <div class="grid-title">
                    <h4><span class="semi-bold">Tracking</span> Listing</h4>
                </div>
                <div class="grid-body" style="display: block;">
                    <div class="row-fluid">
                        <div class="row">
                            <div id="result" style="overflow:scroll">
                                <table class="table table-hover dataTables example3" id="example">
                                    <thead>
                                        <tr class="b-grey b-t">
                                            <th width="1%" class="center-middle b-grey b-r">No</th>
                                            <th width="30%" class="center-middle b-grey b-r">Date Time</th>
                                            <th width="30%" class="center-middle b-grey b-r">Name</th>
                                            <th class="center-middle b-grey">Location</th>
                                        </tr>
                                        <tbody>
                                            <?php
												$i=1;
												$query="SELECT tracking_id,tracking_datetime,t_site.site_name,t_worker.worker_name FROM t_tracking
														INNER JOIN t_worker ON t_worker.worker_id = t_tracking.worker_id
														INNER JOIN t_site ON t_site.site_id = t_tracking.site_id
														ORDER BY tracking_datetime DESC LIMIT 10";
												$result=mysqli_query($conn,$query);
												while ($data=mysqli_fetch_assoc($result)) {
													echo "<tr>\n";
													echo "<td>$i</td>\n";
													echo "<td>".$data[ 'tracking_datetime']. "</td>";
													echo "<td>".$data[ 'worker_name']."</td>";
													echo "<td>".$data[ 'site_name']. "</td>";
													echo '</tr>';
													$i++;
												}
											?>
                                        </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
</div>
<!-- END PAGE -->


<script src="assets/js/L.Icon.Pulse.js"></script>
<script src="assets/js/TileLayer.Grayscale.js"></script>
<script src="assets/plugins/jquery-datatable/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery-datatable/extra/js/TableTools.min.js" type="text/javascript"></script>
<script type="text/javascript" src="assets/plugins/datatables-responsive/js/datatables.responsive.js"></script>
<script type="text/javascript" src="assets/plugins/datatables-responsive/js/lodash.min.js"></script>
<script src="assets/js/datatable.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function() {
		/* Table Related */
        var table = $('#example').DataTable({
            stateSave: true,
            stateDuration: -1,
            "sDom": "<'row'<'col-md-6'l<'toolbar'>><'col-md-6'f>r>t<'row'<'col-md-12'p i>>",
            "oLanguage": {
                "sLengthMenu": "_MENU_ ",
                "sInfo": "Showing <b>_START_ to _END_</b> of _TOTAL_ entries"
            }
        });

        $('#example_wrapper .dataTables_filter input').addClass("input-medium ");
        $('#example_wrapper .dataTables_length select').addClass("select2-wrapper span12");
        $(".select2-wrapper").select2({
            minimumResultsForSearch: -1
        });

        /* Map Related */
        getMap();

        var pulsingIcon = L.icon.pulse({
            iconSize: [14, 14],
            color: 'red'
        });
        var map = L.map('map').setView([1.315648, 103.87026], 13);
        mapLink =
            '<a href="http://openstreetmap.org">OpenStreetMap</a>';
        L.tileLayer.grayscale(
            'http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; ' + mapLink + ' Contributors',
                maxZoom: 18,
            }).addTo(map);

        function getMap() {
            $.getJSON("get_map.php", function(data) {
                for (var i = 0; i < data.length; i++) {
                    var location = new L.LatLng(data[i].lat, data[i].lng);
                    var name = '<b>Worker:</b><br>' + data[i].worker_name + '<br><b>Time:</b><br>' + data[i].tracking_datetime + '<br><b>Location:</b><br>' + data[i].site_name + '<br>' + data[i].site_address;
                    var marker = L.marker([data[i].lat, data[i].lng], {
                        icon: pulsingIcon
                    }).addTo(map);
                    marker.bindPopup(name);
                }
            })
        }
    });
</script>

<?php include 'footer.php' ?>