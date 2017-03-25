<?php
include_once('../config.php');
$site = new Config();
/*
	this page is used by the dashboard search in views/dasbhoard.php
*/

if ($_POST['source']=='dashboard') {
	// echo "show private tracks";
}
if (!isset($_POST['page'])) {
	$_POST['page'] = 0;
}

$posts = $site->get_user_media('admin', $_POST['page']);
// $posts = $site->get_explore_posts($_SESSION['user_name'], $_POST['page']);
// $posts = $site->get_user_liked('admin');

?>
<?php //$site->display_media_grid($posts, 'admin', $_POST['page'], true); ?>
<?php $site->display_media_list($posts, 'admin', $_POST['page'], true); ?>

<script type="text/javascript" src="<?php echo $site->url ?>js/dashboard.js"></script>