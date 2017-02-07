<?php
include_once('../config.php');
$site = new Config();

$users = $site->get_leads();
// $site->debug($users,1);
?>

<style type="text/css">
	
	.leads .active, .list-group-item.active:focus, .list-group-item.active:hover {
		border:1px solid #303030;
		background-color: #0c2e4c;
	}
	.leads .list-group-item {
		cursor: pointer;
		border:1px solid transparent;
	}
</style>

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

		function updateLeadsPriority() {
			// do nothing!
		}
		function getLeadData(lead_name) {
			var url = 'http://freelabel.net/lvtr/config/leads.php';
			var action = 'get_info';
			$.post(url,{ 
				lead_name:lead_name, 
				action:action 
			}, function(result){
				$('#postModal .modal-body').html(result);
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

			$('.open-lead-button').click(function(){
				var lead_name = $(this).attr('data-user');
				getLeadData(lead_name);
			});


		$('.leads .list-group-item').click(function(){
			if ($(this).hasClass('active')) {
				$(this).hide('fast');
			} else {				
				$(this).addClass('active');
				updateLeadsPriority();
			}
		});


	});
</script>