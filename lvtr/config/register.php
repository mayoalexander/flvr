<?php
include('../config.php');
$site = new Config();

/*
	1. Check if User Name Exists
	2. Save Session Details

*/



// check if user exists
if ($site->check_if_user_exists($_POST)===NULL) {
	echo $site->create_new_user($_POST);
	$site->set_session($_POST);
	// echo "<script>window.location.assign('".$site->url."?ctrl=profile');</script>";
	echo "<script>window.location.assign('http://freelabel.net/confirm/".$_POST['user_type']."');</script>";
} else {
	echo 'User already exists, please choose a different username!';
}
 





// // var_dump($_POST);
// // 1. Detecting if user logged in
// if (isset($_POST['user_name']) && isset($_POST['user_password'])) {

// 	save_session_details();

// } else {
// 	echo 'No data sent, error occured';
// }
// // 1.0 - check if user exists

// // 2.0 - show callback