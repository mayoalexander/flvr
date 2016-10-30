<?php
session_start();
date_default_timezone_set('America/Chicago');
// constants
if ($_SERVER["HTTP_HOST"]==='freelabel.net') {
	define("ROOT", $_SERVER["DOCUMENT_ROOT"] ."/lvtr/");
	define("SITE", "http://freelabel.net/lvtr/");
} else {
	define("ROOT", $_SERVER["DOCUMENT_ROOT"] ."/");
	define("SITE", 'http://mayodot.com/lvtr/');
}

/**
* Site Config Class
*/
class Config
{
	
	function __construct()
	{
		$this->background_color = '#101010';
		$this->primary_color = '#FE3F44';
		$this->secondary_color_grey = '#414A52';
		$this->notifications_color = '#00b3ff';
		$this->success_color = '#5bcf8f';
		$this->panel_color = 'transparent';
		// $this->toolbar_color = '#1a1a1a'; 414A52
		$this->body_text_light = '#e3e3e3';
		$this->toolbar_color = '#303030'; 
		$this->toolbar_text_color = '#e3e3e3';
		// $this->logo = 'http://freelabel.net/images/fllogo.png';
		// $this->logo = 'http://freelabel.net/upload/server/php/upload/alex-mayo-logo-unicolor-150--39539 1985-.png';
		$this->title = 'FREELABEL';
		$this->description = 'CREATE | UPLOAD | SHARE';
		$this->description_long = 'CREATE | UPLOAD | SHARE';
		$this->default_user_img = 'http://www.chemistry.uwc.ac.za/users/eiwuoha/default_profile.jpg';
		// $this->url = 'http://freelabel.net/lvtr/';
		// $this->url = 'http://localhost:8888/';
		$this->facebook_url = 'http://facebook.com/freelabelnet';
		$this->twitter_url = 'http://twitter.com/freelabelnet';
		$this->google_url = 'https://plus.google.com/118212974256600306207';

		$this->url = SITE;
		$this->logo = $this->url.'img/fllogo.png';

		$this->packages['sub'] = 'http://freelabel.net/confirm/sub';
		$this->packages['trial'] = 'http://freelabel.net/confirm/trial';
		$this->packages['basic'] = 'http://freelabel.net/confirm/basic';


		if ($_SERVER['SCRIPT_NAME']=='/lvtr/views/public.php') {
			if (isset($_GET['post_id'])) {
				// echo 'searching by id';
				$this->post_data = $this->get_post_by_id(str_replace('post_id=', '', $_SERVER['QUERY_STRING']));
			} else {
				// echo 'searching by twitter';
				$this->post_data = $this->get_post_by_twitter($_GET['twitter'], $_GET['blog_title']);
			}
			// add post data to config 
			$this->page_title = $this->post_data['twitter'].': '.$this->post_data['blogtitle'];	
		} else {
			$this->page_title = 'FREELABEL';
		}

	}



	function display_meta_tags()
	{
	if ($this->post_data['description']=='') {
		$description = $this->page_title.' // '.$this->description_long;
	} else {
		$description = $this->post_data['description'];
	}
	return "<title>".$this->page_title."</title>
	<meta name=\"description\" content='".$this->page_title.' // '.$this->description_long." '/>
	<meta name='twitter:card' content='summary_large_image' />
	<meta name='twitter:player' content='".$post_url."' />
	<meta name='twitter:player:width' content='300' />
	<meta name='twitter:player:height' content='300' />
	<meta name='twitter:image' content='".$this->post_data['poster']."' />
	<meta name='twitter:site' content='".$this->post_data['poster']."' />
	<meta name='twitter:creator' content='@freelabelnet' />
	<meta name='twitter:title' content='".$this->page_title." | FREELABEL RADIO + MAGAZINE + STUDIOS' />
	<meta name='twitter:text:description' content='".$description."' />
	<meta property='og:url' content='".$this->create_url($this->post_data)."'>
	<meta property='og:title' content='".$this->page_title." | FREELABEL RADIO + MAGAZINE + STUDIOS'>
	<meta property='og:description' content='".$description." | Login at FREELABEL.net'>
	<meta property='og:image' content='".$this->post_data['poster']."'>
	<meta property='og:image:type' content='image/png'>
	<meta property='og:image:width' content='1024'>
	<meta property='og:image:height' content='1024'>
	<link rel='icon' type='image/png' href='".$this->logo."'>
	<link rel='apple-touch-icon' sizes='180x180' type='image/png' href='".$this->url."img/favicons/apple-touch-icon.png'>
	<link rel='icon' type='image/png' href='".$this->url."img/favicons/favicon-32x32.png' sizes='32x32'>
	<link rel='icon' type='image/png' href='".$this->url."img/favicons/favicon-16x16.png' sizes='16x16'>
	<link rel='manifest' href='".$this->url."img/favicons/manifest.json'>
	<link rel='mask-icon' href='".$this->url."img/favicons/safari-pinned-tab.svg' color='#5bbad5'>
	<meta name='theme-color' content='#ffffff'>
	";
	}

	function display_navigation($session, $user_active)
	{

		if (!isset($session)) {
			$nav[] = 'Login';
			$nav[] = 'Register';
		} else {
			$nav[] = 'Dashboard';
			$nav[] = 'Explore';
			$nav[] = 'Categories';
			$nav[] = 'Likes';
			$nav[] = 'Profile';
			$nav[] = 'Upload';
			$nav[] = 'Help';
			$nav[] = 'Logout';
			// $nav[] = '<span class="upgrade-button">Upgrade</span>';
		}
		if ($user_active=='100') {
			$nav[] = 'Admin';
		}
		if ($user_active==='0') {
			// $nav[] = '<button class="btn btn-success">Upgrade<button>';
		}

		$build='';
		foreach ($nav as $link) {
			$build .= '<li class="navi_button"><a href="#">'.$link.'</a></li>';
		}
		return $build;
	}




	function get_info($table, $user_name)
	{
		include(ROOT.'config/connection.php');

		// $query = "SELECT * FROM `$table` WHERE `user_name` = '$user_name' ORDER BY `id` DESC LIMIT 20";
		$query = "SELECT * FROM `$table` WHERE `user_name` = '$user_name'";
		$result = mysqli_query($con,$query);
		while($row = mysqli_fetch_assoc($result)) {
			$info[] = $row;
		}
	    mysqli_close($con);
		return $info;
	}



	function get_script()
	{
		include(ROOT.'config/connection.php');

		// $query = "SELECT * FROM `$table` WHERE `user_name` = '$user_name' ORDER BY `id` DESC LIMIT 20";
		$query = "SELECT * FROM script ORDER BY id DESC LIMIT 1";
		$result = mysqli_query($con,$query);
		while($row = mysqli_fetch_assoc($result)) {
			$info[] = $row;
		}
	    mysqli_close($con);
		return $info;
	}

	function view($modual,$data=NULL)
	{
		$url = ROOT.'views/'.$modual.'.php';
		include($url);
	}

