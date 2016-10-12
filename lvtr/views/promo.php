<?php //
// include('../config.php');
// $site = new Config();

include('../header.php');

$post = $site->get_post_by_id($_GET['post_id']);
$profile_user_name = $post['user_name'];


/*
	1. Get post from database based on slug
	2. Get Username from data, then pull additional data required to build post
*/

// $post = $site->get_post_by_id($_GET['id']);
// $profile_user_name = $post['user_name'];

// $user = $site->get_user_data($post['user_name']);
// $profile = $site->get_user_profile($post['user_name']);
// $media = $site->get_user_media($post['user_name'], 0); // '0' pulling the 1st page results
// $friends = $site->get_user_friends($post['user_name'], 0); // '0' pulling the 1st page results
// $user = $site->get_user_feed($post['user_name']);
?>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<title><?php echo $site->title; ?></title>
		<link rel="icon" type="image/png" href="<?php echo $site->logo; ?>">
		<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity=" -->
		<link rel="stylesheet" href="<?php echo $site->url; ?>css/bootstrap.css" >
		<link type="text/css" href="<?php echo $site->url; ?>css/normalize.css">
		<link type="text/css" href="<?php echo $site->url; ?>css/css/output.css">
		<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css"> -->
		<link rel="stylesheet" href="<?php echo $site->url; ?>css/font-awesome.css">
		<!-- <link href='https://fonts.googleapis.com/css?family=Oswald:400|Open+Sans+Condensed:300|Abel' rel='stylesheet' type='text/css'> -->
	    <!-- <script type="text/javascript" src="//code.jquery.com/jquery-2.0.3.min.js"></script> -->
	    <script type="text/javascript" src="<?php echo $site->url; ?>js/jquery.min.js"></script>
		<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script> -->
		<script src="<?php echo $site->url; ?>js/bootstrap.min.js"></script>
		<style type="text/css">
			.profile_image img, .profile_image video, .profile img {
				width: 100%;
				display: block;
			}
			.profile img {
				display: block;
			}
			iframe {
				width: 100%;
			}
			.tracklist-panel {
				padding:1em;
			}
		</style>
	</head>
	<body>
		<section class="profile container">

			<div class="dashboard-header">
				<h1 class="pull-left"><a href="<?php echo $site->url; ?>views/view.php?user_name=<?php echo $post['user_name']; ?>"><?php echo($post['user_name']); ?></a></h1>
<!-- 				<div class="pull-right">
					<select class="form-control" >
						<option>View</option>
						<option>View</option>
						<option>View</option>
					</select>
				</div> -->
			</div>
				
			

			<div class="col-md-12 col-xs-12">
				<h3><?php echo($post['blogtitle']); ?></h3>
				<panel class="profile clearfix">
					<a class="profile_image" href="#">
						<?php 
							switch ($post['type']) {
								case 'photo':
									$embed = "<img src='".$post['photo']."'/>";
									break;
								case 'video':
									$embed = "<video src='".$post['trackmp3']."' controls></video>";
									break;
								case 'audio':
									$embed = "<img src='".$post['photo']."' class='profile_audio_img'></img>";
									$embed .= "<audio src='".$post['trackmp3']."' controls></audio>";
									break;
							}
						echo $embed; 
						echo '<hr>'.$post['description']; 
						?>
						<h4 class="pull-right">
							<?php echo $post['twitter']; ?>
						</h4>
						</a>
				</panel>
			</div>

			<div>
				<?php 
					$media = $site->get_post_by_search($post['blogtitle']); 
					shuffle($media);

					$media1 = $site->get_post_by_search($post['twitter']); 
					foreach ($media1 as $value) {
						array_push($media, $value);
					}
					echo $site->display_media_grid($media);
				?>
			</div>

			
		</section>
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

	</body>
</html>