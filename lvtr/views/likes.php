<?php
include_once('../config.php');

$site = new Config();

$liked = $site->get_user_liked($_SESSION['user_name']);
?>

<div class="container">
	<h1 class="page-header">Liked Posts</h1>
	<?php $site->display_liked_posts($liked); ?>
</div>