	function debug($data, $exit=false)
	{
		echo "<pre>";
		var_dump($data);
		echo "</pre>";
		if ($exit==true) {
			exit;
		}
	}

	function verify_login($session) {
		if (isset($session['user_name'])) {
			$status = true;
		} else {
			$status = false;
		}
		return $status;
	}

	function require_login() {
		if (!isset($_SESSION['user_name'])) {
			echo "<script>window.location.assign('{$this->url}?ctrl=login');</script>";
		} else {
			return true;
		}
	}
	function require_content($user_name) {
		$media = $this->get_user_media($user_name);
		if (!isset($media)) {
			echo "<script>window.location.assign('{$this->url}?ctrl=upload');</script>";
		} else {
			return true;
		}
	}


	function check_notifications($user_id) {
		// get user data and check database for new notifications
		include('config/connection.php');
		$notifications = $this->get_info('notifications', $user_id);
		// display notification element

		$notification_build = '<section class="notifications">';
		foreach ($notifications as $alert) {
			$notification_build .='<p><i class="fa fa-check"></i>'.$alert['message'].'</p>';
		}
		$notification_build .= '</section>';

		return $notification_build;
	}

	function verify_user_login($data) {

		require(ROOT.'config/connection.php');
		$user_id = $data['user_name'];
		$query = "SELECT * FROM `users` WHERE `user_name` = '$user_id' OR `user_email` = '$user_id' LIMIT 1";
		$result = mysqli_query($con,$query);
		$row = mysqli_fetch_assoc($result);
		if (mysqli_num_rows($result)==1) {
			$this->set_session($row);
			return true;
		} else {
			// echo 'no nigga';
		}
	}

	function set_session($data) {
		session_start();
		$_SESSION['user_name'] = $data['user_name'];
		$_SESSION['user_password'] = $data['user_password'];
		$_SESSION['user_active'] = $data['user_active'];
		$_SESSION['user_logged_in'] = true;
	}



	function get_user_data($user_name, $user_email=NULL, $fullprofile=NULL) {
		require(ROOT.'config/connection.php');
		if (isset($user_email)) {
			$ue = "OR `user_email` = '$user_email'";
		} else {
			$ue = '';
		}
		$query = "SELECT * FROM `users` WHERE `user_name` = '$user_name' $ue LIMIT 1";
		$result = mysqli_query($con,$query);
		$user = mysqli_fetch_assoc($result);


		if (isset($fullprofile)) {
			$user = array_merge($user, $this->get_user_profile($user_name));
		}
	    mysqli_close($con);
		return $user;
	}

	function get_user_url($user) {
		return $this->url . 'views/view.php?user_name='.$user['user_name'];
	}

	function get_user_profile($user_name) {
		require(ROOT.'config/connection.php');
		$query = "SELECT * FROM `user_profiles` WHERE `id` = '$user_name' LIMIT 1";
		$result = mysqli_query($con,$query);
		$user = mysqli_fetch_assoc($result);
	    mysqli_close($con);
		return $user;
	}

	function get_user_media($user_name, $page=0) {
		$db_page = $page * 20;
		require(ROOT.'config/connection.php');
		$query = "SELECT * FROM `feed` WHERE `user_name` = '$user_name' ORDER BY `id` DESC LIMIT $db_page, 20";
		$result = mysqli_query($con,$query);
		while ($row = mysqli_fetch_assoc($result)) {
			$media[] = $row;
		}
	    mysqli_close($con);
		return $media;
	}

	function display_play_button($post)
	{

		if ($post['type']!=='photo') {
			$icon = 'fa-play';
		} else {
			$icon = 'fa-expand';
		}

		return '<span class="play_button button-tint btn btn-link btn-'.$post['id'].' pull-left" style="display:inline-block;" data-type="'.$post['type'].'" data-mp3="'.$post['trackmp3'].'" data-title="'.$post['blogtitle'].'" data-twitter="'.$post['twitter'].'"><i class="fa '.$icon.'"></i></span>';
	}


	function display_share_button($post, $user_name_session=NULL) {
		if (isset($user_name_session) && trim($user_name_session)==trim($post['user_name']) || $user_name_session=='admin') {
			$delete_button = $this->display_delete_button($post);
			$delete_button .= $this->display_edit_button($post);
		} else {
			$delete_button = '';
		}

		return '
						<div class="dropdown clearfix">
						'.$this->display_play_button($post).'
						  <span class="button-tint btn btn-link btn-'.$post['id'].' dropdown-toggle pull-right" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" style="display:inline-block;"><i class="fa fa-ellipsis-h"></i></span>
						  <ul class="dropdown-menu panel-body pull-right" aria-labelledby="dropdownMenu1">
						  	<li><button class="view-post-trigger btn btn-link" data-id="'.$post['id'].'" data-user="'.$user_name_session.'"><i class="fa fa-globe"></i> View</button></li>

						  	'.$delete_button.'
						  	<li><button class="like-post-trigger btn btn-link" data-id="'.$post['id'].'" data-user="'.$user_name_session.'"><i class="fa fa-star-o"></i> Like</button></li>
						  	<li><button class="add-post-trigger btn btn-link" data-id="'.$post['id'].'" data-user="'.$user_name_session.'"><i class="fa fa-plus"></i> Add To</button></li>
						  	<li><button class="share-post-trigger btn btn-link" data-id="'.$post['id'].'" data-title="'.$post['blogtitle'].'" data-twitter="'.$post['twitter'].'" data-method="twitter"><i class="fa fa-twitter"></i> Twitter</button></li>
						  	<li><button class="share-post-trigger btn btn-link" data-id="'.$post['id'].'" data-title="'.$post['blogtitle'].'" data-twitter="'.$post['twitter'].'" data-method="facebook"><i class="fa fa-facebook" ></i> Facebook</button></li>
						    <input type="hidden" name="user_name" value="'.$post['user_name'].'">
						  </ul>
						</div>';
	}

	function display_media_list($media) {
		if (isset($media)) {
			foreach ($media as $key => $post) {
				echo '<article class="tracklist-item">';
					echo '<a href="#" data-id="'.$post['id'].'"> <img src="'.$post['photo'].'"/> <b>'.$post['twitter'].'</b></a>: '.$post['blogtitle'];
						echo $this->display_share_button($post);
				echo '</article>';
			}
		} else {
				echo '<p class="tracklist-item label nothing-found">';
						echo '<i class="fa fa-alert"></i> No tracks uploaded..';
				echo '</p>';
		}
	}

