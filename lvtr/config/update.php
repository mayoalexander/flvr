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
	$_POST['unique_id'] = $site->generateRandomString(10);
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



if ($_POST['action']==='log_som') {
	$_POST['entry_date'] = date('Y-m-d h:s:i');
	if ($site->add('som', $_POST)) {
		echo 'Successfully Updated!';
	}	else {
		echo 'Something went wrong updating SOM!';
	}
}



if ($_POST['action']==='save_play') {
	if ($site->like_post($_POST)) {
		echo 'Successfully Updated!';
	}	else {
		echo 'Something went wrong!';
	}
}


if ($_POST['action']==='count_play') {
	if ($site->update('feed',$_POST, $_POST['post_id'])) {
		echo 'Successfully Updated!';
	}	else {
		echo 'Something went wrong!';
	}
}





if ($_POST['action']==='follow_user') {
	$_POST['date_created'] = date('Y-m-d h:s:i');
	if ($site->add('relationships',$_POST, $_POST['post_id'])) {
		echo 'Successfully Updated!';
	}	else {
		echo 'Something went wrong!';
	}
}