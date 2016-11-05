<?php
include_once('../config.php');
$site = new Config();

$users = $site->get_leads('users');
// $site->debug($users,1);
?>

<section class="container">
	<h1 class="page-header">Leads</h1>
	<?php $site->display_leads($users); ?>
</section>


<script type="text/javascript" src="<?php echo $site->url; ?>/js/dashboard.js"></script>