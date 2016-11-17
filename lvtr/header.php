<?php
include('config.php');
$site = new Config();
?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<?php echo $site->display_meta_tags(); ?>
  <link rel="stylesheet" href="<?php echo $site->url; ?>css/bootstrap.css" >
	<link type="text/css" href="<?php echo $site->url; ?>css/normalize.css">
  <link rel="stylesheet" href="<?php echo $site->url; ?>css/app.css" >
  <!-- <link type="text/css" href="<?php echo $site->url; ?>css/css/output.css"> -->
	<link type="text/css" href="<?php echo $site->url; ?>vendor/sorich87/bootstrap-tour/build/css/bootstrap-tour.min.css">
	<link rel="stylesheet" href="<?php echo $site->url; ?>css/font-awesome-4.7.0/css/font-awesome.min.css">
    <script type="text/javascript" src="<?php echo $site->url; ?>js/jquery.min.js"></script>
	<script src="<?php echo $site->url; ?>js/bootstrap.min.js"></script>
	<script type="text/javascript" href="<?php echo $site->url; ?>js/isMobile.min.js"></script>
	<?php include('style.php'); ?>
</head>
<body>

<!-- 	<header class="toolbar navbar navbar-default navbar-fixed-top gradient-bg">
		<a href="<?php echo $site->url; ?>"><img src="<?php echo $site->logo; ?>" class="site_logo"></a>
		<h1><?php echo $site->title; ?></h1>
		<p><?php echo $site->description; ?></p>
		<div class="navigation user-navi pull-right">
		</div>
	</header> -->


<nav class="toolbar navbar navbar-default navbar-fixed-top gradient-bg">
  <div class="container-fluid">
    <!-- Logo -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
	  <a class="navbar-brand" href="<?php echo $site->url; ?>"><img src="<?php echo $site->logo; ?>" class="site_logo"></a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
      </ul>

      <!-- Search Input -->
      <form action="<?php echo $site->url; ?>views/search.php" method="GET" class="global-search-bar navbar-form navbar-right">
        <div class="form-group input-group">
          <input name='q' type="text" class=" form-control" placeholder="Search for anything..">
          <div class="input-group-btn"><button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button></div>
        </div>
      </form>

      <!-- navigation links -->
      <ul class="nav navbar-nav navbar-left">
		<?php echo $site->display_navigation($_SESSION['user_name'], $_SESSION['user_active']); ?>
        <!-- <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Separated link</a></li>
          </ul>
        </li> -->
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>









<!-- AUDIO PLAYER BAR -->
<nav style="display:none;" class="toolbar audio-player-toolbar navbar navbar-default navbar-fixed-bottom gradient-bg">
<audio id="global_audio_player" src=""></audio>
  <div class="container-fluid">
    <!-- Logo -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
	  <a class="navbar-brand" href="#"><span href="#" id="audio_player_text"></span></a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
      <ul class="nav navbar-nav">
        
      </ul>
      <ul class="nav navbar-nav play-progress-wrap">
        <li class="progress">
          <div class="progress-bar play-progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 67%;">67% Uploaded</div>
        </li>
      </ul>

      <ul class="nav navbar-nav navbar-right">
        <li><a class="currentTime" href="#">0:00</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-ellipsis-h"></i></a>
          <ul class="dropdown-menu controls">
            <li><a href="#" data-ctrl="expand" class="btn btn-link"><i class="fa fa-desktop"></i></a></li>
            <li><a href="#" data-ctrl="play" class="btn btn-link"><i class="fa fa-pause"></i></a></li>
            <li><a href="#" data-ctrl="play" class="btn btn-link play-radio"><i class="fa fa-signal"></i></a></li>
            <li role="separator" class="divider"></li>
          </ul>
        </li>
      </ul>


      <!-- navigation links -->
      <ul class=" nav navbar-nav navbar-right">
        <!-- <li><a href="#"><i class="fa fa-fast-backward"></i></a></li> -->
        <!-- <li><a href="#"><i class="fa fa-fast-forward"></i></a></li> -->
      </ul>
      <!-- navigation links -->
<!--       <ul class="nav navbar-nav navbar-right">
      </ul> -->
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
