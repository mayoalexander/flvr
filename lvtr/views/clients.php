<?php
include_once('../config.php');
$site = new Config();

$users = $site->get_all_users('users');
// $site->debug($users);
?>

<section class="container">
	<h1 class="page-header">Clients</h1>
	<?php $site->display_users_list($users); ?>
</section>