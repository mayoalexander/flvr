<?php
	include '../../../config.php';
	include '../../../config/templates/mag.php';
	$site = new Config();
	$mag = new Mag();
	$posts = $site->get_user_media('admin', 0);
?>
	<link rel="stylesheet" type="text/css" href="css/normalize.css" />
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.3.0/css/font-awesome.min.css" />
	<link rel="stylesheet" type="text/css" href="css/style1.css" />
	<style type="text/css">
		.meta__avatar {
			width: 50px;
			height: 50px;
		}
		.site-logo {
			max-width: 100px;
			display: block;
			margin: auto;
		}
		.navigation {
			text-align: left;
		}
		.sidebar, .navigation li {
			border-bottom: 1px #3e3e3e solid;
		}
		.navigation li {
			list-style-type: none;
			cursor: pointer;
			font-size:2em;
		}
	</style>
	<script src="js/modernizr.custom.js"></script>

		<div class="container">
			<button id="menu-toggle" class="menu-toggle"><span>Menu</span></button>
			<div id="theSidebar" class="sidebar">
				<button class="close-button fa fa-fw fa-close"></button>
				<img src="<?php echo $site->logo; ?>" class="site-logo">
				<div class="related navigation">
					<?php echo $site->display_navigation(); ?>
				</div>
			</div>
			<div id="theGrid" class="main">
				<section class="grid">
					<header class="top-bar">
						<h2 class="top-bar__headline">Latest articles</h2>
						<div class="filter">
							<span>Filter by:</span>
							<span class="dropdown">Popular</span>
						</div>
					</header>
					<?php $mag->display_grid($posts); ?>
					<footer class="page-meta">
						<span>Load more...</span>
					</footer>
				</section>
				<section class="content">
					<div class="scroll-wrap">
						<?php $mag->display_content($posts); ?>
					</div>
					<button class="close-button"><i class="fa fa-close"></i><span>Close</span></button>
				</section>
			</div>
		</div><!-- /container -->
		<script src="https://code.jquery.com/jquery-3.1.0.min.js" integrity="sha256-cCueBR6CsyA4/9szpPfrX3s49M9vUU5BgtiJj06wt/s=" crossorigin="anonymous"></script>
		<script src="js/classie.js"></script>
		<script src="js/main.js"></script>
<?php include '../../../footer.php'; ?>
