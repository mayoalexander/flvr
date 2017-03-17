<?php
include('../config.php');
$site = new Config();


/* INITIALIZE */
/* ADD TO DATABASE */
$_POST['blogtitle'] = 'blogtitle';
$_POST['trackmp3'] = 'trackmp3';
$_POST['twitter'] = 'twitter';
$_POST['status'] = 'status';
$_POST['type'] = 'type';
$_POST['user_name'] = 'user_name';
var_dump($site->add('feed', $_POST));