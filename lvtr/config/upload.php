<?php
include_once('../config.php');

/**
* 
*/
class Upload extends Config
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
	function get_email() {
		$data = $this->get_data();
		return $data['user_email'];
	}
	function get_title() {
		return $this->data['title'];
	}
	function postTotwitter() {
		$this->data['title'];
		// include('twitter.php');
		return;
	}
	function formatTwitter($twitter) {
		$twitter = str_replace('http://twitter.com/', '', strtolower($twitter));
		return $twitter;
	}


	function create_new_post() {
		require(ROOT.'config/connection.php');
		$user_name = $this->data['user_name'];
		$title = $this->data['title'];
		$photos = $this->data['photo'];
		$posters = $this->data['poster'];
		$file = mysqli_real_escape_string($con, $this->data['file']);
		$type = mysqli_real_escape_string($con, $this->data['type']);
		$submission_date = date('Y-m-d h:i:s');
		$tags = '';
		$blogentry = '';

		if (isset($this->data['description'])) {
			$description = mysqli_real_escape_string($con, $this->data['description']);
		} else {
			$description = '';
		}

		foreach ($photos as $key => $photo) {
			// detect status 
			if (isset($this->data['status'])) {
				$status = $this->data['status'];
			} else {
				$status[$key] = 'public';
			}
			// detect custom twitter
			if ($this->data['twitter'][$key]!=='@') {
				$twitter = $this->data['twitter'][$key];
			} else {
				$twitter = $this->data['twitter'];
			}
			/* clean up twitter */
				$twitter = $this->formatTwitter($twitter);

			/* POST TO TWITTER */
			if ($status[$key]=='public') {
				$twitpic = $this->getTwitpicURL($this->data, $key);
			}



			/* UPDATE ID3 TAGS */
			if (true) {
				$filedata['trackmp3'] = $file;
				$filedata['twitter'] = $twitter;
				$filedata['blogtitle'] = $title[$key];
				$this->updateId3Tags($filedata);
			}


			/* UPLOAD TO RADIO - add button for later */
			if (true) {
				$filedata['trackmp3'] = $file;
				$filedata['twitter'] = $twitter;
				$filedata['blogtitle'] = $title[$key];
				$this->uploadToRadio($filedata);
			}
			


			// run query
			$query = "INSERT INTO feed (user_name, blogtitle, photo, twitter, status, trackmp3, type, description, poster, twitpic, submission_date, tags, blogentry)
			VALUES ('$user_name', '".mysqli_real_escape_string($con, $title[$key])."', '".mysqli_real_escape_string($con, $photo)."', '".mysqli_real_escape_string($con, $twitter)."', '$status[$key]', '$file', '$type', '$description', '$posters[$key]', '$twitpic', '$submission_date', '$tags', '$blogentry')";

			if ($result = mysqli_query($con,$query)) {
			    // $res = "New Post Added!<script>setTimeout(function(){window.location.assign('".SITE."?ctrl=upload'); window.open('http://freelabel.net/".$twitter."')},3000)</script> ";
			    $res = "New Post Added!<script>setTimeout(function(){window.location.assign('http://freelabel.net/view/dashboard/upload'); window.open('http://freelabel.net/".$twitter."')},3000)</script> ";
			} else {
			    $res = "Error: " . $sql . "<br>" . mysqli_error($con);
			    return $res;
			}
		}
		return $res;
	}



}




$upload = new Upload($_POST);
$status = $upload->create_new_post();
if ($status) {
	echo $upload->postTotwitter();
}

/* OPEN NEW PAGE*/
echo $status;