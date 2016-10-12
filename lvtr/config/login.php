<?php
include('../config.php');
$site = new Config();

/*
	1. Check if User Name Exists
	2. Save Session Details

*/




// check if user exists
if ($site->verify_user_login($_POST)===true) {
	echo "Logging in..";
	echo "<script>window.location.assign('{$site->url}');</script>";
} else {
	echo 'no user exists!';
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