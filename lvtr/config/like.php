<?php
include('../config.php');
$site = new Config();

if (isset($_POST)) {
	$site->like_post($_POST);
	echo 'Added to Likes!';
} else {
	echo 'No data sent. Something went wrong!';
}