	function display_media_grid($media, $user_name_session=NULL, $page=0) {
		if (count($media)!==1) {
			$col = 'col-md-4 col-sm-6';
		} else {
			$col = 'col-md-12';
		}
		//	pagination
		$load_more_button = '<button data-user="'.$user_name_session.'" data-next="'.($page+1).'" class="load_more_button btn btn-link btn-block">Load More</button>';
		//
		if (isset($media)) {
			foreach ($media as $key => $post) {

				// if (getimagesize($post['photo']) !== false) { // check if photo exists
					echo '<article class="tracklist-panel '.$col.'">';
						echo '<a href="'.$this->create_url($post).'" data-id="'.$post['id'].'"> 
						<img src="'.$post['photo'].'"/> 
						'.$this->display_share_button($post, $user_name_session).'
						<b>'.$post['twitter'].'</b>
						</a>
						'.$post['blogtitle'];
						echo '<div>'.$this->display_post_status($post).'</div>';
					echo '</article>';
				// }
			}
			if (count($media)==20) {
				echo $load_more_button;
			}
		} else {
				echo '<p class="tracklist-item label nothing-found text-center">';
						echo '<i class="fa fa-alert"></i> Nothing found..';
				echo '</p>';
		}

	}

	function display_post_content($post) {
		switch ($post['type']) {
			case 'photo':
				$embed = "<img src='".$post['photo']."'/>";
				break;
			case 'video':
				$embed = "<video src='".$post['trackmp3']."' controls></video>";
				break;
			case 'audio' || 'single':
				$embed = "<img class='audio_img' src='".$post['photo']."' class='profile_audio_img'></img>";
				$embed .= "<audio id='audio_mp3' src='".$post['trackmp3']."'></audio>";
				$embed .= "<div id='play_button'><i class='fa fa-play-circle'></i></div>";
				break;
			default:
				echo 'somethign went rong! type: '.$post['type'].'<br>';
				var_dump($post); 
				break;
		}
		echo $embed;
	}

	function display_delete_button($post) {
			return '<li><button class="delete-post-trigger btn btn-link" data-id="'.$post['id'].'"><i class="fa fa-trash"></i> Delete</button></li>';
	}
	function display_edit_button($post) {
			return '<li><button class="edit-post-trigger btn btn-link" data-id="'.$post['id'].'"><i class="fa fa-edit"></i> Edit</button></li>';
	}
	function display_post_status($post) {
		if ($post['status']=='private') {
			return '<i class="fa fa-eye-slash"></i>';
		} else {
			return ''.$post['views'].' <i class="fa fa-eye"></i>';
		}
	}



	function format_string($str) {
		$find = array("'",'++' );
		$str = str_replace($find, '', $str);
		return trim($str);
	}
	function format_title($str)
	{
		$find = array(".mp3",".mp4");
		$str = str_replace($find, '', $str);
		return trim($str);
	}


	function get_time_ago( $ptime ) {
		date_default_timezone_set('America/Chicago');
		$estimate_time = time() - $ptime;

		if( $estimate_time < 1 )
		{
		  return 'less than 1 second ago';
		}

		$condition = array(
		  12 * 30 * 24 * 60 * 60  =>  'year',
		  30 * 24 * 60 * 60       =>  'month',
		  24 * 60 * 60            =>  'day',
		  60 * 60                 =>  'hour',
		  60                      =>  'minute',
		  1                       =>  'second'
		  );

		foreach( $condition as $secs => $str )
		{
		  $d = $estimate_time / $secs;

		  if( $d >= 1 )
		  {
		    $r = round( $d );
		    return /*'about ' .*/ $r . ' ' . $str . ( $r > 1 ? 's' : '' ) . ' ago';
		  }
		}
	}


	function create_url($post, $key=0) {
		if (isset($post['blogtitle'])) { // existing post from database
			$shortname = explode(' ',$this->format_string($post['blogtitle']));
			$twitter = $post['twitter'];

		} elseif (isset($post['title']) && is_array($post['title'])) {
			$shortname = explode(' ',$this->format_string($post['title'][$key]));
			$twitter = $post['twitter'][$key];
		} else {
			// echo 'something went wrong..'; exit;
		}
		$url = 'http://freelabel.net/'.$twitter.'/'.$this->url_slug($shortname[0]);
		return $url;
	}

	function create_som_url($user_twitter_name, $tweet) {
		return 'http://freelabel.net/som/index.php?post=1&t='.$user_twitter_name.'&text='.urlencode($tweet);
	}

