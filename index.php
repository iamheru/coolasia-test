<!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<meta charset="utf-8" />
<title>Coolasia</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta content="" name="description" />
<meta content="" name="author" />
<!-- BEGIN CORE CSS FRAMEWORK -->
<link href="assets/plugins/boostrapv3/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="assets/plugins/boostrapv3/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
<link href="assets/plugins/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css"/>
<!-- END CORE CSS FRAMEWORK -->
<!-- BEGIN CSS TEMPLATE -->
<link href="assets/css/style.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/responsive.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/custom-icon-set.css" rel="stylesheet" type="text/css"/>
<link href="assets/plugins/bootstrap-select2/select2.css" rel="stylesheet" type="text/css" media="screen">
<!-- END CSS TEMPLATE -->
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="error-body no-top">
<div class="container">
  <div class="row login-container">  
		 <form id="login-form" class="login-form" action="login.php" method="post">
	<div class="col-md-7 col-md-offset-4">
		  <div class="form-group col-md-6">      
      <h2 class="pull-center">Login <span class="semi-bold">Area</span></h2><br>
            <div class="controls">
				<div class="input-with-icon  right">                                       
					<i class="fa fa-user"></i>
					<input type="text" name="txtusername" id="txtusername" class="form-control" placeholder="Username (input anything)">                                 
				</div>
            </div>
      </div>
          </div>
		  <div class="col-md-7 col-md-offset-4">
          <div class="form-group col-md-6">
            <div class="controls">
				<div class="input-with-icon right">                                       
					<i class="fa fa-key"></i>
					<input type="password" name="txtpassword" id="txtpassword" class="form-control" placeholder="Password (input anything)">                                 
				</div>
            </div>
          </div>
      </div>
		  <div class="col-md-7 col-md-offset-4">
            <div class="form-group col-md-6">
            <div class="controls">
                <select name="department" id="department" class="select2 form-control">
                          <option value="">Select Your Login Role</option>
                          <option value="FO">Site Admin</option>
						  <option value="Admin">Admin</option>
                </select>
          </div>
            </div>
          </div>
          <div class="col-md-7 col-md-offset-4">
            <div class="col-md-6">
              <button class="btn btn-large btn-success btn-cons btn-block" id="submit" type="submit">Login</button>
            </div>
          </div>
		  </form>
        </div>
		<?php
			if (isset($_GET['invalid'])){
			echo '
			<div class="col-md-7 col-md-offset-4">
            <div class="col-md-6">
			<div class="alert alert-error" style="margin-right:20px">Wrong Username or Password !!</b></div></div></div>';
			}
		?>
  </div>
<!-- END CONTAINER -->
<!-- BEGIN CORE JS FRAMEWORK-->
<script src="assets/plugins/jquery-1.8.3.min.js" type="text/javascript"></script>
<script src="assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
<script src="assets/plugins/bootstrap-select2/select2.min.js" type="text/javascript"></script>
<script src="assets/js/login.js" type="text/javascript"></script>
<script  type="text/javascript">
$(document).ready(function () {   
	$("#role").select2();
});
</script>
<!-- BEGIN CORE TEMPLATE JS -->
<!-- END CORE TEMPLATE JS -->
</body>
</html>