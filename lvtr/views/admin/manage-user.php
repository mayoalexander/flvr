<?php
include_once('/home/freelabelnet/public_html/lvtr/config.php');
$site = new Config();

var_dump($_GET['user_name']);
$profile = $site->get_user_data($_GET['user_name'], NULL, 1);
// $profile = array_merge($profile, $site->get_user_data($_GET['user_name']));


// var_dump($_POST);
// $post = $config->get_post_by_id($_GET['post_id']);

// $categories = $config->get_user_categories($_GET['user_name']);
// $dropdown = $config->create_select_dropdown($categories, 'name');
// foreach ($categories as $key => $category) {
// 	echo $category['name'].'<br>';
// }

// var_dump($categories);




$rawdata='';
foreach ($profile as $key => $value) {
	$rawdata .= $key.': '.$value.'<br>';
}
?>

<div class="row" style="padding:3em;">
	<div class="col-md-4 manage_user_options">
		<img src="<?php echo $profile['photo']; ?>" class="img-responsive">
		<?php echo $site->display_manage_user_options($_GET['user_name']); ?>
	</div>
	<div class="col-md-8">
		<?php echo $rawdata; ?>
	</div>
</div>
<script type="text/javascript" src="<?php echo $site->url; ?>js/dashboard.js"></script>