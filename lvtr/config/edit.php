<?php
include('../config.php');
$site = new Config();


/* INITIALIZE */
if (isset($_POST)) {
	if ($site->get_script()) {
		echo 'it worked!';
	} else {
		echo 'it didnt work!!';
	}
} else {
	echo 'No data sent. Something went wrong!';
}


