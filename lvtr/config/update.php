<?php 
include_once('../config.php');
$site = new Config();
// $post = $site->get_post_by_id($_POST['post_id']);

if ($_POST['action']==='delete') {
	if ($site->delete('feed', $_POST['post_id'])) {
		echo 'Successfully Deleted';
	}	else {
		echo 'Something went wrong!';
	}
}



if ($_POST['action']==='edit') {
	if ($site->update('feed', $_POST)) {
		echo 'Successfully Updated!';
	}	else {
		echo 'Something went wrong!';
	}
}




if ($_POST['action']==='insert') {
	if ($site->add('categories_posts', $_POST)) {
		echo 'Successfully Updated!';
	}	else {
		echo 'Something went wrong!';
	}
}
