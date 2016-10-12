<?php include_once('../header.php'); 

if (isset($_GET['q']) && $_GET['q']!=='') { ?>
	<?php $query = trim($_GET['q']); ?>
	<div class="container page-header">
	  <h1>Search Results for: <small><?php echo $_GET['q']; ?></small></h1>
	</div>
<?php 
	$posts = $site->get_post_by_search($_GET['q']);
	$site->display_media_grid($posts, $_SESSION['user_name']);
} else { ?>
	<div class="container page-header">
	  <h1>No Results Found for: <small><?php echo $_GET['q']; ?></small></h1>
	</div>
<?php } ?>



<script type="text/javascript" src="<?php echo $site->url ?>js/dashboard.js"></script>
<?php include_once('../footer.php'); ?>
