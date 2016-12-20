<?php

session_start();



if (isset($_SESSION['user_logged_in']) && isset($_SESSION['user_name'])) {
	$status = 1;
} else {
	$status = 0;
}

echo $status;