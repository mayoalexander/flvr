<?php 
include_once('../config.php'); 
$site = new Config();

if (isset($_POST['q']) && $_POST['q']!=='') { ?>
	<?php $query = trim($_POST['q']); ?>
	<div class="container-fluid">
	  <p>Search Results for: <small><?php echo $_POST['q']; ?></small></p>
	</div>

<section class="container-fluid">
	<?php 
		$posts = $site->get_post_by_search($_POST['q']);
		if (isset($posts)) {
			// $site->display_media_list($posts, $_SESSION['user_name']);
			foreach ($posts as $key => $post) {
				echo '<li class="list-group-item"><a href="/'.$post['twitter'].'/id/'.$post['id'].'">'.$post['twitter'].' - '.$post['blogtitle'].'</a></li>';
			}			
		} else {
				echo '<li class="list-group-item">No results found..</li>';
		}

	} else { ?>
		<div class="page-header">
		  <p>No Results Found for: <small><?php echo $_POST['q']; ?></small></p>
		</div>
	<?php } ?>
</section>

