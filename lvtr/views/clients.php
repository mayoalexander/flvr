<?php
include_once('../config.php');
$site = new Config();

$users = $site->get_all_users('users');
// $users = $site->get_all_clients('users');
// $site->debug($users);
?>

<section class="container">
	<h1 class="page-header">Clients</h1>
	<nav class="subnav">
		<a class="btn btn-primary" href="#" data-page="incomplete_clients">Incomplete</a>
	</nav>
	<div class="clients list-group">
		<?php $site->display_users_list($users); ?>
	</div>
</section>


<script type="text/javascript">
	$(function(){
		$('.subnav a').click(function() {
			var page = $(this).attr('data-page');
			var wrapper = $('.list-group');
			var url = "http://freelabel.net/lvtr/views/" + page + ".php";
			$.post(url, function(result){
				wrapper.html(result);
			});
		});
	});
</script>

<script type="text/javascript" src="<?php echo $site->url; ?>/js/dashboard.js"></script>