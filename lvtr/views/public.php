<?php 
include('../header.php');


$post = $site->post_data;
$profile_user_name = $post['user_name'];

// compile media 
// $media = $site->get_post_by_search($post['blogtitle']); 
// shuffle($media);

$media = $site->get_post_by_search($post['twitter']); 
// $site->debug($media,1);
// exit;
// foreach ($media1 as $value) {
// 	array_push($media, $value);
// }
$site->update_stats($post['views'], $post['id']);
/*
	1. Get post from database based on slug
	2. Get Username from data, then pull additional data required to build post
*/

?>
		<style type="text/css">
			.profile_image img, .profile_image video, .profile img, .profile_image img {
				width: 100%;
				display: block;
				margin-top: 1em;
				margin-bottom: 1em;
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
			.profile-body {
				margin-bottom: 5em;
			}
			.profile-body h4 {
				color:<?php echo $site->primary_color; ?>
			}
			#play_button {
			    position: absolute;
			    text-align: center;
			    /* padding: 5em; */
			    bottom: 2em;
			    right: 4em;
			    text-shadow: 1px 1px 30px #000;
			}
			#play_button i {
				font-size:4em;
			}
			.profile-header-banner {
				background-position: center center;
				font-weight: 700;
				letter-spacing: 10px;
				text-shadow: 2px 2px 20px #000000;
				box-shadow: 0 0 10px #303030;
			}
			.jumbotron {
				padding: 0;
			}
			.background-tint {
				padding:5em;
				height: inherit;
				background: rgba(0,0,0,0.4);
				overflow-x: hidden;
			}
		</style>

<div class="jumbotron profile-header-banner" style="background-image:url('<?php echo $post['photo']; ?>');">
	<div class="background-tint">
		<h1><?php echo $post['twitter']; ?></h1>
		<p><?php echo($post['blogtitle']); ?></p>
	</div>
</div>
		<section class="profile container">

			<section class="profile-body clearfix">
				<div class="col-md-6 col-xs-12">
				<?php //echo $site->display_media_grid($post); ?>
						<a class="profile_image" href="#">
							<?php 
								// $main_post[] = array_shift($media);
								// $main_post[] = $post;
								echo $site->display_media_grid(array($post)); 
							?>
						<div><?php echo $site->display_video_controls(); ?></div>
						</a>
				</div>

				<div class="col-md-6 col-xs-12">
					<h3><?php echo($post['blogtitle']); ?></h3>
					<h4>
						<?php echo $post['twitter']; ?>
					</h4>
					<div class="track-details">
						<div><?php echo '<hr>'.$post['description']; ?></div>
						<div class="track-controls"></div>
						<h4 class="page-header">Related</h4>
						<?php echo $site->display_media_grid($media); ?>
					</div>

				</div>
			</section>

			<div>
				<?php //echo $site->display_media_grid($media); ?>
			</div>

			
		</section>


		
		<script type="text/javascript" src="<?php echo $site->url ?>js/dashboard.js"></script>
		<script type="text/javascript">
			$(function(){

				/* CONFIG FUNCTIONS */
				function playButton(elem) {
					icon = elem.find('i');
					var state = icon.attr('class');
					var audio = $('#audio_mp3');
					if (state =='fa fa-play-circle') {
						icon.removeClass('fa-play-circle');
						icon.addClass('fa-pause');
						togglePlay(audio);
					} else {
						icon.removeClass('fa-pause');
						icon.addClass('fa-play-circle');
						togglePlay(audio);
					}
				}
				function togglePlay(elem) {
					var audio = elem.get(0);
					if (audio.paused) {
						audio.play();
					} else {
						audio.pause();
					}
				}
				function toggleVideo(elem) {
					var vid = elem.get(0);
					if (vid.paused) {
						vid.play();
					} else {
						vid.pause();
					}
				}

				// SPACE BAR PLAY BUTTON
				$('#play_button').click(function(e){
					e.preventDefault();
					playButton($(this))
				});;
				$('.audio_img').click(function(e){
					e.preventDefault();
					playButton($(this).parent())
				});;

				// SPACE BAR PLAY BUTTON
				window.onkeydown = function(e) {
				    if(e.keyCode == 32 && e.target == document.body) {
				        e.preventDefault();
				        playButton($('#play_button'));
				        return false;
				    }
				};
				// $('.track-controls').html('okay loaded!');


				$('video').hover(function(){
					$(this).get(0).play();
				});
				$('video').click(function(e){
					e.preventDefault();
					toggleVideo($(this));
				});
				$('.expand-video').click(function(e){
					var data = $(this).parent().parent().parent();
					data[0].width = '100%';
					data[0].setAttribute('class', 'col-md-12');
					console.log(data);
				});
			});
		</script>
<?php include('../footer.php');?>