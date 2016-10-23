<?php
include_once('/home/freelabelnet/public_html/lvtr/config.php');
$config = new Config();
$post = $config->get_post_by_id($_GET['post_id']);

$categories = $config->get_user_categories($_GET['user_name']);
$dropdown = $config->create_select_dropdown($categories, 'name');
// foreach ($categories as $key => $category) {
// 	echo $category['name'].'<br>';
// }

// var_dump($categories);
?>

<div class="row" style="padding:3em;">
	<h2>Adding</h2>
	<h4><?php echo $post['twitter'].' - '.$post['blogtitle']; ?> to:</h4>
	<div class="col-md-7 col-sm-7"><?php echo $dropdown; ?></div>
	<div class="col-md-5 col-sm-5"><button class="btn btn-primary btn-block pull-right">Add</button></div>
</div>
