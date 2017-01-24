<?php session_start(); if (! isset($_SESSION[ 'role'])) { header( "Location: index.php"); } include 'config.php'; include 'header.php'; $flag="Create" ; $site_id='' ; //$sub_dept='FO' ; $site_name='' ; $site_address='' ; $site_lat=0.000000; $site_lng=0.000000; if (isset($_GET[ 'site_id'])) { $site_id=mysqli_real_escape_string($conn,$_GET[ 'site_id']); $query="SELECT site_id,site_name,site_address,site_lat,site_lng FROM t_site WHERE site_id=$site_id" ; $result=mysqli_query($conn,$query); $data=mysqli_fetch_assoc($result); $site_id=$data[ 'site_id']; $site_name=$data[ 'site_name']; $site_address=$data[ 'site_address']; $site_lat=$data[ 'site_lat']; $site_lng=$data[ 'site_lng']; $flag="Edit" ; } ?>

<!-- BEGIN PAGE CONTAINER-->
<div class="page-content">
    <?php include 'menu.php'; ?>
    <div class="clearfix"></div>
    <div class="content">
        <div class="page-title">
            <a href="sites-list.php"><i class="icon-custom-left"></i></a>
            <h3>Form - <span class="semi-bold">Site</span></h3>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="grid simple">
                    <div class="grid-body no-border">
                        <br>
                        <form class="" id="form_iconic_validation">
                            <div class="row column-seperation">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label semi-bold">Name</label>
                                        <input name="site_name" id="site_name" type="text" class="form-control" value="<?php echo $site_name ?>">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label semi-bold">Address</label>
                                        <textarea name="site_address" id="site_address" class="form-control">
                                            <?php echo $site_address ?>
                                        </textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label semi-bold">Latitude</label>
                                        <input name="site_lat" id="site_lat" type="text" class="form-control auto" value="<?php echo $site_lat ?>">
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label semi-bold">Longitude</label>
                                        <input name="site_lng" id="site_lng" type="text" class="form-control auto" value="<?php echo $site_lng ?>">
                                    </div>

                                </div>
                            </div>
                            <div class="form-actions">
                                <?php if (isset($_GET[ 'site_id'])) { ?>
                                <div class="pull-left">
                                    <button class="btn btn-danger btn-cons" id="delete" type="button">Delete</button>
                                    <div class="pull-right hide" id="del-ask" style="margin-left:20px;padding-top:5px;">Are you sure? &nbsp;&nbsp;
                                        <button class="btn btn-small btn-info" id="delete-yes" type="button">Yes</button>&nbsp;&nbsp;
                                        <button class="btn btn-small btn-warning" id="delete-no" type="button">No</button>
                                    </div>
                                </div>
                                <?php } ?>
                                <div class="pull-right">
                                    <div class="pull-left hide" id="sent-success">
                                        <div class="alert alert-success" style="margin-right:20px">Data Update <b>Success !!</b>
                                        </div>
                                    </div>
                                    <div class="pull-left hide" id="sent-failed">
                                        <div class="alert alert-error" style="margin-right:20px">Data Update <b>Failed !!!</b>
                                        </div>
                                    </div>
                                    <button class="btn btn-success btn-cons" id="save" type="button">Save</button>
                                    <a href="sites-list.php" class="btn btn-cons">Cancel</a>
                                </div>
                            </div>
                            <input id="flag" name="flag" type="hidden" value="<?php echo $flag?>">
                            <input name="site_id" type="hidden" value="<?php echo $site_id?>">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- END PAGE -->

<script src="assets/plugins/jquery-autonumeric/autoNumeric.js" type="text/javascript"></script>
<script src="assets/js/form_validations_sites.js" type="text/javascript"></script>
<script src="assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js" type="text/javascript"></script>

<script type="text/javascript">
    $(document).ready(function() {
        getLocation();

        function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(onGeoSuccess, onGeoError);
            } else {
                alert("Your browser or device doesn't support Geolocation");
            }
        };

        function onGeoSuccess(event) {
            document.getElementById("site_lat").value = event.coords.latitude;
            document.getElementById("site_lng").value = event.coords.longitude;
        };


        function onGeoError(event) {
            alert("Error code " + event.code + ". " + event.message);
        };
        $(".auto").autoNumeric('init', {
            mDec: '6'
        });
        $(".input-append.date").datepicker({
            autoclose: true,
            todayHighlight: true,
            format: 'yyyy-mm-dd'
        });
		
            $('#save').click(function() {
                if ($('#form_iconic_validation').valid()) {
                    $.post("add-edit-sites.php", $('#form_iconic_validation').serialize(), function(data) {
                        if (data == "Success") {
                            $('#sent-success').toggleClass('hide');
                            setTimeout(function() {
                                window.location.href = "sites-list.php";
                            }, 2000);
                        } else {
                            $('#sent-failed').toggleClass('hide');
                            setTimeout(function() {
                                $('#sent-failed').toggleClass('hide');
                            }, 2000);
                        }
                    });
                }
            });

        $("#delete").click(function() {
            $('#del-ask').removeClass('hide');
        });


        $("#delete-no").click(function() {
            $('#del-ask').addClass('hide');
        });

        $('#delete-yes').click(function() {
            $('#flag').val('Delete');
            $.post("add-edit-sites.php", $('#form_iconic_validation').serialize(), function(data) {
                if (data == "Success") {
                    window.location.href = "sites-list.php";
                } else {
                    $('#sent-failed').toggleClass('hide');
                    setTimeout(function() {
                        $('#sent-failed').toggleClass('hide');
                    }, 2000);
                }
            });
        });

    });

</script>

<?php include 'footer.php' ?>