	function url_slug($str, $options = array()) {
		// Make sure string is in UTF-8 and strip invalid UTF-8 characters
		$str = mb_convert_encoding((string)$str, 'UTF-8', mb_list_encodings());
		
		$defaults = array(
			'delimiter' => '-',
			'limit' => null,
			'lowercase' => true,
			'replacements' => array(),
			'transliterate' => false,
		);
		
		// Merge options
		$options = array_merge($defaults, $options);
		
		$char_map = array(
			// Latin
			'À' => 'A', 'Á' => 'A', 'Â' => 'A', 'Ã' => 'A', 'Ä' => 'A', 'Å' => 'A', 'Æ' => 'AE', 'Ç' => 'C', 
			'È' => 'E', 'É' => 'E', 'Ê' => 'E', 'Ë' => 'E', 'Ì' => 'I', 'Í' => 'I', 'Î' => 'I', 'Ï' => 'I', 
			'Ð' => 'D', 'Ñ' => 'N', 'Ò' => 'O', 'Ó' => 'O', 'Ô' => 'O', 'Õ' => 'O', 'Ö' => 'O', 'Ő' => 'O', 
			'Ø' => 'O', 'Ù' => 'U', 'Ú' => 'U', 'Û' => 'U', 'Ü' => 'U', 'Ű' => 'U', 'Ý' => 'Y', 'Þ' => 'TH', 
			'ß' => 'ss', 
			'à' => 'a', 'á' => 'a', 'â' => 'a', 'ã' => 'a', 'ä' => 'a', 'å' => 'a', 'æ' => 'ae', 'ç' => 'c', 
			'è' => 'e', 'é' => 'e', 'ê' => 'e', 'ë' => 'e', 'ì' => 'i', 'í' => 'i', 'î' => 'i', 'ï' => 'i', 
			'ð' => 'd', 'ñ' => 'n', 'ò' => 'o', 'ó' => 'o', 'ô' => 'o', 'õ' => 'o', 'ö' => 'o', 'ő' => 'o', 
			'ø' => 'o', 'ù' => 'u', 'ú' => 'u', 'û' => 'u', 'ü' => 'u', 'ű' => 'u', 'ý' => 'y', 'þ' => 'th', 
			'ÿ' => 'y',
			// Latin symbols
			'©' => '(c)',
			// Greek
			'Α' => 'A', 'Β' => 'B', 'Γ' => 'G', 'Δ' => 'D', 'Ε' => 'E', 'Ζ' => 'Z', 'Η' => 'H', 'Θ' => '8',
			'Ι' => 'I', 'Κ' => 'K', 'Λ' => 'L', 'Μ' => 'M', 'Ν' => 'N', 'Ξ' => '3', 'Ο' => 'O', 'Π' => 'P',
			'Ρ' => 'R', 'Σ' => 'S', 'Τ' => 'T', 'Υ' => 'Y', 'Φ' => 'F', 'Χ' => 'X', 'Ψ' => 'PS', 'Ω' => 'W',
			'Ά' => 'A', 'Έ' => 'E', 'Ί' => 'I', 'Ό' => 'O', 'Ύ' => 'Y', 'Ή' => 'H', 'Ώ' => 'W', 'Ϊ' => 'I',
			'Ϋ' => 'Y',
			'α' => 'a', 'β' => 'b', 'γ' => 'g', 'δ' => 'd', 'ε' => 'e', 'ζ' => 'z', 'η' => 'h', 'θ' => '8',
			'ι' => 'i', 'κ' => 'k', 'λ' => 'l', 'μ' => 'm', 'ν' => 'n', 'ξ' => '3', 'ο' => 'o', 'π' => 'p',
			'ρ' => 'r', 'σ' => 's', 'τ' => 't', 'υ' => 'y', 'φ' => 'f', 'χ' => 'x', 'ψ' => 'ps', 'ω' => 'w',
			'ά' => 'a', 'έ' => 'e', 'ί' => 'i', 'ό' => 'o', 'ύ' => 'y', 'ή' => 'h', 'ώ' => 'w', 'ς' => 's',
			'ϊ' => 'i', 'ΰ' => 'y', 'ϋ' => 'y', 'ΐ' => 'i',
			// Turkish
			'Ş' => 'S', 'İ' => 'I', 'Ç' => 'C', 'Ü' => 'U', 'Ö' => 'O', 'Ğ' => 'G',
			'ş' => 's', 'ı' => 'i', 'ç' => 'c', 'ü' => 'u', 'ö' => 'o', 'ğ' => 'g', 
			// Russian
			'А' => 'A', 'Б' => 'B', 'В' => 'V', 'Г' => 'G', 'Д' => 'D', 'Е' => 'E', 'Ё' => 'Yo', 'Ж' => 'Zh',
			'З' => 'Z', 'И' => 'I', 'Й' => 'J', 'К' => 'K', 'Л' => 'L', 'М' => 'M', 'Н' => 'N', 'О' => 'O',
			'П' => 'P', 'Р' => 'R', 'С' => 'S', 'Т' => 'T', 'У' => 'U', 'Ф' => 'F', 'Х' => 'H', 'Ц' => 'C',
			'Ч' => 'Ch', 'Ш' => 'Sh', 'Щ' => 'Sh', 'Ъ' => '', 'Ы' => 'Y', 'Ь' => '', 'Э' => 'E', 'Ю' => 'Yu',
			'Я' => 'Ya',
			'а' => 'a', 'б' => 'b', 'в' => 'v', 'г' => 'g', 'д' => 'd', 'е' => 'e', 'ё' => 'yo', 'ж' => 'zh',
			'з' => 'z', 'и' => 'i', 'й' => 'j', 'к' => 'k', 'л' => 'l', 'м' => 'm', 'н' => 'n', 'о' => 'o',
			'п' => 'p', 'р' => 'r', 'с' => 's', 'т' => 't', 'у' => 'u', 'ф' => 'f', 'х' => 'h', 'ц' => 'c',
			'ч' => 'ch', 'ш' => 'sh', 'щ' => 'sh', 'ъ' => '', 'ы' => 'y', 'ь' => '', 'э' => 'e', 'ю' => 'yu',
			'я' => 'ya',
			// Ukrainian
			'Є' => 'Ye', 'І' => 'I', 'Ї' => 'Yi', 'Ґ' => 'G',
			'є' => 'ye', 'і' => 'i', 'ї' => 'yi', 'ґ' => 'g',
			// Czech
			'Č' => 'C', 'Ď' => 'D', 'Ě' => 'E', 'Ň' => 'N', 'Ř' => 'R', 'Š' => 'S', 'Ť' => 'T', 'Ů' => 'U', 
			'Ž' => 'Z', 
			'č' => 'c', 'ď' => 'd', 'ě' => 'e', 'ň' => 'n', 'ř' => 'r', 'š' => 's', 'ť' => 't', 'ů' => 'u',
			'ž' => 'z', 
			// Polish
			'Ą' => 'A', 'Ć' => 'C', 'Ę' => 'e', 'Ł' => 'L', 'Ń' => 'N', 'Ó' => 'o', 'Ś' => 'S', 'Ź' => 'Z', 
			'Ż' => 'Z', 
			'ą' => 'a', 'ć' => 'c', 'ę' => 'e', 'ł' => 'l', 'ń' => 'n', 'ó' => 'o', 'ś' => 's', 'ź' => 'z',
			'ż' => 'z',
			// Latvian
			'Ā' => 'A', 'Č' => 'C', 'Ē' => 'E', 'Ģ' => 'G', 'Ī' => 'i', 'Ķ' => 'k', 'Ļ' => 'L', 'Ņ' => 'N', 
			'Š' => 'S', 'Ū' => 'u', 'Ž' => 'Z',
			'ā' => 'a', 'č' => 'c', 'ē' => 'e', 'ģ' => 'g', 'ī' => 'i', 'ķ' => 'k', 'ļ' => 'l', 'ņ' => 'n',
			'š' => 's', 'ū' => 'u', 'ž' => 'z'
		);
		
		// Make custom replacements
		$str = preg_replace(array_keys($options['replacements']), $options['replacements'], $str);
		
		// Transliterate characters to ASCII
		if ($options['transliterate']) {
			$str = str_replace(array_keys($char_map), $char_map, $str);
		}
		
		// Replace non-alphanumeric characters with our delimiter
		$str = preg_replace('/[^\p{L}\p{Nd}]+/u', $options['delimiter'], $str);
		
		// Remove duplicate delimiters
		$str = preg_replace('/(' . preg_quote($options['delimiter'], '/') . '){2,}/', '$1', $str);
		
		// Truncate slug to max. characters
		$str = mb_substr($str, 0, ($options['limit'] ? $options['limit'] : mb_strlen($str, 'UTF-8')), 'UTF-8');
		
		// Remove delimiter from ends
		$str = trim($str, $options['delimiter']);
		
		return $options['lowercase'] ? mb_strtolower($str, 'UTF-8') : $str;
	}




	function display_social_links($profile) {
		if ($profile['twitter']!=='') {
			echo '<p><a href="http://twitter.com/'.$profile['twitter'].'"><i class="fa fa-twitter"></i> '.$profile['twitter'].'</a></p>';
		}
		if ($profile['instagram']!=='') {
			echo '<p><a href="http://instagram.com/'.$profile['instagram'].'"><i class="fa fa-instagram"></i> '.$profile['instagram'].'</a></p>';
		}
		if (trim($profile['facebook'])!=='') {
			echo '<p><a href="http://facebook.com/'.$profile['facebook'].'"><i class="fa fa-facebook"></i> '.$profile['facebook'].'</a></p>';
		}

	}

	function display_profile_photo($profile) {
		// if (getimagesize($profile['photo']) !== false) {
		if (getimagesize($profile['photo']) !== false) {
			echo $profile['photo'];
		} else {
			echo $this->default_user_img;
		}
	}

	function display_user_name($profile, $setting='user_name') {
		var_dump($profile);
		exit;
		echo '<a href="'.$this->url.'views/view.php?user_name='.$profile['id'].'" >asdf'.$profile['id'].'</a>';
	}





