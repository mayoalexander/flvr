<?php
	include '../../../header.php';
	include '../../../config/templates/zoom.php';
	$site = new Config();
	$zoom = new Zoom();
	$posts = $site->get_user_media('admin', 0);
?>
<link rel="stylesheet" type="text/css" href="<?php echo $site->url?>public/templates/zoom/fonts/feather/style.css">
<!-- Component styles -->
<link rel="stylesheet" type="text/css" href="<?php echo $site->url?>public/templates/zoom/css/component.css" />
<script src="<?php echo $site->url?>public/templates/zoom/js/modernizr.custom.js"></script>

	<!-- Main container -->
	<div class="container">
		<!-- Blueprint header -->
		<header class="bp-header cf">
			<h1>Account Types</h1>
		</header>
		<!-- Grid -->
		<section class="slider">
			<?php $zoom->display_slider($posts); ?>
			<nav class="slider__nav">
				<button class="button button--nav-prev"><i class="icon icon--arrow-left"></i><span class="text-hidden">Previous product</span></button>
				<button class="button button--zoom"><i class="icon icon--zoom"></i><span class="text-hidden">View details</span></button>
				<button class="button button--nav-next"><i class="icon icon--arrow-right"></i><span class="text-hidden">Next product</span></button>
			</nav>
		</section>
		<!-- /slider-->
		<section class="content">
			<?php $zoom->display_slides($posts); ?>
			<button class="button button--close"><i class="icon icon--circle-cross"></i><span class="text-hidden">Close content</span></button>
		</section>
	</div>
	<script src="js/classie.js"></script>
	<script src="js/dynamics.min.js"></script>
	<script src="js/main.js"></script>


<?php include '../../../footer.php'; ?>