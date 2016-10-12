<?php
include('../../config.php');
$site = new Config(); 
$post = $site->get_post_by_id($_GET['post_id']);
// $profile_user_name = $post['user_name'];

$media = $site->get_post_by_search($post['blogtitle']); 
shuffle($media);

$media1 = $site->get_post_by_search($post['twitter']); 
foreach ($media1 as $value) {
	array_push($media, $value);
}
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
		</style>

		<section class="profile">

			<section class="profile-body clearfix">
				<div class="col-md-5 col-xs-4">
						<a class="profile_image" href="#">
							<?php 
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
							echo $embed; ?>
						<div><?php echo $site->display_video_controls(); ?></div>
						</a>
				</div>

				<div class="col-md-7 col-xs-8">
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

			
		</section>
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

<?php //include('../footer.php');?>