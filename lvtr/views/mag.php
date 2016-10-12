<?php
	// include '../header.php';
	include '../config/grid.php';
	$site = new Config();
	$grid = new Grid();
	$posts = $site->get_user_media('admin', 0);
?>
<header class="header_banner">
	
	<h1>FREELABEL</h1>
	<p>TV | RADIO | MAG</p>
	<section class="row">
		<a href="<?php echo $site->url; ?>?ctrl=register" class="btn btn-success btn-lg call-to-action">Create Your Account Now</a>
	</section>

</header>

<link rel="stylesheet" type="text/css" href="<?php echo $site->url?>public/templates/grid/css/component.css" />
<script src="<?php echo $site->url?>public/templates/grid/js/modernizr.custom.js"></script>

<div class="container grid-gallery">
	<header class="clearfix">
		<h1 class="page-header">FEED</h1>
	</header>
	<div id="grid-gallery" class="grid-gallery">
		<section class="grid-wrap">
			<ul class="grid">
				<li class="grid-sizer"></li><!-- for Masonry column width -->
				<?php $grid->display_grid($posts); ?>
			</ul>
			<div class="text-center panel-body">
				<a href="http://freelabel.net/lvtr/?ctrl=register" class="btn btn-success btn-lg call-to-action">Login To View More</a>
			</div>
		</section><!-- // grid-wrap -->
		<section class="slideshow">
			<ul>
				<?php $grid->display_slide($posts); ?>
			</ul>
			<nav>
				<span class="icon nav-prev"></span>
				<span class="icon nav-next"></span>
				<span class="icon nav-close"></span>
			</nav>
			<div class="info-keys icon">Navigate with arrow keys</div>
		</section><!-- // slideshow -->
	</div><!-- // grid-gallery -->
</div>
<script src="<?php echo $site->url?>public/templates/grid/js/imagesloaded.pkgd.min.js"></script>
<script src="<?php echo $site->url?>public/templates/grid/js/masonry.pkgd.min.js"></script>
<script src="<?php echo $site->url?>public/templates/grid/js/classie.js"></script>
<script src="<?php echo $site->url?>public/templates/grid/js/cbpGridGallery.js"></script>
<script type="text/javascript" src="<?php echo $site->url ?>js/dashboard.js"></script>
<script>
$(function() {
	new CBPGridGallery( document.getElementById( 'grid-gallery' ) );
});
</script>
