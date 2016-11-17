<?php
include_once('../config.php');
$site = new Config();
if (isset($_SESSION['user_name'])) {
	$user_name = $_SESSION['user_name'];
} else {
	$user_name = 'admin';
}

$friends = $site->get_friends_cred($user_name);
?>


<div class="container">
	<form class="compose-email-form">
		<h1 class="page-header">Compose Email</h1>
		<div class="col-md-3">
			<label>Send To:</label>
			<?php echo $site->display_friends_list_dropdown($friends, 'user_email'); ?>
		</div>
		<div class="col-md-6">
			<button class="btn btn-primary pull-right">Send</button>

			<label>Subject:</label>
			<input type="text" name="message_title" class="form-control" placeholder="Enter Title.."></input>
			<label>Message:</label>
			<textarea class="form-control" rows="20" name="message_body" placeholder="Enter Message Body.."></textarea>
		</div>
		<div class="col-md-3">
			<h3>How To Use:</h3>
			<p>Right now, you can use this to send a message via twitter...</p>
		</div>
	</form>
</div>


<script type="text/javascript">
	$(function() {
		$('.compose-email-form').submit(function(e) {
			e.preventDefault();
			var data = $(this).serialize();
			$.post('config/mail.php', data, function(result){
				alert(result);
			});
		});
	});
</script>