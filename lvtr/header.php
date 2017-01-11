<?php
include('config.php');
$site = new Config();
?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<?php echo $site->display_meta_tags(); ?>
    <!-- Bootstrap Core CSS -->
    <link href="https://blackrockdigital.github.io/startbootstrap-modern-business/css/bootstrap.min.css" rel="stylesheet">
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/css/bootstrap.min.css" integrity="sha384-AysaV+vQoT3kOAXZkl02PThvDr8HYKPZhNT5h/CXfBThSRXQ6jW5DO2ekP5ViFdi" crossorigin="anonymous"> -->
    <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/js/bootstrap.min.js" integrity="sha384-BLiI7JTZm+JWlgKa0M0kGRpJbF2J8q+qreVrKBC47e3K6BW78kGLrCkeRX6I9RoK" crossorigin="anonymous"></script> -->

    <!-- Custom CSS -->
    <link href="https://blackrockdigital.github.io/startbootstrap-modern-business/css/modern-business.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="https://blackrockdigital.github.io/startbootstrap-modern-business/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://freelabel.net/css/sass/app.css" rel="stylesheet" type="text/css">




    <script
    src="https://code.jquery.com/jquery-3.1.1.min.js"
    integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
    crossorigin="anonymous"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

<!-- 	<header class="toolbar navbar navbar-default navbar-fixed-top gradient-bg">
		<a href="<?php echo $site->url; ?>"><img src="<?php echo $site->logo; ?>" class="site_logo"></a>
		<h1><?php echo $site->title; ?></h1>
		<p><?php echo $site->description; ?></p>
		<div class="navigation user-navi pull-right">
		</div>
	</header> -->

<?php

include('/home/freelabelnet/public_html/view/themes/demo/content/400/navigation.htm');
include('/home/freelabelnet/public_html/view/themes/demo/content/400/mediaplayer.htm');

// 
