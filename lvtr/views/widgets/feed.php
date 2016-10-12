<?php
include_once('../../config.php');
$site = new Config();
// $user = $site->get_user_data($_SESSION['user_name']);
// $profile = $site->get_user_profile($_SESSION['user_name']);
$media = $site->get_user_media('admin', 0); // '0' pulling the 1st page results
$ads = $site->getPhotoAds('admin', 'freelabel front'); // '0' pulling the 1st page results
// $friends = $site->get_user_friends($_SESSION['user_name'], 0); // '0' pulling the 1st page results
// $user = $site->get_user_feed($_SESSION['user_name']);
// var_dump($ads);
// exit;
?>

<panel class="tracklist clearfix">
	<?php $site->display_media_grid($media); ?>
</panel>