<?php
include_once('../../config.php');
$site = new Config();
// $user = $site->get_user_data($_SESSION['user_name']);
// $profile = $site->get_user_profile($_SESSION['user_name']);
$ads = $site->getPhotoAds('admin', 'freelabel front',3); // '0' pulling the 1st page results
$ads = $site->getPhotoAds('admin', 'current-promo',3); // '0' pulling the 1st page results
// $friends = $site->get_user_friends($_SESSION['user_name'], 0); // '0' pulling the 1st page results
// $user = $site->get_user_feed($_SESSION['user_name']);
// var_dump($ads);
// exit;
?>


		<div class="col-md-4 marketing_feature">
			<i class="fa fa-rocket"></i>
			<h1>New Music Daily</h1>
			<p>this is why you want to create your account</p>
		</div>
		<div class="col-md-4 marketing_feature">
			<i class="fa fa-cloud-upload"></i>
			<h1>Unlimted Uploads</h1>
			<p>this is why you want to create your account</p>
		</div>
		<div class="col-md-4 marketing_feature">
			<i class="fa fa-link"></i>
			<h1>Integrate Your Social Media</h1>
			<p>this is why you want to create your account</p>
		</div>

<h1 class="page-header">Exclusive Projects</h1>
<panel class="tracklist clearfix">
	<?php $site->display_ads_grid($ads); ?>
</panel>

