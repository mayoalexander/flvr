<?php
include('../config.php');
$site = new Config();

/*
	1. Check if User Name Exists
	2. Save Session Details

*/



// check if user exists
if ($site->check_if_user_exists($_POST)===NULL) {

	/* PROCESS NEW USER*/
	if ($site->create_new_user($_POST)) {


	$subject = 'You have successfully created your account with FREELABEL!';
	$content = '<h1>'.$subject.'</h1>
		<p>Welcome to FREELABEL! For stats, booking single, project releases, or interviews, you will need to proceed with login to your account at FREELABEL. <br><a href="http://freelabel.net/" class="btn btn-primary btn-success">Go to Dashboard</a></p>

		<div style="padding:2em;text-align:left;">
			<h4>Your Login Details:</h4>
			<p>Username: '.$_POST['user_name'].'<p>
			<p>Password: '.$_POST['user_password'].'<p>
			<p>Email: '.$_POST['user_email'].'<p>
		</div>';




		/* SEND EMAIL*/
		if ($site->sendMail($_POST['user_email'], $subject, $content)) {
		// if ($site->sendMail($_POST['user_email'], $subject, $content)) {

			echo 'A verification email has been sent to your inbox! ';
		} else {
			// echo 'mail didnt work!';
		}


		/* DISPLAY NOTIFICATION*/
		echo "Your profile has successfully been created! Please wait..";

		/* LOGIN USER with SESSION */
		$site->set_session($_POST);
		echo "<script>window.location.assign('http://freelabel.net/confirm/".$_POST['user_type']."');</script>";


	}

} else {
	echo 'User already exists, please choose a different username!';
}
 


