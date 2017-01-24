<?php 
	session_start();
	if (! isset($_SESSION['role'])) {
		header("Location: index.php");
	}
	$filter='';
	if ($_SESSION['role']!='Admin')
			$filter=" WHERE sub_dept='".$_SESSION['role']."' ";
	include 'config.php';
	include 'header.php';
?>

<!-- BEGIN PAGE CONTAINER-->
<div class="page-content">
    <?php include 'menu.php'; ?>
    <div class="clearfix"></div>
    <div class="content">
        <div class="">
            <div class="grid simple horizontal red">
                <div class="grid-title">
                    <h4><span class="semi-bold">Worker</span> Listing</h4>
                    <?php if ($_SESSION[ 'role']=='Admin' ) { echo '<div class="tools"><a href="input-workers.php"><button type="button" id="save" class="btn btn-primary btn-cons"><i class="fa fa-plus"></i> New Worker</button></a></div>'; } ?>
                </div>
                <div class="grid-body" style="display: block;">
                    <div class="row-fluid">
                        <div class="row">
                            <div id="result" style="overflow:scroll">
                                <table class="table table-hover dataTables example3" id="example">
                                    <thead>
                                        <tr class="b-grey b-t">
                                            <th width="1%" class="center-middle b-grey b-r">No</th>
                                            <th width="15%" class="center-middle b-grey b-r">Name</th>
                                            <th width="5%" class="center-middle b-grey b-r">IC Number</th>
                                            <th width="10%" class="center-middle b-grey b-r">DOB</th>
                                            <th width="10%" class="center-middle b-grey b-r">Email</th>
                                            <th width="10%" class="center-middle b-grey b-r">Phone Number</th>
                                            <th width="20%" class="center-middle b-grey b-r">Address</th>
                                            <th width="10%" class="center-middle b-grey">Salary / hr</th>
                                            <?php
											if ($_SESSION[ 'role']=='Admin' ) {
												echo '<th width="1%" class="center-middle b-grey b-l"></th>
													  <th width="1%" class="center-middle b-grey"></th>';
											}
											?>
                                        </tr>
                                        <tbody>
                                            <?php
											$i=1;
											$query="SELECT worker_id,worker_ic_no,worker_name,worker_dob,worker_email,worker_phone,worker_address,worker_salary,sub_dept FROM t_worker$filter ORDER BY worker_id DESC";
											$result=mysqli_query($conn,$query);
												while ($data=mysqli_fetch_assoc($result)) {
													echo "<tr>\n";
													echo "<td>$i</td>\n";
													echo "<td>".$data['worker_name']."</td>";
													echo "<td>".$data['worker_ic_no']."</td>";
													echo "<td class='pull-center'>".$data['worker_dob']."</td>";
													echo "<td>".$data['worker_email']."</td>";
													echo "<td>".$data['worker_phone']."</td>\n";
													echo "<td>".$data['worker_address']."</td>";
													echo "<td class='currency'>".$data['worker_salary']."</td>";
													if ($_SESSION['role']=='Admin' ) {
														echo '<td><a href="input-workers.php?worker_id='.$data['worker_id'].'"><button class="btn btn-success" type="button"><i class="fa fa-pencil"></i></button></a></td>';
														echo '<td><a href="input-workers.php?worker_id='.$data[ 'worker_id']. '"><button class="btn btn-danger" type="button"><i class="fa fa-times"></i></button></a></td>';
													}
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

<script src="assets/plugins/jquery-datatable/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery-datatable/extra/js/TableTools.min.js" type="text/javascript"></script>
<script type="text/javascript" src="assets/plugins/datatables-responsive/js/datatables.responsive.js"></script>
<script type="text/javascript" src="assets/plugins/datatables-responsive/js/lodash.min.js"></script>
<script src="assets/js/datatable.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function() {
        /* Table Related*/
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
    });

</script>

<?php include 'footer.php' ?>
