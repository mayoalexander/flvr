<?php
include_once('../config.php');
$site = new Config();


$ftp_server		=		"pink.radio.co"; 
$ftp_user_name	=		"s95fa8cba2.uf29485319"; 
$ftp_user_pass	=		"d111ea334e75"; 


// -------------- set up basic connection 
$conn_id = ftp_connect($ftp_server); 

// login with username and password 
$login_result = ftp_login($conn_id, $ftp_user_name, $ftp_user_pass);

$contents = ftp_nlist($conn_id, ".");

// output $contents
var_dump($contents);

exit;