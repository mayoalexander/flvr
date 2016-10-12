<?php 
/*
	Load User Data
*/
include_once('../config.php');
$site = new Config();
$user = $site->get_user_data($_SESSION['user_name']);
$profile = $site->get_user_profile($_SESSION['user_name']);
$media = $site->get_user_media($_SESSION['user_name'], 0); // '0' pulling the 1st page results


/*
	Process Form Submission
*/
if (isset($_POST['update_profile'])) {
	// saving data to profile
	echo $site->create_new_profile($_POST);
	exit;
}


/*
	Show Views
*/
include('account.php');

?>