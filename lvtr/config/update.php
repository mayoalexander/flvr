<?php 
include_once('../config.php');
$site = new Config();

if ($_POST['action']==='delete') {
	if ($site->delete('feed', $_POST['post_id'])) {
		echo 'Successfully Deleted';
	}	else {
		echo 'Something went wrong!';
	}
}


if ($_POST['action']==='delete_category') {
	if ($site->delete('categories', $_POST['category_id'])) {
		echo 'Successfully Deleted';
	}	else {
		var_dump($_POST);
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



if ($_POST['action']==='add_new_category') {
	if ($site->add('categories', $_POST)) {
		echo 'Successfully Updated!';
	}	else {
		echo 'Something went wrong!';
	}
}

if ($_POST['action']==='edit_category') {
	if ($site->update('categories', $_POST)) {
		echo 'Successfully Updated!';
	}	else {
		echo 'Something went wrong!';
	}
}



if ($_POST['action']==='add_to_leads') {
	$_POST['entry_date'] = date('Y-m-d h:s:i');
	if ($site->add('leads', $_POST)) {
		echo 'Successfully Updated!';
	}	else {
		echo 'Something went wrong!';
	}
}




