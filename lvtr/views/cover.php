<?php
// show registration info
?>
<header class="header_banner hero-01">
	
	<h1>FREELABEL</h1>
	<p>TV | RADIO | MAG</p>
	<section class="row">
		<a href="<?php echo $site->url; ?>?ctrl=register" class="btn btn-success btn-lg call-to-action">Get Started</a>
	</section>

</header>
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
