<?php
include('../../config.php');
$site = new Config();
$category = $site->get_category_by_id($_GET['category_id']);

$posts = $site->get_category_posts($category['name'],$_GET['user_name']);

// $site->debug($posts,1);

// exit;
?>
<h1 class="page-header"><?php echo $category['name']; ?></h1>
<?php 
	if ($posts===NULL) {
		echo 'No posts have been added!';
	} else {
		$site->display_categories_post($posts);	
	}
?>
<script type="text/javascript" src="<?php echo $site->url ?>js/dashboard.js"></script>