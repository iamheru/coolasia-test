<?php session_start(); if (! isset($_SESSION[ 'role'])) { header( "Location: index.php"); } include 'config.php'; include 'header.php'; $flag="Create" ; $worker_id='' ; $worker_ic_no='' ; $worker_name='' ; $worker_dob='' ; $worker_email='' ; $worker_phone='' ; $worker_address='' ; $worker_salary=0; if (isset($_GET[ 'worker_id'])) { $worker_id=mysqli_real_escape_string($conn,$_GET[ 'worker_id']); $query="SELECT worker_id,worker_ic_no,worker_name,worker_dob,worker_email,worker_phone,worker_address,worker_salary FROM t_worker WHERE worker_id=$worker_id" ; $result=mysqli_query($conn,$query); $data=mysqli_fetch_assoc($result); $worker_id=$data[ 'worker_id']; $worker_ic_no=$data[ 'worker_ic_no']; $worker_name=$data[ 'worker_name']; $worker_dob=$data[ 'worker_dob']; $worker_email=$data[ 'worker_email']; $worker_phone=$data[ 'worker_phone']; $worker_address=$data[ 'worker_address']; $worker_salary=$data[ 'worker_salary']; $flag="Edit" ; } ?>
<!-- BEGIN PAGE CONTAINER-->
<div class="page-content">
    <?php include 'menu.php'; ?>
    <div class="clearfix"></div>
    <div class="content">
        <div class="page-title">
            <a href="workers-list.php"><i class="icon-custom-left"></i></a>
            <h3>Form - <span class="semi-bold">Worker</span></h3>
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
                                        <input name="worker_name" id="worker_name" type="text" class="form-control" value="<?php echo $worker_name ?>">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label semi-bold">IC Number</label>
                                        <input name="worker_ic_no" id="worker_ic_no" type="text" class="form-control" value="<?php echo $worker_ic_no ?>">
                                    </div>

                                    <div class="input-append success date col-md-11 col-lg-11 col-xs-10 no-padding">
                                        <label class="form-label semi-bold">Date of Birth</label>
                                        <input name="worker_dob" id="worker_dob" type="text" class="form-control" value="<?php echo $worker_dob ?>">
                                        <span class="add-on"><span class="arrow"></span><i class="fa fa-th"></i>
                                        </span>
                                    </div>
                                    <br>
                                    <br>
                                    <br>
                                    <br>
                                    <div class="form-group">
                                        <label class="form-label semi-bold">Email</label>
                                        <input name="worker_email" id="worker_email" type="text" class="form-control" value="<?php echo $worker_email ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label semi-bold">Phone</label>
                                        <input name="worker_phone" id="worker_phone" type="text" class="form-control" value="<?php echo $worker_phone ?>">
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label semi-bold">Address</label>
                                        <textarea name="worker_address" id="worker_address" class="form-control">
                                            <?php echo $worker_address ?>
                                        </textarea>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label semi-bold">Salary / hour</label>
                                        <input name="worker_salary" id="worker_salary" type="text" class="form-control auto" value="<?php echo $worker_salary ?>">
                                    </div>

                                </div>
                            </div>
                            <div class="form-actions">
                                <?php if (isset($_GET[ 'worker_id'])) { ?>
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
                                    <a href="workers-list.php" class="btn btn-cons">Cancel</a>
                                </div>
                            </div>
                            <input id="flag" name="flag" type="hidden" value="<?php echo $flag?>">
                            <input name="worker_id" type="hidden" value="<?php echo $worker_id?>">
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
<script src="assets/js/form_validations_workers.js" type="text/javascript"></script>
<script src="assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js" type="text/javascript"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $(".auto").autoNumeric('init', {
            mDec: '0'
        });
        $(".input-append.date").datepicker({
            autoclose: true,
            todayHighlight: true,
            format: 'yyyy-mm-dd'
        });

        $('#save').click(function() {
            if ($('#form_iconic_validation').valid()) {
                $.post("add-edit-workers.php", $('#form_iconic_validation').serialize(), function(data) {
                    if (data == "Success") {
                        $('#sent-success').toggleClass('hide');
                        setTimeout(function() {
                            window.location.href = "workers-list.php";
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
            $.post("add-edit-workers.php", $('#form_iconic_validation').serialize(), function(data) {
                if (data == "Success") {
                    window.location.href = "workers-list.php";
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
