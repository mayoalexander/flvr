<?php
include_once('../config.php');
require "../vendor/autoload.php";
use Abraham\TwitterOAuth\TwitterOAuth;
session_start();
$access_token['oauth_token'] = '1018532587-pZivWibRwTz1uXmUgWS9XfnQw3HidZ7bLJuwowD';
$access_token['oauth_token_secret'] = '9hc6heSLfF1CTKdAlpScQwiAor9iP0CVLKHz8VzGVmhCi';
$access_token['screen_name'] = 'FreeLabelNet';
$access_token['user_id'] = '1018532587';
$access_token['x_auth_expires'] = '0';
$_SESSION['access_token'] = $access_token;

define('CONSUMER_KEY', 'yaN4EQqnWE8Q4YGFL4lR0xRxi');
define('CONSUMER_SECRET', 'rudYALyDVhfGosR3L4WxPt3go4X6rRwlSuwfmYspkqEJbo9wmX');
define('OAUTH_CALLBACK', 'http://freelabel.net/lvtr/?ctrl=twitter');

$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $_SESSION['access_token']['oauth_token'], $_SESSION['access_token']['oauth_token_secret']);
$site = new Config();

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
			$content = $connection->get($setting);
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
<!-- <script type="text/javascript" src="http://freelabel.net/lvtr/js/dashboard.js"></script> -->
<script type="text/javascript">
	$('.twOpen').click(function(){
		var button = $(this);

		var action = button.text();
		var data = {action: action};
		var elem = $('.widget-container');
		elem.html('wait nigga..');
		$.post("<?php echo $_SERVER['SCRIPT_NAME']?>", data, function(result) {
			elem.html(result);
		});
	});
	$('#twitter_post').submit(function(e){
		e.preventDefault();
		var elem = $(this);
		var data = elem.serialize();
		$.post("<?php echo $_SERVER['SCRIPT_NAME']?>", data, function(result) {
			elem.html(result);
		});
	});

	$('.delete-twitter-post').click(function(){
		var elem = $('.widget-container');
		var button = $(this);
		var id = button.attr('data-id');
		button.text('Please wait..');

		var data = { id: id, action : 'statuses/destroy'}
		$.post("<?php echo $_SERVER['SCRIPT_NAME']?>", data, function(result) {
			button.text('Deleted!');
			button.parent().parent().hide('fast');
		});
	});



	/* NOT FINISHED */
	$('.twitter-response-box').submit(function(e) {
		e.preventDefault();
		var value = $(this).find('input').val();
		alert(value);
	});

	/* NOT FINISHED */
	$('.add-to-leads-button').click(function(e) {
		var lead_username = $(this).attr('data-user');
		alert(lead_username);
	});

	/* NOT FINISHED */
	$('.add-to-leads-button').click(function(e) {
		var lead_username = $(this).attr('data-user');
		alert(lead_username);
	});

</script>



