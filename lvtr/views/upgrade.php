<?php
include_once('../config.php');
$site = new Config();
/*
	this page is used by the dashboard search in views/dasbhoard.php
*/

// $site->debug($_SESSION,1);
echo '<script>window.open("https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=J67CSAKQMWDT8")</script>';
// echo '<h1>upgrade '.$_SESSION['user_name'] .' from '.$_SESSION['user_active']. ' to </h1>';//.(int($_SESSION['user_active'])+1);
// $posts = $site->get_user_media($_POST['user_name'], $_POST['page']);
// $site->display_media_grid($posts, $_POST['user_name'], $_POST['page']);
?>


<div class="container">
	<h1>You will now be redirected to create your Exclusive Profile</h1>
	<p>If the window did not open, you can click here to redirect to Paypal.</p>
	<a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=J67CSAKQMWDT8" class="btn btn-primary">Confirm + Upgrade</a>
</div>

<script type="text/javascript" src="<?php echo $site->url ?>js/dashboard.js"></script>
