<?php
include_once('../config.php');
$site = new Config();

$users = $site->get_all_users('users');
// $users = $site->get_all_clients('users');
// $site->debug($users);
?>

<section class="container">
	<h1 class="page-header">Clients</h1>
	<div class="clients list-group">
		<?php $site->display_users_list($users); ?>
	</div>
</section>


<script type="text/javascript" src="<?php echo $site->url; ?>/js/dashboard.js"></script>