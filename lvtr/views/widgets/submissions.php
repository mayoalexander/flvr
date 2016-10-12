<?php
include('../../config.php');
$site = new Config();
$posts = $site->get_all('feed');
// var_dump($posts);
?>
<div class="container">
	<h1 class="page-header">Submissions</h1>
	<?php echo $site->display_media_grid($posts,$_SESSION['user_name'],0); ?>
</div>

<script type="text/javascript" src="<?php echo $site->url ?>js/dashboard.js"></script>