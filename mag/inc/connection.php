<?php
//Variables for connecting to your database.
//These variable values come from your hosting account.
$hostname = "amrusers.db.13071759.hostedresource.com";
$username = "amrusers";
$dbname = "amrusers";



$password = "Treytonmayo2010!";
//$usertable = "users";
//Connecting to your database
$con = mysqli_connect($hostname, $username, $password, $dbname) ;
$connection = mysqli_connect($hostname, $username, $password, $dbname) ;
//OR DIE ("Unable to connect to database! Please try again later.");
//mysql_select_db($dbname);