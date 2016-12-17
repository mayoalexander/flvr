<?php
include_once('../config.php');
$site = new Config();



$promos = $site->get_all_promos('users');
// $site->debug($promos,1);
?>

<section class="container">
	<h1 class="page-header">Events</h1>
	<div class="clients list-group">
		<?php $site->display_promos_grid($promos); ?>
	</div>
</section>


<script type="text/javascript" src="<?php echo $site->url; ?>/js/dashboard.js"></script>