<?php
include('../../config.php');
$site = new Config();
$category = $site->get_category_by_id($_GET['category_id']);

$posts = $site->get_category_posts($category['name'],$_GET['user_name']);


// exit;
?>
<h1 class="page-header"><?php echo $category['name']; ?></h1>
<?php 
	if ($posts===NULL) {
		echo 'No posts have been added!';
	} else {
		foreach ($posts as $key => $post) {
			$post_data = $site->get_post_by_id($post['post_id']);
			$image = '<img src="'.$post_data['photo'].'" height="50px"/>';
			echo $image.$post_data['twitter'].': '.$post_data['blogtitle'].'<hr>';
		}
		// echo $site->display_media_grid($posts,$_SESSION['user_name'],0); 	
	}
?>

<script type="text/javascript" src="<?php echo $site->url ?>js/dashboard.js"></script>