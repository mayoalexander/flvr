<?php 
// include_once('/kunden/homepages/0/d643120834/htdocs/config/index.php');
// echo '<pre>';
include_once $_SERVER['DOCUMENT_ROOT']."/lvtr/config.php";

require $_SERVER['DOCUMENT_ROOT']."/social-test/vendor/autoload.php";
$site = new Config();

use Abraham\TwitterOAuth\TwitterOAuth;




// $access_token = '1018532587-poe2C6ra1KH6JCJGYGO1ql6VGZUg4zDT0wxB4Ps';
// $access_token_secret = 'u0ShvMlr3O0MoJC0vO7fkLZMVYMWjJB0cDRtAzOGvGKmH';

$connection = new TwitterOAuth('yaN4EQqnWE8Q4YGFL4lR0xRxi', 'rudYALyDVhfGosR3L4WxPt3go4X6rRwlSuwfmYspkqEJbo9wmX', $site->twitter['oauth_token'], $site->twitter['oauth_token_secret']);

/*
** Example call: http://freelabel.net/social-test/?a=uploadmedia&f=freelabel.net/images/fllogo.png
*/
if ($_GET=='') {
	// NO PARAMTERS FOUND!
	echo 'Error: No Parameters Set!';
} else {
	$debug[] = 'Params: <pre>';
	switch ($_GET['a']) {
		case 'uploadmedia':
			// confirm that file parameters are set
			$debug[] = 'Media Upload Initialized<br>';
			if ($_GET['f']!='' AND $_GET['t']!='') {
				$uploadedmedia = 'http://'.str_replace(' ', '%20', $_GET['f']);
				$debug[] = 'photos detected: "'.$uploadedmedia.'"';
				$media1 = $connection->upload('media/upload', array('media' => $uploadedmedia));
				// if (strlen($_GET['t']) > 90) {
				// 	$text = substr($_GET['t'], 0,90).'...';
				// } else {
					$text = $_GET['t'];
				// }
				$parameters = array(
				    'status' => $text, 
				    'media_ids' =>  $media1->media_id_string//implode(',', array($media1->media_id_string, $media2->media_id_string)),
				);

				$content = $connection->post('statuses/update', $parameters);

				//print_r($content->entities->media[0]->display_url);
				$twitpic = $content->entities->media[0]->display_url;
				$debug[] = $media1;
				$debug[] = $content;
				//$twitpic = $media1;
				//return $twitpic;

			} else {
				echo 'No File or Text Found Found!<br>Please use &f=[] and &t=[]<br>';
			}

			//print_r($_GET['a']); // debugging

			break;
		
		default:
			echo 'No Action Set! ("upload media,","post", "directmessages", etc..)';
			break;
	}

}




//echo '<pre>';
//print_r($media1);
//echo '<hr>';
//print_r($content);