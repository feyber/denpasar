<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Dashboard</title>

    <link href="<?php echo BaseURL() ?>/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo BaseURL() ?>/fonts/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo BaseURL() ?>/css/animate.min.css" rel="stylesheet">
    <link href="<?php echo BaseURL() ?>/css/custom.css" rel="stylesheet">
    <link href="<?php echo BaseURL() ?>/css/icheck/flat/green.css" rel="stylesheet" />
    <link href="<?php echo BaseURL() ?>/css/floatexamples.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo BaseURL() ?>/css/maps/jquery-jvectormap-2.0.3.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo BaseURL() ?>/css/select/select2.min.css" rel="stylesheet">
    <link href="<?php echo BaseURL() ?>/css/jasny-bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="<?php echo BaseURL() ?>/css/default.css" rel="stylesheet">
    <link href="<?php echo BaseURL() ?>/css/progressbar/bootstrap-progressbar-3.3.0.css" rel="stylesheet" type="text/css">
</head>

<body class="nav-md">
  <div class="container body">

      <div class="main_container">

          <!-- page content -->
          <div class="col-md-12" style="margin-top: 10%">
              <div class="col-middle">
                  <div class="text-center">
                      <h1 class="error-number">Server Error</h1>
                      <h2>Internal Server Error</h2>
                      <p>
                        We track these errors automatically, but if the problem persists feel free to contact us. In the meantime, try refreshing.
                      </p>
                  </div>

                  <p align="center" style="margin-top: 20px;">
                      <button class="btn btn-default btn-round">Homepage</button>
                  </p>
              </div>
          </div>
          <!-- /page content -->

      </div>
      <!-- footer content -->
  </div>

  <div id="custom_notifications" class="custom-notifications dsp_none">
      <ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group"></ul>
      <div class="clearfix"></div>
      <div id="notif-group" class="tabbed_notifications"></div>
  </div>

  <?php
    include ("javascript.php");
  ?>
</body>