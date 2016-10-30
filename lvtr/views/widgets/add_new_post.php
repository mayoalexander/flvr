<?php
include_once('/home/freelabelnet/public_html/lvtr/config.php');
$config = new Config();
// $post = $config->get_post_by_id($_GET['post_id']);

// $categories = $config->get_user_categories($_GET['user_name']);
// $dropdown = $config->create_select_dropdown($categories, 'name');
// // foreach ($categories as $key => $category) {
// // 	echo $category['name'].'<br>';
// // }

// var_dump($categories);
?>

<form class="add-to-category-form row" style="padding:3em;">
	<h2>Add New Post</h2>
	<div>
		<input class="form-control" type="text" name="name" placeholder="Enter title..">
		<textarea class="form-control" rows="5" placeholder="Enter Content Here.."></textarea>
	</div>

	<div><button class="btn btn-primary btn-block pull-right">Save</button></div>
	<input type="hidden" name="user_name" value="<?php echo $_GET['user_name'] ?>">
	<input type="hidden" name="action" value="add_new_category">
</form>



<script type="text/javascript" src="<?php echo $site->url; ?>js/dashboard.js"></script>