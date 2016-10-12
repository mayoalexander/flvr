<?php
include_once('../config.php');
$site = new Config();

// $media = $site->get_user_media($_POST['user_name'], 0); // '0' pulling the 1st page results


if ($_POST['source']=='dashboard') {
	echo "show private tracks";
}
$posts = $site->get_post_by_search($_POST['q'], $_POST['user_name'], $_POST['page'] ,true);
$site->display_media_grid($posts);
?>
<script type="text/javascript" src="<?php echo $site->url ?>js/dashboard.js"></script>
