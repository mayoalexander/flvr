<?php

session_start();



if ($_SESSION['user_logged_in'] || $_SESSION['admin']) {
	$status = true;
} else {
	$status = false;
}

echo $status;