<?php
include('../config.php');
$site = new Config();

if (isset($_GET['twitter']) && $_GET['twitter']!=='') { ?>
	<?php $query = trim($_GET['q']); ?>
	<div class="container page-header hidden">
	  <h1>Search Results for: <small><?php echo $_GET['twitter']; ?></small></h1>
	</div>


	<?php 
		$posts = $site->get_post_by_search($_GET['twitter']);
		$site->display_media_grid($posts, $_SESSION['user_name']);
	} else { ?>
		<div class="page-header">
		  <h1>No Results Found for: <small><?php echo $_GET['twitter']; ?></small></h1>
		</div>
	<?php } ?>

<script type="text/javascript" src="http://freelabel.net/lvtr/js/dashboard.js"></script>