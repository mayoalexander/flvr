<?php

include_once('/kunden/homepages/0/d643120834/htdocs/config/index.php');
$config = new Blog(); 
$site = $config->getSiteData($config->site);
$site['media']['photos']['front-page'] = $config->getPhotoAds($site['creator'], 'freelabel front',8);

// logo hack
$site['logo'] = 'http://freelabel.net/upload/server/php/upload/alex-mayo-logo-unicolor-150--395391985-.png';
$site['base_url'] = 'http://freelabel.net/landing/view/syn/';

?><!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en-US">
<!--<![endif]-->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<title>Alexander Mayo</title>
	<meta name="description" content="Alexander Mayo">
	<meta name="keywords" content="html template, bootstrap, ui kit, sass" />
	<meta name="author" content="Alexander Mayo" />
	<!-- favicon generated by http://realfavicongenerator.net/ -->
	<link rel="apple-touch-icon" sizes="57x57" href="<?php echo $site['logo']; ?>">
	<link rel="apple-touch-icon" sizes="60x60" href="<?php echo $site['logo']; ?>">
	<link rel="apple-touch-icon" sizes="72x72" href="<?php echo $site['logo']; ?>">
	<link rel="apple-touch-icon" sizes="76x76" href="<?php echo $site['logo']; ?>">
	<link rel="apple-touch-icon" sizes="114x114" href="<?php echo $site['logo']; ?>">
	<link rel="apple-touch-icon" sizes="120x120" href="<?php echo $site['logo']; ?>">
	<link rel="apple-touch-icon" sizes="144x144" href="<?php echo $site['logo']; ?>">
	<link rel="apple-touch-icon" sizes="152x152" href="<?php echo $site['logo']; ?>">
	<link rel="apple-touch-icon" sizes="180x180" href="<?php echo $site['logo']; ?>">
	<link rel="icon" type="image/png" href="<?php echo $site['logo']; ?>" sizes="32x32">
	<link rel="icon" type="image/png" href="<?php echo $site['logo']; ?>" sizes="194x194">
	<link rel="icon" type="image/png" href="<?php echo $site['logo']; ?>" sizes="96x96">
	<link rel="icon" type="image/png" href="<?php echo $site['logo']; ?>" sizes="192x192">
	<link rel="icon" type="image/png" href="<?php echo $site['logo']; ?>" sizes="16x16">
	<link rel="manifest" href="<?php echo $site['base_url']; ?>">
	<link rel="mask-icon" href="<?php echo $site['base_url']; ?>img/favicon/safari-pinned-tab.svg" color="#5bbad5">
	<link rel="shortcut icon" href="<?php echo $site['base_url']; ?>">
	<meta name="msapplication-TileColor" content="#66e0e5">
	<meta name="msapplication-TileImage" content="<?php echo $site['base_url']; ?>img/favicon/mstile-144x144.png">
	<meta name="msapplication-config" content="<?php echo $site['base_url']; ?>img/favicon/browserconfig.xml">
	<meta name="theme-color" content="#ffffff">
	<!-- end favicon links -->
	<link rel="stylesheet" href="<?php echo $site['base_url']; ?>css/bootstrap.min.css" />
	<link rel="stylesheet" href="<?php echo $site['base_url']; ?>css/normalize.min.css">
	<link rel="stylesheet" href="<?php echo $site['base_url']; ?>css/animate.min.css">
	<link rel="stylesheet" href="<?php echo $site['base_url']; ?>css/flickity.min.css">
	<link rel="stylesheet" href="<?php echo $site['base_url']; ?>css/styles.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://cdn.rawgit.com/konpa/devicon/master/devicon.min.css">
	<style type="text/css">
		.logo img {
			max-width: 35px;
			border-radius: 2px;
		}
		.logo span {
			margin-left:1em;
			color:#e3e3e3;
			position: relative;
			bottom:13px;
		}
		.freebies {
			padding-bottom: 0;
		}
		.skill-languages i {
			margin:auto;
			font-size: 5em;
		}
		.like-button-wrapper {
			display: none;
		}
		article img {
		    -webkit-filter: blur(5px); /* Chrome, Safari, Opera */
		    filter: blur(5px);
		    -webkit-filter: brightness(60%); /* Chrome, Safari, Opera */
		    filter: brightness(60%);
		}\

		@media (max-width: 600px) {
		  .skill-languages figure {
		    margin-bottom: 2em;
		  }
		  .skill-languages i {
		    font-size:3em;
		  }
		}
	</style>
</head>

<body>
	<!--[if lt IE 8]>
	<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->
	<div class="container-fluid">
		<div class="row">
			<div class="header-nav-wrapper">
				<div class="logo">
					<a href="/index.html"><img src="<?php echo $site['logo']; ?>" alt="<?php echo $site['name']; ?>"></a> <span>Alexander Mayo</span>
				</div>
				<div class="primary-nav-wrapper">
					<nav>
						<ul class="primary-nav">
							<li><a href="#intro">About</a></li>
							<li><a href="#team">Skills</a></li>
							<li><a href="#recentwork">Recent Work</a></li>
							<!-- <li><a href="#freebies">Contact</a></li> -->
						</ul>
					</nav>
					<div class="secondary-nav-wrapper">
						<ul class="secondary-nav">
							<li class="subscribe"><a href="#get-started">Contact</a></li>
							<li class="search"><a href="#search" class="show-search"><i class="fa fa-search"></i></a></li>
						</ul>
					</div>
					<div class="search-wrapper">
						<ul class="search">
							<li>
								<input type="text" id="search-input" placeholder="Start typing then hit enter to search">
							</li>
							<li>
								<a href="#" class="hide-search"><i class="fa fa-close"></i></a>
							</li>
						</ul>
					</div>
				</div>
				<div class="navicon">
					<a class="nav-toggle" href="#"><span></span></a>
				</div>
			</div>
		</div>
	</div>