<?php
// show registration info
include_once('../config.php');
$site = new Config();
?>
<header class="header_banner hero-01">
	
	<h1>FREELABEL</h1>
	<p><?php echo $site->description; ?></p>
	<section class="row">
		<a href="<?php echo $site->url; ?>?ctrl=register" class="btn btn-success btn-lg call-to-action">Get Started</a>
	</section>
</header>




<!-- <link rel="stylesheet" type="text/css" href="css/demo.css" /> -->
<link rel="stylesheet" type="text/css" href="http://freelabel.net/lvtr/views/scroll/css/component.css" />
<script src="http://freelabel.net/lvtr/views/scroll/js/modernizr.custom.js"></script>
<div id="cbp-so-scroller" class="cbp-so-scroller">
	<section class="cbp-so-section">
		<article class="cbp-so-side cbp-so-side-left">
			<p><h1>We Handle Business</h1>
				<p>FREELABEL gives you a perosnal community for you to upload unlimted content. NEW Radio/Magazine Write- Ups are uploaded daily to the site. We give users a platfrom for media within our package deals. CREATE A ACCOUNT today to start.<p></p>
			</article>
			<figure class="cbp-so-side cbp-so-side-right">
				<!-- <img class="img-responsive" src="http://freelabel.net/dev/storage/app/media/pexels-photo-25877.jpg"> -->
				<i class="fa fa-briefcase" style="font-size:20em;top:2em;"></i>
			</figure>
		</section>
		<section class="cbp-so-section">
			<figure class="cbp-so-side cbp-so-side-left">
				<!-- <img class="img-responsive" src="http://freelabel.net/dev/storage/app/media/team/mayo/people-party-dancing-music.jpg"> -->
				<i class="fa fa-share-alt" style="font-size:20em;top:2em;"></i>
			</figure>
			<article class="cbp-so-side cbp-so-side-right">
				<h2>SOCIAL NETWORK</h2>
				<p><h1>Create A Community with FREELABEL</h1>
					<p>Create a profile on FREELABEL. In your community you will be able to share content with the public. Fans can view, like, and share your music with the WORLD!</p>
				</article>
			</section>
			<section class="cbp-so-section">
				<article class="cbp-so-side cbp-so-side-left">
					<h2>LIVE RADIO</h2>
					<p><h1>Streaming Live Radio 24/7</h1>
						<p>FREELABEL streams LIVE RADIO PLAY 24/7! Upload your music and get in radio rotation.
							<p></p>
						</article>
						<figure class="cbp-so-side cbp-so-side-right">
							<!-- <img class="img-responsive" src="http://freelabel.net/dev/storage/app/media/pexels-photo-25877.jpg"> -->
							<i class="fa fa-feed" style="font-size:20em;top:2em;"></i>
						</figure>
					</section>
					<section class="cbp-so-section">
						<figure class="cbp-so-side cbp-so-side-left">
							<!-- <img class="img-responsive" src="http://freelabel.net/dev/storage/app/media/pexels-photo-25877.jpg"> -->
							<i class="fa fa-book" style="font-size:20em;top:2em;"></i>
						</figure>
						<article class="cbp-so-side cbp-so-side-right">
							<h2>MAGAZINE</h2>
							<p><h1>FREELABEL Magazine</h1>
								<p>FREELABEL wants you Upload your music! Magazine ads will showcase all projects and singles 24/7 ALL Month @ our Events+ Design Full-page Artwork.<p></p>
							</article>
						</section>
						<section class="cbp-so-section">
							<article class="cbp-so-side cbp-so-side-left">
								<h2>TV</h2>
								<p><h1>Showcase More Than Just Music</h1>
									<p>Upload all your exlusive videos for your community to view, like and share. Videos will be shot/promoted for ALL FREELABEL hosted events daily.<p></p>
								</article>
								<figure class="cbp-so-side cbp-so-side-right">
									<!-- <img class="img-responsive" src="http://freelabel.net/dev/storage/app/media/pexels-photo-25877.jpg"> -->
									<i class="fa fa-television" style="font-size:20em;top:2em;"></i>
								</figure>
							</section>
						</div>
						<script src="http://freelabel.net/lvtr/views/scroll/js/classie.js"></script>
						<script src="http://freelabel.net/lvtr/views/scroll/js/cbpScroller.js"></script>
						<script>
							new cbpScroller( document.getElementById( 'cbp-so-scroller' ) );
						</script>

						<script type="text/javascript">
							function loadApp(modual) {
		// alert(modual);
		var path = 'http://freelabel.net/lvtr/views/widgets/' + modual + '.php';
		$.get(path, function(data){
			$('.' + modual + ' p').html(data);
		});
	}

	// $(function(){
	// 	loadApp('homepage');
	// 	loadApp('feed');
	// });
</script>
