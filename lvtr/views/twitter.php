<?php
include_once('../config.php');
require "../vendor/autoload.php";
use Abraham\TwitterOAuth\TwitterOAuth;
$site = new Config();

$connection = new TwitterOAuth(
	$site->twitter['consumer_key'], 
	$site->twitter['consumer_secret'], 
	$site->twitter['oauth_token'], 
	$site->twitter['oauth_token_secret']
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
	echo 'Action: '.$_POST['action'];
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
			echo $site->display_twitter_timeline($content);
			break;


		/* DIRECT MESSAGES - VIEW*/
		case 'statuses/destroy':
			$setting = 'statuses/destroy';
			$options['id'] = $_POST['id'];
			$content = $connection->post($setting, $options);
			var_dump($content);
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
	<div class="container">
		<!-- HTML -->
		<h1 class="page-header">Twitter</h1>
		<button class="twOpen btn btn-primary">compose_new</button>
		<button class="twOpen btn btn-primary">direct_messages</button>
		<button class="twOpen btn btn-primary">statuses/user_timeline</button>
		<button class="twOpen btn btn-primary">statuses/destroy</button>
		<hr>
	</div>
<?php } ?>
















<!-- SCRIPTS -->
<script type="text/javascript" src="http://freelabel.net/lvtr/js/dashboard.js"></script>
<script type="text/javascript">
	$('.twOpen').click(function(e){
		e.preventDefault();
		var button = $(this);

		var action = button.text();
		var data = {action: action};
		var elem = $('.widget-container');
		// var path = "<?php echo $_SERVER['SCRIPT_NAME']?>";
		var path = "http://freelabel.net/lvtr/views/twitter.php";
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


	/* NOT FINISHED */
	$('.call-us-button').click(function(e) {
		e.preventDefault();
		var lead_username = $(this).attr('data-user');
		var url = encodeURI('http://freelabel.net/som/index.php?post=1&text=d @' + lead_username + ' call us asap 347-994-0267');
		window.open(url);
	});


	

</script>



