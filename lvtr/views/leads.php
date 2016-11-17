<?php
include_once('../config.php');
$site = new Config();

$users = $site->get_leads();
// $site->debug($users,1);
?>

<section class="container">
	<h1 class="page-header">Leads</h1>
	<?php $site->display_leads($users); ?>
</section>


<script type="text/javascript" src="<?php echo $site->url; ?>/js/dashboard.js"></script>

<script type="text/javascript">
	$(function(){
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

	});
</script>