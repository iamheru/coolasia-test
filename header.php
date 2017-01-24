<!DOCTYPE html>
<html>
<head>
    <title>Coolasia</title>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile meta tags-->
    <meta name="HandheldFriendly" content="True">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="MobileOptimized" content="320" />
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta http-equiv="cleartype" content="on">
    <meta content="Sample test result for Coolasia Indonesia" name="description" />
    <meta content="Heru Hermawan" name="author" />

    <!-- NEED TO WORK ON -->
    <link href="assets/plugins/boostrapv3/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/boostrapv3/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/bootstrap-select2/select2.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="assets/plugins/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/style.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/custom-icon-set.css" rel="stylesheet" type="text/css" />

    <!-- BEGIN CORE JS FRAMEWORK-->
    <script src="assets/plugins/jquery-1.8.3.min.js" type="text/javascript"></script>
    <script src="assets/plugins/jquery-ui/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
    <script src="assets/plugins/boostrapv3/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="assets/plugins/breakpoints.js" type="text/javascript"></script>
    <script src="assets/plugins/jquery-unveil/jquery.unveil.min.js" type="text/javascript"></script>
    <script src="assets/plugins/jquery-block-ui/jqueryblockui.js" type="text/javascript"></script>
    <!-- END CORE JS FRAMEWORK -->

    <!-- BEGIN PAGE LEVEL JS -->
    <script src="assets/plugins/bootstrap-select2/select2.min.js" type="text/javascript"></script>
    <script src="assets/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
    <!-- END PAGE LEVEL PLUGINS -->

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.0.2/dist/leaflet.css" />
    <script type="text/javascript" src="https://unpkg.com/leaflet@1.0.2/dist/leaflet.js"></script>
    <!-- END NEED TO WORK ON -->

</head>

<body class="hide-sidebar horizontal-menu" style="background-color:#E5E9EC">
    <!-- BEGIN HEADER -->
    <div class="header navbar navbar-inverse">
        <!-- BEGIN TOP NAVIGATION BAR -->
        <div class="navbar-inner">
            <!-- BEGIN NAVIGATION HEADER -->
            <div class="header-seperation">
                <!-- BEGIN MOBILE HEADER -->

                <!-- END MOBILE HEADER -->
                <!-- BEGIN LOGO -->
                <a href="main.php" class="pull-left p-t-20 p-l-20">
					LOGO
				</a>
                <!-- END LOGO -->
                <!-- BEGIN LOGO NAV BUTTONS -->
                <ul class="nav pull-right mobile">
                    <li class="mobile-role">Signed in as <span class="semi-bold"><?php
					if ($_SESSION['role']=='FO') {
					echo 'Site Admin';
					} else {
					echo 'Admin';
					}
					?></span>
                    </li>
                    <li>
                        <a href="logout.php">
                            <i class="fa fa-power-off"></i>&nbsp;&nbsp;Signout
                        </a>
                    </li>
                </ul>
                <!-- END LOGO NAV BUTTONS -->
            </div>
            <!-- END NAVIGATION HEADER -->

            <!-- BEGIN CONTENT HEADER -->
            <div class="header-quick-nav">
                <!-- BEGIN HEADER LEFT SIDE SECTION -->
                <div class="pull-left">
                    <!-- BEGIN HEADER QUICK LINKS -->
                    <ul class="nav quick-section">
                        <li class="quicklinks">
                            <!-- BEGIN LOGO -->
                            <a href="main.php">
					LOGO
				</a>
                            <!-- END LOGO -->
                        </li>
                        <li class="m-r-10 input-prepend inside search-form no-boarder">
                            <span class="add-on"></span>
                        </li>
                    </ul>
                    <!-- BEGIN HEADER QUICK LINKS -->
                </div>
                <!-- END HEADER LEFT SIDE SECTION -->
                <!-- BEGIN HEADER RIGHT SIDE SECTION -->
                <div class="pull-right">

                    <!-- BEGIN HEADER NAV BUTTONS -->
                    <ul class="nav quick-section">
                        <!-- BEGIN SETTINGS -->
                        <li class="quicklinks">Signed in as
                            <span class="semi-bold">
					<?php
					if ($_SESSION['role']=='FO') {
					echo 'Site Admin';
					} else {
					echo 'Admin';
					}
					?></span>
                        </li>
                        <li class="quicklinks"><span class="h-seperate"></span>
                        </li>
                        <li class="quicklinks">
                            <a data-toggle="dropdown" class="dropdown-toggle pull-right" href="#" id="user-options">
                                <span class="iconset top-settings-dark">
								
							</span>
                            </a>
                            <ul class="dropdown-menu pull-right" role="menu" aria-labelledby="user-options">
                                <li><a href="#" data-toggle="modal" data-target="#myModal">My Account</a>
                                </li>
                                <li class="divider"></li>
                                <li><a href="logout.php"><i class="fa fa-power-off"></i>&nbsp;&nbsp;Signout</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <!-- END HEADER NAV BUTTONS -->
                </div>
                <!-- END HEADER RIGHT SIDE SECTION -->
            </div>
            <!-- END CONTENT HEADER -->
        </div>
        <!-- END TOP NAVIGATION BAR -->
    </div>
    <!-- END HEADER -->

    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                    <br>
                    <h4 id="myModalLabel" class="semi-bold">we are sorry...</h4>
                    <p class="no-margin">currently this feature was disabled</p>
                    <br>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

    <!-- BEGIN CONTENT -->
    <!-- BEGIN CONTENT -->
    <div class="page-container row-fluid">
