<?php
include_once('../config.php');
$site = new Config();
/*
	this page is used by the dashboard search in views/dasbhoard.php
*/

if ($_POST['source']=='dashboard') {
	// echo "show private tracks";
}
// $posts = $site->get_user_media('admin', $_POST['page']);
$posts = $site->get_explore_posts($_SESSION['user_name'], $_POST['page']);
// $posts = $site->get_user_liked('admin');

?>
<div class="container">
	<h1 class="page-header">TV</h1>
	<div>
		<h3>COMING SOON!</h3>
		<?php //$site->display_media_grid($posts, $_SESSION['user_name'], $_POST['page']); ?>
	</div>
</div>
<script type="text/javascript" src="<?php echo $site->url ?>js/dashboard.js"></script>