	public function  update_stats($counts , $id) {
		$new_counts = $counts+1;
		include(ROOT."config/connection.php");
		$sql = "UPDATE  `feed` SET  `views` =  '$new_counts' WHERE  `id` = $id LIMIT 1 ;";
		if ($update_count = mysqli_query($con,$sql)) {
		  $debug[] = 'Updated!!!: '.$sql;
		} else {
		  $debug[] = 'SOMETHING WITH UPDATING THE QUERY DIDNT WORK!';
		};
	    mysqli_close($con);
		return $debug;
	}





	function get_user_friends($user_name, $page=0) {
		$db_page = $page * 20;
		require(ROOT.'config/connection.php');
		$query = "SELECT * FROM `relationships` WHERE `user_name` = '$user_name' ORDER BY `id` DESC LIMIT $db_page, 20";
		if ($result = mysqli_query($con,$query)) {		
			while ($row = mysqli_fetch_assoc($result)) {
						$friends[] = $row;
					}
		} else {
			$friends = NULL;
		}
	    mysqli_close($con);
		return $friends;
	}

	function get_user_liked($user_name, $page=0) {
		$db_page = $page * 20;
		require(ROOT.'config/connection.php');
		$query = "SELECT likes.user_name, likes.post_id, feed.blogtitle, feed.twitter
FROM likes
INNER JOIN feed
ON likes.post_id=feed.id WHERE likes.user_name = '$user_name' ORDER BY likes.id DESC LIMIT $db_page, 20";
		// $query = "SELECT * FROM `likes` ;
		if ($result = mysqli_query($con,$query)) {		
			while ($row = mysqli_fetch_assoc($result)) {
						$liked[] = $row;
					}
		} else {
			$liked = NULL;
		}
	    mysqli_close($con);
		return $liked;
	}



	function get_user_categories($user_name) {
		$db_page = $page * 20;
		require(ROOT.'config/connection.php');
		$query = "SELECT * FROM categories WHERE user_name = '$user_name' ORDER BY id DESC LIMIT $db_page, 20";
		// $query = "SELECT * FROM `likes` ;
		if ($result = mysqli_query($con,$query)) {		
			while ($row = mysqli_fetch_assoc($result)) {
						$categories[] = $row;
					}
		} else {
			$categories = NULL;
		}
	    mysqli_close($con);
		return $categories;
	}


	function display_friends_list($friends) {
		if ($friends) {
			foreach ($friends as $key => $post) {
				echo '<p class="friendslist-item">';
					echo '<b>'.$post['following'].'</b>';
					echo '<i class="fa fa-ellipsis-h pull-right"></i>';
				echo '</p>';
			}
		} else {
				echo '<p class="friendslist-item">';
					echo '<p>You have no friends! :(</p>';
					// echo '<i class="fa fa-ellipsis-h pull-right"></i>';
				echo '</p>';
		}
	}


	function display_categories_list($categories) {
		if ($categories) {
			foreach ($categories as $key => $post) {
				echo '<p class="categorieslist-item">';
					echo '<b>'.$post['name'].'</b>';
					echo '<i class="edit-category fa fa-ellipsis-h pull-right"></i>';
				echo '</p>';
			}
		} else {
				echo '<p class="categorieslist-item">';
					echo '<p>You have no categories! :(</p>';
					// echo '<i class="fa fa-ellipsis-h pull-right"></i>';
				echo '</p>';
		}
	}

	function display_users_list($user_profiles) {
		if ($user_profiles) {
			foreach ($user_profiles as $key => $profile) {
				$profile['user_name'] = $profile['id'];
				if (!$this->get_user_media($profile['id'])=='') {
					$media_status = 'View Tracks';
				} else {
					$media_status = '';
				}
				echo '<p class="userlist-item row">';
					echo '<span class="col-md-2 col-sm-3"><img src="'.$profile['photo'].'"/></span>';
					echo '<span class="col-md-2 col-sm-3"><a href="'.$this->get_user_url($profile).'" target="_blank">'.$profile['id'].'</a></span>';
					echo '<span class="col-md-2 col-sm-3 text-muted">'.$this->get_time_ago(strtotime($profile['date_created'])).'</span>';
					echo '<span class="col-md-2 col-sm-3 text-muted">'.$media_status.'</span>';
					echo '<i class="fa fa-ellipsis-h pull-right view-details" data-user='.$profile['id'].'></i>';
				echo '</p>';
			}
		} else {
				echo '<p class="userlist-item">';
					echo '<p>You have no friends! :(</p>';
					// echo '<i class="fa fa-ellipsis-h pull-right"></i>';
				echo '</p>';
		}
	}



	function display_liked_posts($liked) {
		if ($liked) {
			foreach ($liked as $key => $post) {
				echo '<p class="friendslist-item">';
					echo '<b>'.$post['twitter'].' - '.$post['blogtitle'].'</b>';
					echo '<i class="fa fa-ellipsis-h pull-right"></i>';
				echo '</p>';
			}
		} else {
				echo '<p class="friendslist-item">';
					echo '<p>You have not liked any post yet! :(</p>';
					// echo '<i class="fa fa-ellipsis-h pull-right"></i>';
				echo '</p>';
		}
	}







	function get_all($table) {
		require(ROOT.'config/connection.php');
		$query = "SELECT * FROM `$table` ORDER BY `id` DESC LIMIT 100";
		$result = mysqli_query($con,$query);
		if (mysqli_num_rows($result)===0) {
			echo "Uh oh, there was no posts found!";
			exit;
		} else {
			while ($row = mysqli_fetch_assoc($result)) {
				$posts[] = $row;
			}
		}
	    mysqli_close($con);
		return $posts;
	}

	function get_all_users($table, $db_page=0) {
		require(ROOT.'config/connection.php');
$query = "SELECT *
FROM user_profiles ORDER BY user_profiles.date_created DESC LIMIT 100";
		$result = mysqli_query($con,$query);
		if (mysqli_num_rows($result)===0) {
			echo "Uh oh, there was no users found!";
			exit;
		} else {
			while ($row = mysqli_fetch_assoc($result)) {
				$users[] = $row;
			}
		}
	    mysqli_close($con);
		return $users;
	}



	function get_post_by_id($slug) {
		require(ROOT.'config/connection.php');
		$query = "SELECT * FROM `feed` WHERE `id` = '$slug' ORDER BY `id` DESC LIMIT 1";
		$result = mysqli_query($con,$query);
		if (mysqli_num_rows($result)===0) {
			echo "Uh oh, there was no posts found!";
			exit;
		} else {
			while ($row = mysqli_fetch_assoc($result)) {
				$post = $row;
			}
		}
	    mysqli_close($con);
		return $post;
	}


