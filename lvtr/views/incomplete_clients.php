<?php
include_once('../config.php');
$site = new Config();

$users = $site->get_all_clients('users');
// $users = $site->get_all_clients('users');
// $site->debug($users);
?>

<?php $site->display_client_list($users); ?>