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
$posts = $site->get_user_media($_POST['user_name'], $_POST['page']);
$site->display_media_list($posts, $_POST['user_name'], $_POST['page']);
?>
<script type="text/javascript" src="<?php echo $site->url ?>js/dashboard.js"></script>
