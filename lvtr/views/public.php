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
			.profile-body {
				margin-bottom: 5em;
			}
			.profile-body h4 {
				color:<?php echo $site->primary_color; ?>
			}
			#play_button {
			    text-align: center;
			    /* padding: 5em; */
			    position: absolute;
			    bottom: 2em;
			    right: 4em;
			    text-shadow: 1px 1px 30px #000;
			}
			#play_button i {
				font-size:4em;
			}
			.profile-header-banner h1 {
				font-size: 10vw;
			}
			.profile-header-banner p {
				font-size: 4vw;
				color:#e3e3e3;
			}

		</style>



		<div class="profile-header-banner section" style="background-image:url('<?php echo $post['photo']; ?>');">
			<div class="background-tint">
				<div class="title">
					<h2><?php echo $post['twitter']; ?></h2>
				</div>
				<p class="subtitle"><?php echo $site->display_play_button($post, 0, true); ?> <span class="trackname"><?php echo($post['blogtitle']); ?></span></p>
				<div class="play-button-wrap">

				</div>
			</div>
		</div>



		<nav class="navbar navbar-inverse">
			<div class="container">
			  <div class="navbar-header">
			    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
			      <span class="sr-only">Toggle navigation</span>
			      <span class="icon-bar"></span>
			      <span class="icon-bar"></span>
			      <span class="icon-bar"></span>
			    </button>
			    <a class="navbar-brand" href="http://freelabel.net/user/<?php echo $post['user_name']; ?>">Posted by <?php echo $post['user_name']; ?></a>
			  </div>
			  <div>
			  	<ul class="nav navbar-nav visible-xs">
			  		<?php echo $site->display_social_buttons($post); ?>
			  	</ul>
			  </div>
			  <div id="navbar" class="navbar-collapse collapse">
			    <ul class="nav navbar-nav">

			      
			      <li class="dropdown">
			        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-play"></i> <?php echo $post['views']; ?>
</a>
			        <ul class="dropdown-menu">
			          <?php echo $post['count']; ?>
			        </ul>
			      </li>
			    </ul>
			    <ul class="nav navbar-nav navbar-right">
			      <li class="dropdown hidden-xs">
			        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-share-alt"></i> Share</a>
			        <ul class="dropdown-menu">
			          <?php echo $site->display_social_buttons($post); ?>
			        </ul>
			      </li>
			    </ul>
			  </div><!--/.nav-collapse -->
			</div><!--/.container-fluid -->
		</nav>



		<section class="profile container">

			<section class="profile-body clearfix">

					<div class="track-details">
						<div><?php echo $post['description']; ?></div>
						<div class="track-controls"></div>
						<?php 
							if ($media) {
								echo '<h4 class="page-header">Related</h4>';
								echo $site->display_media_list($media, NULL , NULL, true);
							} 
						?>
					</div>

			</section>

			<div>
				<?php //echo $site->display_media_grid($media); ?>
			</div>

			
		</section>


		<script type="text/javascript" src="<?php echo $site->url ?>js/dashboard.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/scrollify/1.0.5/jquery.scrollify.js"></script>
		<script type="text/javascript">
			$(function(){
				// $.scrollify({
				//         section : ".section",
				//         interstitialSection : "",
				//         easing: "easeOutExpo",
				//         scrollSpeed: 1100,
				//         offset : 0,
				//         scrollbars: true,
				//         standardScrollElements: "",
				//         setHeights: true,
				//         overflowScroll: true,
				//         before:function() {},
				//         after:function() {},
				//         afterResize:function() {},
				//         afterRender:function() {}
				//     });

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