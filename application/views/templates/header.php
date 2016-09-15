<html>
    <head>
    <link rel="stylesheet" href="<?php echo site_url("../assets/css/bootstrap-3.3.7/bootstrap.min.css"); ?>">
    <link rel="stylesheet" href="<?php echo site_url("../assets/css/bootstrap-3.3.7/bootstrap-theme.min.css"); ?>">
    <link rel="stylesheet" href="<?php echo site_url("../assets/css/custom.css"); ?>">

    <script src="<?php echo site_url("../assets/js/jquery/jquery-3.1.0.min.js"); ?>"></script>       
    <script src="<?php echo site_url("../assets/js/bootstrap-3.3.7/bootstrap.min.js"); ?>"></script>       
    <?php if (isset($validate_user)) { ?>
    <script src="<?php echo site_url("../assets/js/jquery-validation-1.15.0/jquery.validate.min.js"); ?>"></script>       
    <?php } if (isset($dob_format)) { ?>
    <script src="<?php echo site_url("../assets/js/bootstrap-datepicker-1.6.4/bootstrap-datepicker.min.js"); ?>"></script>       
    <link rel="stylesheet" href="<?php echo site_url("../assets/css/bootstrap-datepicker-1.6.4/bootstrap-datepicker.min.css"); ?>">
    <?php }  if (isset($color_format)) { ?>
    <script src="<?php echo site_url('../assets/js/jquery-minicolors-master/jquery.minicolors.min.js'); ?>"></script>
    <link rel="stylesheet" href="<?php echo site_url('../assets/js/jquery-minicolors-master/jquery.minicolors.css'); ?>">
    <?php } ?>    
    <title><?php echo $title; ?></title>
    </head>
    <body>
	<div id="wrap">    
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="#">CIELO Demo</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
              <ul class="nav navbar-nav">
                <li class="active"><a href="<?php echo site_url(); ?>">Home</a></li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">User Management <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="<?php echo site_url()."/user/index"; ?>">List Users</a></li>
                    <li><a href="<?php echo site_url()."/user/add"; ?>">Add User</a></li>  
                    <li><a href="<?php echo site_url()."/user/add_ajax"; ?>">Add User (AJAX)</a></li>                                         
                  </ul>
                 </li>
               </ul>
            </div><!--/.nav-collapse -->
          </div>
        </nav>
        <div class="container" role="main">
        <div class="page-header">
           <h1>
              <?php if(isset($title)) { echo $title; } ?>
              <?php if(isset($subtitle)) { echo '<small>'.$subtitle.'</small>'; } ?>
           </h1>
        </div>
        <?php if ($this->session->flashdata('message') != "") { ?>      
            <div class="alert alert-<?= $this->session->flashdata('color'); ?> fade in">
            <a href="#" class="close" data-dismiss="alert">&times;</a>
            <?php echo $this->session->flashdata('message'); ?>
            </div>
        <?php } ?>  
        <div>
