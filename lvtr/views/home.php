<?php
include('../config.php');
$site = new Config();

$user_status = $site->verify_login($_SESSION);




if ($user_status) {
	$site->view('dashboard');
	// echo 'user logged in: show dashboard';
} else {
	$data = $site->getPhotoAds('admin' , 'advertise registration', 10);
	$site->view('cover',$data);
	// echo 'user not logged in: show cover page';
}


?>