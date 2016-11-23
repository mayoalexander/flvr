<?php
// show registration info
include_once('../config.php');
$site = new Config();
?>


<style type="text/css">
	.cbp-so-scroller h1 {
		color:<?php echo $site->primary_color; ?>
	}
</style>
<header class="header_banner hero-01" style="background-image:url('<?php echo $site->get_hero_img(); ?>');" >
	<div class="background-tint">
		<h1>FREELABEL</h1>
		<p><?php echo $site->description; ?></p>
		<section class="row">
			<a href="<?php echo $site->url; ?>?ctrl=register" class="btn btn-success btn-lg call-to-action">Get Started <i class="fa fa-arrow-right"></i></a>
		</section>
	</div>
</header>