	function get_post_by_twitter($slug, $title_slug=NULL) {
		if (isset($title_slug)) {
			$a = "AND `blogtitle` LIKE '%".$title_slug."%'";
		} else {
			$a='';
		}
		require(ROOT.'config/connection.php');
		$query = "SELECT * FROM `feed` WHERE `twitter` LIKE '%$slug%' $a ORDER BY `id` DESC LIMIT 1";
		// var_dump($query);
		$result = mysqli_query($con,$query);
		if (mysqli_num_rows($result)===0) {
			echo "Uh oh, there was no posts found!";
			exit;
		} else {
			while ($row = mysqli_fetch_assoc($result)) {
				$post = $row;
			}
		}
	    mysqli_close($con);
		return $post;
	}


	function get_post_by_search($slug, $user_name=NULL, $page=0, $show_private=false) {
		require(ROOT.'config/connection.php');
		if (isset($user_name)) {
			$uc = "AND `user_name` = '$user_name'";
		} else {
			$uc = '';
		}
		if ($show_private===true) {
			$status = '';
		} else {
			$status = "AND `status`='public'";
		}
		$query = "SELECT * FROM `feed` 
		WHERE `user_name` LIKE '%$slug%' $status $uc
		OR `blogtitle` LIKE '%$slug%' $status $uc
		OR `twitter` LIKE '%$slug%' $status $uc
		ORDER BY `id` DESC LIMIT 24";
		$result = mysqli_query($con,$query);
		while ($row = mysqli_fetch_assoc($result)) {
			$post[] = $row;
		}
	    mysqli_close($con);
		return $post;
	}


	function get_explore_posts($user_name=NULL, $page=0) {
		require(ROOT.'config/connection.php');
		$status = "AND `status`='public'"; // $slug = get_user_slugs($user_name); [0] = category
		$slug = '';
		$query = "SELECT * FROM `feed` 
		WHERE `user_name` LIKE '%$slug%' $status
		OR `blogtitle` LIKE '%$slug%' $status
		OR `twitter` LIKE '%$slug%' $status
		ORDER BY `id` DESC LIMIT 24";
		$result = mysqli_query($con,$query);
		while ($row = mysqli_fetch_assoc($result)) {
			$post[] = $row;
		}
		// var_dump($query);

	    mysqli_close($con);
		return $post;
	}










	function check_if_user_exists($data) {
		$user_name = $data['user_name'];
		$user_email = $data['user_email'];
		$user_password = $data['user_password'];

		require(ROOT.'config/connection.php');
		$result = $this->get_user_data($user_name, $user_email);
		return $result;
		// var_dump($result);
	}





	function create_new_user($data) {
		require(ROOT.'config/connection.php');
		$user_name = mysqli_real_escape_string($con, $data['user_name']);
		$user_email = mysqli_real_escape_string($con, $data['user_email']);
		$user_password = mysqli_real_escape_string($con, $data['user_password']);

		$query = "INSERT INTO users (user_name, user_email, user_password)
		VALUES ('$user_name', '$user_email', '$user_password')";
		if ($result = mysqli_query($con,$query)) {
		    $res = "New User Created! Proceed to create profile";
		} else {
		    $res = "Error: " . $sql . "<br>" . mysqli_error($con);
		}
	    mysqli_close($con);
		return $res;
	}


	function create_new_profile($data) {
		require(ROOT.'config/connection.php');
		$user_name = mysqli_real_escape_string($con, $data['user_name']);
		$name = mysqli_real_escape_string($con, $data['name']);
		$location = mysqli_real_escape_string($con, $data['location']);
		$phone = mysqli_real_escape_string($con, $data['phone']);
		$photo = mysqli_real_escape_string($con, $data['photo']);
		$brand = mysqli_real_escape_string($con, $data['brand']);
		$twitter = mysqli_real_escape_string($con, $data['twitter']);
		$description = mysqli_real_escape_string($con, $data['description']);
		$instagram = mysqli_real_escape_string($con, $data['instagram']);
		$soundcloud = mysqli_real_escape_string($con, $data['soundcloud']);
		$youtube = mysqli_real_escape_string($con, $data['youtube']);
		$paypal = mysqli_real_escape_string($con, $data['paypal']);
		$snapchat = mysqli_real_escape_string($con, $data['snapchat']);

		$todays_date = date('Y-m-d');

		if ($this->verify_user_profile($data)===NULL) {
			$query = "INSERT INTO user_profiles (id, date_created ,name, location, brand, twitter, description, instagram, soundcloud, youtube, paypal, snapchat, photo)
			VALUES ('$user_name', '$todays_date' ,'$name', '$location', '$brand', '$twitter' , '$description', '$instagram', '$soundcloud', '$youtube', '$paypal', '$snapchat', '$photo')";
		} else {
			$query = "UPDATE user_profiles 
			SET `name`='$name', 
			`location`='$location', 
			`twitter`='$twitter', 
			`description`='$description', 
			`instagram`='$instagram', 
			`soundcloud`='$soundcloud', 
			`youtube`='$youtube', 
			`paypal`='$paypal', 
			`snapchat`='$snapchat', 
			`phone`='$phone', 
			`photo`='$photo', 
			`brand`='$brand' WHERE `id`='$user_name'";
		}
		if ($result = mysqli_query($con,$query)) {
		    // $res = "<alert class='alert alert-success'>Profile Saved!</alert>";
		    $res = "<i class='fa fa-check'></i> Profile Saved!";
		} else {
		    $res = "Error: " . $sql . "<br>" . mysqli_error($con);
		}
	    mysqli_close($con);
		return $res;
	}

	function verify_user_profile($data) {
		require(ROOT.'config/connection.php');
		$user_id = $data['user_name'];
		$query = "SELECT * FROM `user_profiles` WHERE `id` = '$user_id' LIMIT 1";
		$result = mysqli_query($con,$query);
		$row = mysqli_fetch_assoc($result);
		if ($row===NULL) {
			// No Profile Exists
		    mysqli_close($con);
			return NULL;
		} else {
			// Profile Exists, Update
		    mysqli_close($con);
			return true;
		}
	}


	function delete($table, $id='') {
		include(ROOT.'config/connection.php');
		$deletequery = mysqli_query($con,"DELETE FROM `$table` WHERE `$table`.`id` = ".$id." LIMIT 1");
		if ($deletequery) {
		  $res = true;
		} else {
		  $res = false;
		}
	    mysqli_close($con);
		return $res;
	}



	function update($table, $data, $id='') {
		include(ROOT.'config/connection.php');
		$i=1;
		$q_data='';
		foreach ($data as $key => $value) {
			if ($key!=='action' && $key!=='id') {
				$q_data.= '`'.$key.'`=\''.mysqli_real_escape_string($con,$value).'\'';
				if ($i!==(count($data)-2)) {
					$q_data .=', ';
				}
				$i++;
			}
		}
		$query = "UPDATE `$table` SET $q_data WHERE `id` = ".$data['id'];
		$editquery = mysqli_query($con,$query);
		if ($editquery) {
		  $res = true;
		} else {
		  $res = false;
		}
	    mysqli_close($con);
		return $res;
	}


