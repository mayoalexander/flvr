<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge"> 
		<meta name="viewport" content="width=device-width, initial-scale=1"> 
		<title>Initial Page Loading Effect</title>
		<meta name="description" content="Initial Page Loading Effect: Re-creating the effect seen on fontface.ninja" />
		<meta name="keywords" content="page loading, effect, initial, logo, sliding, web design, css animation, transform" />
		<meta name="author" content="Codrops" />
		<link rel="shortcut icon" href="../favicon.ico">
		<link rel="stylesheet" type="text/css" href="css/normalize.css" />
		<link rel="stylesheet" type="text/css" href="css/demo.css" />
		<link rel="stylesheet" type="text/css" href="css/effect1.css" />
		<script src="js/modernizr.custom.js"></script>
	</head>
	<body class="demo-1">
		<div id="ip-container" class="ip-container">
			<!-- initial header -->
			<header class="ip-header">
				<h1 class="ip-logo">
					<img src="http://freelabel.net/images/FREELABELLOGO.gif" width="300px" style="margin:auto;">
				</h1>
				<div class="ip-loader">
					<svg class="ip-inner" width="60px" height="60px" viewBox="0 0 80 80">
						<path class="ip-loader-circlebg" d="M40,10C57.351,10,71,23.649,71,40.5S57.351,71,40.5,71 S10,57.351,10,40.5S23.649,10,40.5,10z"/>
						<path id="ip-loader-circle" class="ip-loader-circle" d="M40,10C57.351,10,71,23.649,71,40.5S57.351,71,40.5,71 S10,57.351,10,40.5S23.649,10,40.5,10z"/>
					</svg>
				</div>
			</header>
			<!-- top bar -->
			<div class="codrops-top clearfix">
				<a class="codrops-icon codrops-icon-prev" href="http://tympanus.net/Development/FullscreenForm/"><span>Previous Demo</span></a>
				<span class="right"><a class="codrops-icon codrops-icon-drop" href="http://tympanus.net/codrops/?p=19535"><span>Back to the Codrops Article</span></a></span>
			</div>
			<!-- main content -->
			<div class="ip-main">
				<nav class="codrops-demos">
					<a class="current-demo" href="index.html">Demo 1</a>
					<a href="index2.html">Demo 2</a>
				</nav>
				<h2>Make yourself at home.</h2>
				<div class="browser clearfix">
					<div class="box">
						<span class="icon-bell"></span>
						<p>Do Re Mi What Fa Si Ti Doi Nemo Do Re Mi What Fa Si Ti Doi Nemo</p>
					</div>
					<div class="box">
						<span class="icon-heart"></span>
						<p>E La Yo Na Ti Do Pa Pa Noah Do Re Mi What Fa Si Ti Doi Nemo</p>
					</div>
					<div class="box">
						<span class="icon-cog"></span>
						<p>No way! Hey Hey, me ok! Do Re Mi What Fa Si Ti Doi Nemo</p>
					</div>
				</div>
				<!-- related demos -->
				<section class="related">
					<p>Related:</p>
					<a href="http://tympanus.net/Development/HeaderEffects/">
						<img src="img/relatedposts/HeaderEffects.jpg" alt="Header Effects"/>
						<h3>On-Scroll Header Effects</h3>
					</a>
					<a href="http://tympanus.net/Development/ArticleIntroEffects/">
						<img src="img/relatedposts/ArticleIntroEffects.png" alt="Article Intro Effects" />
						<h3>Article Intro Effects</h3>
					</a>
				</section>
			</div>
		</div><!-- /container -->
		<script src="js/classie.js"></script>
		<script src="js/pathLoader.js"></script>
		<script src="js/main.js"></script>
	</body>
</html>