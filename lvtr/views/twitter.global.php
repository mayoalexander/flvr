<?php
include_once('../config.php');
require "../vendor/autoload.php";
use Abraham\TwitterOAuth\TwitterOAuth;
$site = new Config();



/* RECOMPILE - REORDERED BY DATE */
function sortByDay($content)
{
	foreach ($content as $key => $post) {
		$post_date = date('m-d', strtotime($post->created_at));
		$todays_date = date('m-d');
		$postsByDate[$post_date][] = $post->text;

	}
	return $postsByDate;
}

function displayByDay($content)
{
	foreach ($content as $date => $posts) {
		echo '<div class="list-group">';
		echo '<h2 class="list-group-item">'.$date.'</h2>';
		foreach ($posts as $key => $message) {
			echo '<p class="list-group-item">'.$message.'</p>';
		}
	}
}

function time_elapsed_string($datetime, $full = false) {
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
        'y' => 'year',
        'm' => 'month',
        'w' => 'week',
        'd' => 'day',
        'h' => 'hour',
        'i' => 'minute',
        's' => 'second',
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
        } else {
            unset($string[$k]);
        }
    }

    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' ago' : 'just now';
}


?>
<div class="widget-container">
	
<?

$bhtwitter['consumer_key'] = '0umXLi52U5XvMuGwk5C3O9leF';
$bhtwitter['consumer_secret'] = 'JeBawoQMF2XSEWgs2uDLXDrteiYoabZJx3E7Oj49WPf0smhhnQ';
$bhtwitter['oauth_token'] = '115461418-krWLT9Xk2Lr4cNz38i5ShLrh6V06Wei3QncWSx3g';
$bhtwitter['oauth_token_secret'] = 'yj2nqdJMBhj9RVNlKZSnVpro3WpS1zDoCGHuUXfTesQdg';

$connection = new TwitterOAuth(
	$bhtwitter['consumer_key'], 
	$bhtwitter['consumer_secret'], 
	$bhtwitter['oauth_token'], 
	$bhtwitter['oauth_token_secret']
	);

$friends = $site->get_friends('admin');
$friends_dropdown = $site->display_friends_list_dropdown($friends);
$compose_new_form = '
<form id="twitter_post">
<label>Send To:</label>'.$friends_dropdown.'
<textarea class="form-control" rows="5" name="message"></textarea>
<button class="btn btn-primary">Send Message</button>

<select name="action" class="form-control">
	<option value="post_public">Public</option><option value="send_direct_message" selected>Send Direct Message</option>
</select>
</form>';


if (isset($_POST['action'])) {
	// echo 'Action: '.$_POST['action'];
	switch ($_POST['action']) {

		/* POST TO PUBLIC */
		case 'post_public':
			$setting = 'statuses/update';
			$options['status'] = $_POST['message'];
			$content = $connection->post($setting, $options);
			// echo '<pre>';
			// var_dump($content);
			break;

		/* COMPOSE NEW */
		case 'compose_new':
			echo $compose_new_form;
			break;

		/* DIRECT MESSAGES - VIEW*/
		case 'direct_messages':
			$setting = 'direct_messages';
			$options['count'] = 200;
			$content = $connection->get($setting,$options);
			echo $site->display_direct_messages($content);
			break;

		/* DIRECT MESSAGES - POST*/
		case 'send_direct_message':
			$setting = 'direct_messages/new';
			$options['text'] = $_POST['message'];
			$options['screen_name'] = $_POST['twitter'];
			$content = $connection->post($setting, $options);
			// var_dump($content);
			break;

		/* USER TIMELINE */
		case 'statuses/user_timeline':
			$setting = 'statuses/user_timeline';
			$options['screen_name'] = $_POST['twitter'];
			$options['count'] = '100';
			$content = $connection->get($setting, $options);
			displayByDay(sortByDay($content));
			// echo $site->display_twitter_timeline($content);
			break;


		/* DIRECT MESSAGES - VIEW*/
		case 'statuses/destroy':
			$setting = 'statuses/destroy';
			$options['id'] = $_POST['id'];
			$content = $connection->post($setting, $options);
			var_dump($content);
			break;










			/* CUSTOM */

			/* USER TIMELINE */
			case 'statuses/user_timeline':
				$setting = 'statuses/user_timeline';
				$options['screen_name'] = $_POST['twitter'];
				$options['count'] = '100';
				$content = $connection->get($setting, $options);
				$site->debug(sortByDay($content));
				// echo $site->display_twitter_timeline($content);
				break;




		default:
			// $setting = 'statuses/user_timeline';
			// $content = $connection->get($setting);
			break;
	}
} else {
	$content = NULL;
}
?>



<?php if (!isset($_POST['action'])) { ?>
	<div class="container-fluid">
		<!-- HTML -->
		<h1 class="page-header">Twitter</h1>
		<button class="twOpen btn btn-primary" data-action="compose_new">Create New Post</button>
		<button class="twOpen btn btn-primary" data-action="direct_messages">Display Direct Messages</button>
		<button class="twOpen btn btn-primary" data-action="statuses/user_timeline">Display Timeline</button>
		<!-- <button class="twOpen btn btn-primary">statuses/destroy</button> -->
		<hr>
		<div class="twModule"></div>
	</div>
<?php } ?>















<script
  src="https://code.jquery.com/jquery-3.1.1.min.js"
  integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
  crossorigin="anonymous"></script>
<!-- SCRIPTS -->
<script type="text/javascript" src="http://freelabel.net/lvtr/js/dashboard.js"></script>
<script type="text/javascript">
	$('.twOpen').click(function(e){
		e.preventDefault();
		var button = $(this);

		var action = button.attr('data-action');
		var data = {action: action};
		var elem = $('.twModule');
		// var path = "<?php echo $_SERVER['SCRIPT_NAME']?>";
		var path = "http://freelabel.net/lvtr/views/twitter.global.php";
		// var path = window.location.href;
		// alert(path);
		elem.html('loading....');
		$.post(path, data, function(result) {
			elem.html(result);
		});
	});
	$('#twitter_post').submit(function(e){
		e.preventDefault();
		var elem = $(this);
		var data = elem.serialize();
		$.post(path, data, function(result) {
			elem.html(result);
		});
	});

	$('.delete-twitter-post').click(function(e){
		e.preventDefault();
		var elem = $('.widget-container');
		var button = $(this);
		var id = button.attr('data-id');
		button.text('Please wait..');

		var data = { id: id, action : 'statuses/destroy'}
		$.post(path, data, function(result) {
			button.text('Deleted!');
			button.parent().parent().hide('fast');
		});
	});

function sendDirectMessage(twitter_name, message) {
		var url = encodeURI('http://freelabel.net/som/index.php?post=1&text=d @' + twitter_name + ' ' + message);
		$.get(url, function(result){
			alert(result);
		});
}

	/* NOT FINISHED */
	$('.twitter-response-box').submit(function(e) {
		e.preventDefault();
		var message = $(this).find('input').val();
		var twitter = $(this).attr('data-twitter');
		var wrap = $(this).parent().parent();
		sendDirectMessage(twitter,message);
		wrap.hide('fast');
		// updateViewCallback(wrap,result);
	});


	/* NOT FINISHED */




	

</script>


</div>

