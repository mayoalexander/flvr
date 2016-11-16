<?php
include_once('../config.php');

$site = new Config();

$liked = $site->get_user_liked($_SESSION['user_name']);
// $site->debug($liked,1);
?>

<div class="container">
	<h1 class="page-header">Liked Posts</h1>
	<?php $site->display_media_grid($liked,$_SESSION['user_name'],0); ?>
</div>


<script type="text/javascript" src="<?php echo $site->url ?>js/dashboard.js"></script>
