<?php
include('../config.php');
$site = new Config();

$user_status = $site->verify_login($_SESSION);




if ($user_status) {
	$site->view('dashboard');
	// echo 'user logged in: show dashboard';
} else {
	$site->view('cover',$data);
	$dir = "../../view/themes/demo/content/sales/";
	include($dir.'frontpage.htm');
	// echo 'user not logged in: show cover page';
}


?>