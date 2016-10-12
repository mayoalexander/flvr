<?php
include_once('../../config.php');
$site = new Config(); 
$post = $site->get_post_by_id($_GET['post_id']);
$profile_user_name = $post['user_name'];
?><!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<title><?php echo $post['twitter'] . $site->page_title; ?></title>
		<meta name="description" content="A landing page template with a featured content section and background sounds that change according to the view" />
		<meta name="keywords" content="landing page, background sound, aquatic theme, effect, transition, animation" />
		<meta name="author" content="Codrops" />
		<link rel="shortcut icon" href="favicon.ico">
		<link href="https://fonts.googleapis.com/css?family=Crimson+Text:600|Raleway:900" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="css/normalize.css" />
		<link rel="stylesheet" type="text/css" href="css/style2.css" />
		<style type="text/css">
			.landing-wrap {
				opacity: 0.4;
			}
			body {
				background: #101010;
			}
			html, body, * {
				overflow:hidden;
			}
			.landing-header__title {
				color:#e3e3e3;
			}
			.codrops-links {
				content:'';
			}
		</style>
		<!--[if IE]>
  		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<script>document.documentElement.className = 'js';</script>
	</head>
	<body>
		<svg class="hidden">
			<defs>
				<symbol id="icon-arrow" viewBox="0 0 24 24">
					<title>arrow</title>
					<polygon points="6.3,12.8 20.9,12.8 20.9,11.2 6.3,11.2 10.2,7.2 9,6 3.1,12 9,18 10.2,16.8 "/>
				</symbol>
				<symbol id="icon-drop" viewBox="0 0 24 24">
					<title>drop</title>
					<path d="M12,21c-3.6,0-6.6-3-6.6-6.6C5.4,11,10.8,4,11.4,3.2C11.6,3.1,11.8,3,12,3s0.4,0.1,0.6,0.3c0.6,0.8,6.1,7.8,6.1,11.2C18.6,18.1,15.6,21,12,21zM12,4.8c-1.8,2.4-5.2,7.4-5.2,9.6c0,2.9,2.3,5.2,5.2,5.2s5.2-2.3,5.2-5.2C17.2,12.2,13.8,7.3,12,4.8z"/><path d="M12,18.2c-0.4,0-0.7-0.3-0.7-0.7s0.3-0.7,0.7-0.7c1.3,0,2.4-1.1,2.4-2.4c0-0.4,0.3-0.7,0.7-0.7c0.4,0,0.7,0.3,0.7,0.7C15.8,16.5,14.1,18.2,12,18.2z"/>
				</symbol>
				<symbol id="icon-grid" viewBox="0 0 100 100">
					<title>grid</title>
					<rect x="8.4" y="8.9" width="20.1" height="20.1"/>
					<rect x="40" y="8.9" width="20.1" height="20.1"/>
					<rect x="71.6" y="8.9" width="20.1" height="20.1"/>
					<rect x="8.3" y="40" width="20.1" height="20.1"/>
					<rect x="39.9" y="40" width="20.1" height="20.1"/>
					<rect x="71.6" y="40" width="20.1" height="20.1"/>
					<rect x="8.3" y="71" width="20.1" height="20.1"/>
					<rect x="39.9" y="71" width="20.1" height="20.1"/>
					<rect x="71.6" y="71" width="20.1" height="20.1"/>
				</symbol>
				<symbol id="icon-sound-on" viewBox="0 0 100 100">
					<title>sound on</title>
					<path d="M57.9,13c-6.6,0-13.1,1.8-18.8,5.1c-5.1,3-9.3,7.1-12.5,12.1H12.5c-5.7,0-10.4,4.7-10.4,10.4v18.9
						c0,5.7,4.7,10.4,10.4,10.4h14.1c3.1,4.9,7.4,9.1,12.5,12.1c5.7,3.3,12.1,5.1,18.8,5.1c1.5,0,2.7-1.2,2.7-2.7V15.7
						C60.6,14.2,59.4,13,57.9,13z M25.5,64.5h-13c-2.8,0-5.1-2.3-5.1-5.1V40.6c0-2.8,2.3-5.1,5.1-5.1h13C25.5,35.5,25.5,64.5,25.5,64.5
						z M55.2,81.6c-10-0.8-19.1-6.5-24.4-15.1V33.6c5.3-8.6,14.4-14.3,24.4-15.1V81.6z"/>
					<path d="M71,29.4c-1.2-0.8-2.9-0.6-3.7,0.7c-0.8,1.2-0.6,2.9,0.7,3.7c5.3,3.7,8.5,9.8,8.5,16.3S73.3,62.6,68,66.3
						c-1.2,0.8-1.5,2.5-0.7,3.7c0.5,0.8,1.3,1.1,2.2,1.1c0.5,0,1.1-0.2,1.5-0.5C77.8,66,81.8,58.3,81.8,50S77.8,34.1,71,29.4z"/>
					<path d="M81.3,18.3c-1.2-0.8-2.9-0.6-3.7,0.7c-0.8,1.2-0.6,2.9,0.7,3.7c8.9,6.2,14.3,16.4,14.3,27.3
						s-5.3,21.1-14.3,27.3c-1.2,0.8-1.5,2.5-0.7,3.7c0.5,0.8,1.3,1.1,2.2,1.1c0.5,0,1.1-0.2,1.5-0.5C91.7,74.5,97.9,62.6,97.9,50
						S91.7,25.5,81.3,18.3z"/>
				</symbol>
				<symbol id="icon-sound-off" viewBox="0 0 100 100">
					<title>sound off</title>
					<path d="M57.9,13c-6.6,0-13.1,1.8-18.8,5.1c-5.1,3-9.3,7.1-12.5,12.1H12.5c-5.7,0-10.4,4.7-10.4,10.4v18.9
						c0,5.7,4.7,10.4,10.4,10.4h14.1c3.1,4.9,7.4,9.1,12.5,12.1c5.7,3.3,12.1,5.1,18.8,5.1c1.5,0,2.7-1.2,2.7-2.7V15.7
						C60.6,14.2,59.4,13,57.9,13z M25.5,64.5h-13c-2.8,0-5.1-2.3-5.1-5.1V40.6c0-2.8,2.3-5.1,5.1-5.1h13C25.5,35.5,25.5,64.5,25.5,64.5z
						M55.2,81.6c-10-0.8-19.1-6.5-24.4-15.1V33.6c5.3-8.6,14.4-14.3,24.4-15.1V81.6z"/>
					<g>
						<path d="M68.4,66.4c-0.7,0-1.4-0.3-1.9-0.8c-1-1-1-2.7,0-3.8l27.6-27.6c1-1,2.7-1,3.8,0c1,1,1,2.7,0,3.8L70.3,65.7
						C69.8,66.2,69.1,66.4,68.4,66.4z"/>
						<path d="M96,66.4c-0.7,0-1.4-0.3-1.9-0.8L66.6,38.1c-1-1-1-2.7,0-3.8c1-1,2.7-1,3.8,0l27.6,27.6c1,1,1,2.7,0,3.8
						C97.4,66.2,96.7,66.4,96,66.4z"/>
					</g>
				</symbol>
			</defs>
		</svg>
		<main class="landing-layout">
			<!-- Landing wrap with sections -->
			<div class="landing-wrap">
				<section class="landing landing--above" style="background-image: url('<?php echo $post['photo']; ?>');"></section>
				<section class="landing landing--beneath" style="background-image: url(<?php// echo $post['photo']; ?>);">
					<canvas id="bubbles"></canvas>
				</section>
			</div><!-- /landing-wrap -->
			<!-- Landing header with title -->
			<header class="landing-header">
				<h1 class="landing-header__title" data-mp3="<?php echo $post['trackmp3']; ?>">
					<span class="landing-header__text"><?php echo $post['twitter']; ?></span>
				</h1>
				<p class="landing-header__tagline"><?php echo $post['blogtitle']; ?></p>
			</header><!-- /landing-header -->
			<!-- Trigger button for layout change -->
			<button class="button button--trigger" aria-label="View more">
				<svg class="icon icon--grid icon--shown"><use xlink:href="#icon-grid"></use></svg>
				<svg class="icon icon--arrow-up icon--hidden"><use xlink:href="#icon-arrow"></use></svg>
			</button>
			<!-- Sound on/off button -->
			<button class="button button--sound" aria-label="Toggle sound">
				<svg class="icon icon--sound-on icon--shown"><use xlink:href="#icon-sound-on"></use></svg>
				<svg class="icon icon--sound-off icon--hidden"><use xlink:href="#icon-sound-off"></use></svg>
			</button>
			<!-- Featured content that gets shown after the layout opens -->
			<section class="featured-content">
				<ul class="featured-list">
					<li class="featured-list__item">
						<a href="#" class="featured-list__link">
							<img class="featured-list__img" src="img/icons/m1.svg" alt="Marine 1">
							<h3 class="featured-list__title">Aquatic Life</h3>
						</a>
					</li>
					<li class="featured-list__item">
						<a href="#" class="featured-list__link">
							<img class="featured-list__img" src="img/icons/m2.svg" alt="Marine 2">
							<h3 class="featured-list__title">Conservation</h3>
						</a>
					</li>
					<li class="featured-list__item">
						<a href="#" class="featured-list__link">
							<img class="featured-list__img" src="img/icons/m3.svg" alt="Marine 3">
							<h3 class="featured-list__title">Information</h3>
						</a>
					</li>
					<li class="featured-list__item">
						<a href="#" class="featured-list__link">
							<img class="featured-list__img" src="img/icons/m4.svg" alt="Marine 4">
							<h3 class="featured-list__title">Kid's Corner</h3>
						</a>
					</li>
					<li class="featured-list__item">
						<a href="#" class="featured-list__link">
							<img class="featured-list__img" src="img/icons/m5.svg" alt="Marine 5">
							<h3 class="featured-list__title">Marine Tech</h3>
						</a>
					</li>
					<li class="featured-list__item">
						<a href="#" class="featured-list__link">
							<img class="featured-list__img" src="img/icons/m6.svg" alt="Marine 6">
							<h3 class="featured-list__title">Human Impact</h3>
						</a>
					</li>
				</ul>
			</section><!-- /featured-content -->
			<!-- Codrops header -->
			<header class="codrops-header">
				<div class="codrops-linkss">
					<a class="codrops-icon codrops-icon--prev" href="<?php $site->url;?>" title="Back to site"><svg class="icon icon--arrow"><use xlink:href="#icon-arrow"></use></svg></a>
				</div>
				<h1 class="codrops-header__title">@<?php echo $post['user_name']; ?></h1>
<!-- 				<nav class="codrops-demos">
					<a href="index.html">Demo 1</a>
					<a class="current-demo" href="index2.html">Demo 2</a>
					<a href="index3.html">Demo 3</a>
				</nav> -->
			</header><!-- /codrops-header -->
			<div class="loader">
				<svg class="loader__img" viewBox="0 0 100 100" width="100px" height="100px">
					<circle class="loader__circle" cx="22.8" cy="77.6" r="16.5"/>
					<circle class="loader__circle" cx="52.2" cy="82.9" r="6.5"/>
					<circle class="loader__circle" cx="79.8" cy="69.8" r="13.1"/>
				</svg>
			</div>
		</main>
		<script src="js/howler.min.js"></script>
		<script src="js/imagesloaded.pkgd.min.js"></script>
		<script src="js/main_2.js"></script>
	</body>
</html>
