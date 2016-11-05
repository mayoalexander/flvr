<?php
include_once('../header.php');
$site = new Config();
$ads = $site->get_user_categories($_SESSION['user_name']); // '0' pulling the 1st page results

?>

<?php

if ($_POST['source']=='dashboard') {
	// echo "show private tracks";
}
$posts = $site->get_explore_posts($_SESSION['user_name'], $_POST['page']);

?>
<div class="container">
	<h1 class="page-header">Explore</h1>
	<div>
		<?php $site->display_media_grid($posts, $_SESSION['user_name'], $_POST['page']); ?>
	</div>
</div>
<script type="text/javascript" src="<?php echo $site->url ?>js/dashboard.js"></script>


<?php 
include_once('../footer.php');
?>