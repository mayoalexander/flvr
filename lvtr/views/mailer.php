<?php
include_once('../config.php');

$site = new Config();

?>

<div class="container">
	<h1 class="page-header">Mailer Test</h1>
	<?php 




		$content = '<h1>'.$subject.'</h1>
		<h3>You have successfully created your account with FREELABEL. <a href="http://freelabel.net/" class="btn btn-primary btn-success">Login Now</a></h3>
		<p>For stats, booking single, project releases, or interviews, you will need to proceed with login to your account at FREELABEL. <a href="http://freelabel.net/" class="btn btn-primary btn-success">Go to Dashboard</a></p>

		<div>
			<h4>Your Details:</h4>
			<p>Username: '.$user_name.'<p>
			<p>Password: '.$user_password.'<p>
			<p>Email: '.$user_email.'<p>
		</div>';


		/* SEND EMAIL*/
		if ($site->sendMail('mayoalexandertd@outlook.com',$content)) {
			echo 'mail worked!';
		} else {
			echo 'mail didnt work!';
		}

	?>
</div>


<script type="text/javascript" src="<?php echo $site->url ?>js/dashboard.js"></script>
