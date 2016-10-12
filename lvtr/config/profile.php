<?php
require('../config.php');

/**
* 
*/
class Profile extends Config
{
	public static $data;

	function __construct($data)
	{
		$this->data = $data;
	}

	function get_data() {
		$data = $this->get_info('users', $this->data['user_name']);
		return $data[0];
	}

	function update_info($table, $col,$data, $user_name) {
		require(ROOT.'config/connection.php');
		$query = "UPDATE `$table`
		SET `$col`='$data' WHERE `id`='$user_name'";
		if ($result = mysqli_query($con,$query)) {
		    // $res = "<alert class='alert alert-success'>Profile Saved!</alert>";
		    $res = "<i class='fa fa-check'></i> Profile Saved!";
		} else {
		    $res = "Error: " . $sql . "<br>" . mysqli_error($con);
		}
		return $res;
	}

}



$upload = new Profile($_POST);
$key = key($_POST);
$status = $upload->update_info('user_profiles', $key, $_POST[$key], $_POST['user_name']);
echo $status;