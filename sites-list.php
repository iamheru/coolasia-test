<?php session_start(); if (! isset($_SESSION[ 'role'])) { header( "Location: index.php"); } $filter='' ; if ($_SESSION[ 'role']!='Admin' ) $filter=" WHERE sub_dept='" .$_SESSION[ 'role']. "' "; include 'config.php'; include 'header.php'; ?>

<!-- BEGIN PAGE CONTAINER-->
<div class="page-content">
    <?php include 'menu.php'; ?>
    <div class="clearfix"></div>
    <div class="content">

        <div class="">

            <div class="grid simple horizontal red">
                <div class="grid-title">
                    <h4><span class="semi-bold">Site</span> Listing</h4>
                    <?php if ($_SESSION[ 'role']=='Admin' ) { echo '<div class="tools"><a href="input-sites.php"><button type="button" id="save" class="btn btn-primary btn-cons"><i class="fa fa-plus"></i> New Site</button></a></div>'; } ?>
                </div>
                <div class="grid-body" style="display: block;">
                    <div class="row-fluid">
                        <div class="row">
                            <div id="result" style="overflow:scroll">
                                <table class="table table-hover dataTables example3" id="example">
                                    <thead>
                                        <tr class="b-grey b-t">
                                            <th width="1%" class="center-middle b-grey b-r">No</th>
                                            <th width="30%" class="center-middle b-grey b-r">Site Name</th>
                                            <th class="center-middle b-grey b-r">Address</th>
                                            <th class="center-middle b-grey b-r">Lat</th>
                                            <th class="center-middle b-grey">Lang</th>
                                            <?php if ($_SESSION[ 'role']=='Admin' ) { echo '<th width="5%" class="center-middle b-grey b-l"></th>
                    <th width="5%" class="center-middle b-grey"></th>'; } ?>
                                        </tr>
                                        <tbody>
                                            <?php $i=1; $query="SELECT site_id,site_name,site_address,site_lat,site_lng,sub_dept FROM t_site$filter ORDER BY site_id DESC" ; $result=mysqli_query($conn,$query); while ($data=mysqli_fetch_assoc($result)) { echo "<tr>\n"; echo "<td>$i</td>\n"; echo "<td>".$data[ 'site_name']. "</td>"; echo "<td>".$data[ 'site_address']. "</td>"; echo "<td>".$data[ 'site_lat']. "</td>\n"; echo "<td>".$data[ 'site_lng']. "</td>\n"; if ($_SESSION[ 'role']=='Admin' ) { echo '<td>
                      <a href="input-sites.php?site_id='.$data[ 'site_id']. '"><button class="btn btn-success" type="button"><i class="fa fa-pencil"></i></button></a>                 
                    </td>'; echo '<td>
                      <a href="input-sites.php?site_id='.$data[ 'site_id']. '"><button class="btn btn-danger" type="button"><i class="fa fa-times"></i></button></a>                 
                    </td>					
					'; } echo '</tr>'; $i++; } ?>
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

<div class="modal fade" id="report-modal">
    <div class="modal-dialog">
        <div class="modal-content">
        </div>
    </div>
</div>

<script src="assets/plugins/jquery-datatable/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery-datatable/extra/js/TableTools.min.js" type="text/javascript"></script>
<script type="text/javascript" src="assets/plugins/datatables-responsive/js/datatables.responsive.js"></script>
<script type="text/javascript" src="assets/plugins/datatables-responsive/js/lodash.min.js"></script>
<script src="assets/js/datatable.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function() {
        var table = $('#example,#example2').DataTable({
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
