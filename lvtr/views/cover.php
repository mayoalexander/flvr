<?php
// show registration info
?>
<header class="header_banner hero-01">
	
	<h1>FREELABEL</h1>
	<p>TV | RADIO | MAG</p>
	<section class="row">
		<a href="<?php echo $site->url; ?>?ctrl=register" class="btn btn-success btn-lg call-to-action">Create Your Account Now</a>
	</section>

</header>
<div class="container cover">
	<!-- autoload information -->
	<section class="row homepage">
		<p></p>
	</section>

	<section class="row">
		<a href="<?php echo $site->url; ?>?ctrl=register" class="btn btn-success btn-lg">Create Your Account Now</a>
	</section>

	<h1>BUILD YOUR COLLECTION!</h1>
	<p>Collect and Share your Favorites</p>


	<section class="row">
		<div class="col-md-12 feed">
			<i class="fa fa-newspaper"></i>
			<h1>Feed</h1>
			<p>Loading your feed..</p>
		</div>
	</section>
</div>

<script type="text/javascript">
	function loadApp(modual) {
		// alert(modual);
		var path = 'http://freelabel.net/lvtr/views/widgets/' + modual + '.php';
		$.get(path, function(data){
			$('.' + modual + ' p').html(data);
		});
	}

	$(function(){
		loadApp('homepage');
		loadApp('feed');
	});
</script>