	function add($table, $data, $id='') {
		include(ROOT.'config/connection.php');
		$i=1;
		$q_data='';
		echo 'count: '.(count($data)-1);
		var_dump($data);
		foreach ($data as $key => $value) {
			if ($key!=='action' && $key!=='id') {
				$q_data.= ''.$key;
				if ($i!==(count($data)-1)) {
					$q_data .=', ';
				}
				$i++;
			}
		}
		$i=1;
		$q_data2='';
		foreach ($data as $key => $value) {
			if ($key!=='action' && $key!=='id') {
				$q_data2.= "'".$value."'";
				if ($i!==(count($data)-1)) {
					$q_data2 .=', ';
				}
				$i++;
			}
		}
		$query = "UPDATE `$table` SET $q_data WHERE `id` = ".$data['id'];
		$query = "INSERT INTO $table ($q_data) VALUES ($q_data2)";
		echo $query.'<hr>';
		$editquery = mysqli_query($con,$query);
		if ($editquery) {
		  $res = true;
		} else {
		  $res = false;
		}
	    mysqli_close($con);
		return $res;
	}


	function includeJs($library)
	{
		// echo '<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.js"></script>';
	}












  public function getPhotoAds($user_name='admin' , $search_query='advertise registration', $limit=10) {
    include(ROOT.'config/connection.php');
    $sql = "SELECT * FROM  `images` WHERE  `desc` LIKE CONVERT( _utf8 '%$search_query%' USING latin1 ) COLLATE latin1_swedish_ci AND `user_name` LIKE '%$user_name%' ORDER BY `id` DESC LIMIT $limit";
    $result_stats = mysqli_query($con,$sql);
    $i=0;
    while($row = mysqli_fetch_assoc($result_stats)) {
      $photos[] = $row;
    }

    mysqli_close($con);
    return $photos;
  }


	function display_ads_grid($media) {
		if (isset($media)) {
			foreach ($media as $key => $post) {
				echo '<article class="tracklist-panel col-md-4">';
					echo '<a href="'.$this->url.'views/promo.php?post_id='.$post['id'].'" data-id="'.$post['id'].'"> <img src="'.$post['image'].'"/> <b>'.$post['title'].'</b></a>';
					echo $this->display_share_button($post);
				echo '</article>';
			}
		} else {
				echo '<p class="tracklist-item label nothing-found">';
						echo '<i class="fa fa-alert"></i> No tracks uploaded..';
				echo '</p>';
		}
	}















	function display_direct_messages($content) {
		foreach ($content as $key => $message) {
			$sender_twitter = $message->sender->screen_name;
			$sender_name = $message->sender->name;
			$sender_location = $message->sender->location;
			$sender_msg = $message->text;
			$sender_img = $message->sender->profile_image_url;
			$msg =  '<blockquote><p>'.$sender_msg.'</p><footer>'.$sender_name.' in <cite title="Source Title">'.$sender_location.'</cite></footer></blockquote>';
			$messages[$sender_twitter]['sender'] = $sender_twitter;
			$messages[$sender_twitter]['sender_img'] = $sender_img;
			$messages[$sender_twitter]['messages'][]['text'] = $msg;
		}
		foreach ($messages as $convo) {
			echo '<h4 class="page-header"><img width="36px" src="'.$convo['sender_img'].'" class="img-thumbnail">@'.$convo['sender'].'</h4>';
			foreach ($convo['messages'] as $message) {
				echo $message['text'];
			}
		}
	}


  public function get_friends_cred($user_name) {
    include(ROOT.'config/connection.php');
    // var_dump($con);
    $query = "SELECT relationships.user_name, relationships.following, users.user_email, users.user_id
FROM relationships
INNER JOIN users
ON relationships.following=users.user_name WHERE relationships.user_name = '$user_name'";
    // $query = "SELECT * FROM  `relationships` WHERE `user_name` = '$user_name' ORDER BY `date_created` DESC";
    $result = mysqli_query($con,$query);
    while($row = mysqli_fetch_assoc($result)) {
      $users[] = $row;
    }
    mysqli_close($con);
    return $users;
  }

  public function get_friends($user_name) {
    include(ROOT.'config/connection.php');
    // var_dump($con);
    $query = "SELECT relationships.user_name, relationships.following, user_profiles.twitter, user_profiles.name
FROM relationships
INNER JOIN user_profiles
ON relationships.following=user_profiles.id WHERE relationships.user_name = '$user_name'";
    // $query = "SELECT * FROM  `relationships` WHERE `user_name` = '$user_name' ORDER BY `date_created` DESC";
    $result = mysqli_query($con,$query);
    while($row = mysqli_fetch_assoc($result)) {
      $users[] = $row;
    }
    mysqli_close($con);
    return $users;
  }

  public function display_friends_list_dropdown($friends, $input_key='twitter') {
	$build='<select name="'.$input_key.'" class="form-control">';
	foreach ($friends as $key => $friend) {
		$build .= '<option value="'.$friend[$input_key].'">'.$friend['following'].'</option>';
	}
	$build.="</select>";
	return $build;
  }


  public function create_select_dropdown($array, $input_key=NULL) {

	$build='<select name="'.$input_key.'" class="form-control">';
	foreach ($array as $key => $item) {
		$build .= '<option value="'.$item['name'].'">'.$item['name'].'</option>';
	}
	$build.="</select>";
	return $build;
  }




