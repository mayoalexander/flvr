<?php
// include_once('../config.php');
// $site = new Config();
include_once('../header.php');

$user = $site->get_user_data($_GET['user_name']);
$profile = $site->get_user_profile($_GET['user_name']);
$media = $site->get_user_media($_GET['user_name'], 0); // '0' pulling the 1st page results
$friends = $site->get_user_friends($_GET['user_name'], 0); // '0' pulling the 1st page results



if ($profile==NULL) {
	include(ROOT.'views/profile_not_configured.php');
	include(ROOT.'footer.php');
 	exit;
}


// $post = $site->get_post_by_id($_GET['id']);
// $profile_user_name = $post['user_name'];

// $user = $site->get_user_data($post['user_name']);
// $profile = $site->get_user_profile($post['user_name']);
// $media = $site->get_user_media($post['user_name'], 0); // '0' pulling the 1st page results
// $friends = $site->get_user_friends($post['user_name'], 0); // '0' pulling the 1st page results
// $user = $site->get_user_feed($post['user_name']);
?>
		<style type="text/css">
			.profile_image img, .profile_image video, .profile img {
				width: 100%;
				display: block;
			}
			.profile img {
				display: block;
				padding:0;
			}
			iframe {
				width: 100%;
			}
/*			.tracklist-panel {
				padding:1em;
			}*/
			.heading {
				padding-bottom: 4em;
			    margin-bottom: 3em;
			    margin-top: 4em;
			    border-bottom: 1px solid #e3e3e3;
			}
			.profile h1 {
				margin-top:0;
				display: inline-block;
			}
			.profile .follow-button {
				color:#3897f0;
				border:1px solid #3897f0;
			    position: relative;
			    bottom: 6px;
			    background: transparent;
			    padding: 0.5em;
			    border-radius: 5px;
			    margin-left: 1em;
			    font-size: 0.8em;
			}
		</style>
		<section class="profile container heading">
			<div class="col-md-4 col-xs-12">
				<!-- <h3>You</h3> -->
				<panel class="profile clearfix">
					<a class="edit_profile_img_trigger" href="#"><img src="<?php $site->display_profile_photo($profile); ?>" class="user_profile_img col-md-4" ></a>
				</panel>
			</div>

			<div class="col-md-5 col-xs-12">
				<!-- <h3>You</h3> -->
				<panel class="profile clearfix">
					<div class="pull-left"">
						<h1>
							<a href="<?php echo $site->url; ?>views/view.php?user_name=<?php echo $user['user_name']; ?>" ><?php echo $profile['name']; ?></a>
						</h1>
						<button class="follow-button">Follow</button>

						<h4><a href="<?php echo $site->url; ?>views/view.php?user_name=<?php echo $user['user_name']; ?>" >
							@<?php echo $user['user_name']; ?></a> - <?php echo $profile['location']; ?></h4>
						
						<p><?php echo $profile['description']; ?></p>
					</div>
				</panel>
			</div>
			<div class="col-md-3 col-xs-12">
				<panel>
					<h4>Links</h5>
					<?php $site->display_social_links($profile); ?>
<!-- 					<h4>Friends</h5>
					<?php $site->display_friends_list($friends); ?> -->
				</panel>
			</div>

		</section>





		<section class="profile container">
				
			<div class="col-md-12 col-xs-12">
				<?php 
					if (!$site->get_post_by_search($user['user_name'])==NULL) { 
						$media = $site->get_post_by_search($user['user_name']);
						shuffle($media);
					
						if ($media1 = $site->get_post_by_search($profile['twitter'])) {
								foreach ($media1 as $value) {
									array_push($media, $value);
								}
						}


						foreach ($media as $key => $value) {
							// echo '<pre>';
							$posts[$value['id']] = $value;
							// echo $value.'<br>';
						}
						echo $site->display_media_grid($posts);


					} else {
						echo $profile['name'].' has not uploaded any new music yet!';
					}
				?>
			</div>

		</section>




<script type="text/javascript" src="<?php echo $site->url ?>js/dashboard.js"></script>
			
		<script type="text/javascript">
			$(function(){

				$('video').hover(function(){
					$(this).get(0).play();
				});
				$('video').click(function(e){
					e.preventDefault();
					var vid = $(this).get(0);
					if (vid.paused) {
						vid.play();
					} else {
						vid.pause();
					}
				});
			});
		</script>

<?php include_once('../footer.php'); ?>