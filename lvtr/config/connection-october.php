<?php
//Variables for connecting to your database.
//These variable values come from your hosting account.

// back up
if ($_SERVER["HTTP_HOST"]==='freelabel.net') {
	$hostname = 'localhost';
	$dbname = "dvlp";
	$username = "freelabeladmin";
	$password = "Redwalrus123!";
} else {
	$hostname = 'localhost';
	$dbname = "amrusers";
	$username = "root";
	$password = "root";
}
	

// $hostname = "amrusers.db.13071759.hostedresource.com";
// $dbname = "amrusers";
// $username = "amrusers";
// $password = "Leighl11!";
//$usertable = "users";
//Connecting to your database
$con = mysqli_connect($hostname, $username, $password, $dbname) ;
// $connection = mysqli_connect($hostname, $username, $password, $dbname) ;
//OR DIE ("Unable to connect to database! Please try again later.");
//mysql_select_db($dbname);