  public function like_post() {
  	include(ROOT.'config/connection.php');
	  	$sql = "INSERT INTO `likes` (`id` ,`post_id` ,`user_name` ,`date_liked`)
	VALUES (NULL ,  '".$_POST['post_id']."',  '".$_POST['user_name']."', CURRENT_TIMESTAMP
	);";
	// var_dump($sql);
	if (mysqli_query($con, $sql)) {
	    // echo '<script>';
	    // //echo 'window.open('')';
	    // //echo 'alert()';
	    // echo 'window.open("'.$script.'");';
	    // //echo 'alert("'.$script.'");';
	    // echo '</script>';
	} else {
	    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
	mysqli_close($con);

  }









	function display_manage_user_options($session)
	{

		if (!isset($session)) {
			$nav[] = 'Login';
			$nav[] = 'Register';
		} else {
			$nav[] = 'View';
			$nav[] = 'Contact';
			$nav[] = 'Promote';
			$nav[] = 'Schedule';
		}

		$build='';
		foreach ($nav as $link) {
			$build .= '<li class="manage-user-trigger"><a href="#">'.$link.'</a></li>';
		}
		return $build;
	}








  /* UPDATING DATA */
	function showProfilePicture($value) {
		echo '<h4><i class="fa fa-photo"></i> Update Photo</h4>
		<div class="upload-profile-photo-area clearfix">
			<input type="file" class="form-control post_photo file_input" name="photo" style="height:200px;">
			<img src="'.$value.'">
			<span class="file-upload-results"></span>
		</div>';
	}

	function textInput($key , $value, $class=null) {

		if (isset($class) && $class===true) {
			$class = 'promo-date-picker';
			$value = date('Y-m-d', strtotime($value));
		} else {
			$class = '';
		}

		echo '<label>'.ucfirst($key).'</label><input type="text" name="'.$key.'" class="form-control '.$class.'" value="'.$value.'">';
	}

	function textArea($key , $value) {
		echo "<label>".ucfirst($key)."</label><textarea class='form-control' name='description' >".$value."</textarea>";
	}

	function hiddenInput($key , $value) {
		echo "<input type='hidden' class='form-control' name='".$key."' value='".$value."' >";
	}

	function displayInputGroup($post) {
		/* LOAD CONFIGURATION APP */
		foreach ($post as $key => $value) {
			switch ($key) {
				case 'description':
					textArea($key, $value);
					break;
				case 'blogtitle':
					textInput($key , $value);
					break;
				case 'twitter':
					textInput($key , $value);
					break;
				case 'start_date':
					textInput($key , $value,true);
					break;
				case 'desc':
					textInput($key , $value);
					break;
				// case 'photo':
				// 	echo 'photo!: '.$value;
				// 	showProfilePicture($key , $value);
				// 	break;
				case 'id':
					hiddenInput($key , $value);
					break;
			}
		}
	}





  	/*
	*
	*	FTP Upload to Radio
	* 	
	*	Upload Media to Twitter API
	*
	*/
	public function uploadToRadio($file) {
		$fileupload = $file['trackmp3'];
		$todays_date 	=	date('Ymd');
		$ftp_server		=		"pink.radio.co"; 
		$ftp_user_name	=		"s95fa8cba2.uf29485319"; 
		$ftp_user_pass	=		"d111ea334e75"; 

		// REMOTE PATH FORMAT
		if ($file['user_name'] == 'admin') { 
			// ADMIN or STAFF UPLOAD
			$remote_file = 'production/'.$file['twitter']." - ".$file['blogtitle'].".mp3"; 
			$debug[] = "Uploading to ".$remote_file;

		} elseif($file['user_name'] != 'submission') {
			// PAID UPLOAD
			$remote_file = 'clients/'.$file['twitter']." - ".$file['blogtitle'].".mp3"; 
			$debug[] = "Uploading to ".$remote_file;
		} elseif($file['user_name'] == 'submission') {
			// SUBMISSION UPLOAD
			$remote_file = 'submissions/'.$file['twitter']." - ".$file['blogtitle'].".mp3"; 
			$debug[] = "Uploading to ".$remote_file;
		}
		if ($fileupload && $remote_file) {
			// do nothing
		} else {
			$debug[] = 'There is No Set File!';
			//print_r($file);
			//print_r($fileupload);
			//print_r($remote_file);

		}


		// -------------- set up basic connection 
		$conn_id = ftp_connect($ftp_server); 

		// login with username and password 
		$login_result = ftp_login($conn_id, $ftp_user_name, $ftp_user_pass); 

		var_dump($login_result);
		// upload a file 
		if (ftp_put($conn_id, $remote_file, $fileupload, FTP_BINARY)) { 
			$ftp_status = true;
		    $debug[] = "FTP successfully uploaded $file<br><br>Uploaded to: $remote_file"; 
		} else { 
			$ftp_status = false;
		    $debug[] ="There was a problem while uploading $file\n"; 
		    } 
		// -------------- Closing the basic connection 
		ftp_close($conn_id); 


		//print_r($file);
		var_dump($debug);
		//echo 'This is gone work, nigga.';
		//exit;
		// return $ftp_status;
		return $debug;
	}


	public function getTwitpicURL($post, $key=0) {

		$_GET['a']  = 'uploadmedia';
		$_GET['f']  = str_replace('http://', '', $post['photo'][$key]);
		$_GET['t'] = '[NEW] '.$post['twitter'][$key].'

'.$post['title'][$key].'

'.$this->create_url($post);
		
		include('/home/freelabelnet/public_html/social-test/index.php');
		//exit;
		//print_r($debug);
		return $twitpic;
	}



	public function sendMail($emailToSendTo, $trackname, $twittername, $trackmp3, $photo , $phone) {


		include(ROOT.'mailer/PHPMailerAutoload.php');
		$mail_message_body = '
		<html>
			<head>
				<link rel="stylesheet" type="text/css" href="http://freelabel.net/css/normalize.css">
			  	<link rel="stylesheet" type="text/css" href="http://freelabel.net/bootstrap-3.3.4/dist/css/bootstrap.css"> 
			  	<link rel="stylesheet" type="text/css" href="http://freelabel.net/bootstrap-3.3.4/dist/css/bootstrap-theme.min.css">
			  	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
			  	<link rel="stylesheet" type="text/css" href="http://freelabel.net/css/bootstrap-social/bootstrap-social.css">
			  	<link rel="stylesheet" type="text/css" href="http://freelabel.net/css/style.css">
			</head>

			<body>
				<header>
					<img src="http://freelabel.net/images/fllogo.png" style="width:200px;display:block;margin:auto;">
				</header>
				<hr>
				<img src="'.$photo.'" style="width:100%;display:block;margin:auto;">
				<h1>[NEW] "'.$trackname.'" - '.$twittername.'</h1>
				<h3>Your music has been successfully added to the FREELABEL library. <a href="http://freelabel.net/'.$twittername.'" class="btn btn-primary btn-success">View Now</a></h3>
				<p>For stats, booking single, project releases, or interviews, you will need to proceed with creating an account at FREELABEL. <a href="http://freelabel.net/" class="btn btn-primary btn-success">Create An Account</a></p>
			</body>
			<details>
				<p>Phone: '.$phone.'<p>
				<p>Twitter: '.$twittername.'<p>
			</details>
			<hr>
			<footer>
				FREELABEL Staff<br>
				info@freelabel.net<br>
				(347)-994-0267
			</footer>
		</html>';

		//Create a new PHPMailer instance
		$mail = new PHPMailer;
		// Set PHPMailer to use the sendmail transport
		$mail->isSendmail();
		//Set who the message is to be sent from
		$mail->setFrom('info@freelabel.net', 'FREELABEL SUBMISSIONS');
		//Set an alternative reply-to address
		$mail->addReplyTo('replyto@freelabel.com', 'FREELABEL SUBMISSIONS');
		//Set who the message is to be sent to
		$mail->addAddress($emailToSendTo, 'ARTIST: '.$twittername);
		//Set the subject line
		$mail->Subject = $twittername.' - "'.$trackname.'" was Added to FREELABEL!';
		$mail->AddBCC('notifications@freelabel.net', $name = "FL Staff");
		//Read an HTML message body from an external file, convert referenced images to embedded,
		//convert HTML into a basic plain-text alternative body
		$mail->msgHTML($mail_message_body);
		//Replace the plain text body with one created manually
		$mail->AltBody = 'This is a plain-text message body';
		//Attach the uploaded file
		$mail->addAttachment($trackmp3);

		//send the message, check for errors
		if (!$mail->send()) {
			$result=true;
		    echo "Mailer Error: " . $mail->ErrorInfo;
		} else {
			$result=false;
		    //echo "Message sent to ".$emailToSendTo;
		}
		return $result;


	}



}

?>
