<html>
    <head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo site_url("../assets/css/custom.css"); ?>">
    <script src="https://code.jquery.com/jquery-3.1.0.min.js" integrity="sha256-cCueBR6CsyA4/9szpPfrX3s49M9vUU5BgtiJj06wt/s=" crossorigin="anonymous"></script>       
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <?php if (isset($validate_user)) { ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.15.1/jquery.validate.min.js"  crossorigin="anonymous"></script>
    <?php } if (isset($dob_format)) { ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.min.js"  crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.min.css" crossorigin="anonymous">
    <?php }  if (isset($color_format)) { ?>
    <script src="<?php echo site_url('../assets/js/jquery-minicolors-master/jquery.minicolors.min.js'); ?>"></script>
    <link rel="stylesheet" href="<?php echo site_url('../assets/js/jquery-minicolors-master/jquery.minicolors.css'); ?>">
    <?php } ?>    
    <title><?php echo $title; ?></title>
    </head>
    <body>
    <!-- Wrap all page content here -->
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

