<?php
include('../config.php');
$site = new Config();
?>
<div class="container">

	<?php $site->display_login_form(); ?>
	<!-- <hr><a href="#" class="forgot-password">Forgot Password</a> -->
</div> <!-- /container -->

<!-- <script type="text/javascript" href="<?php echo $site->url; ?>js/browser.js"></script> -->
<script src="https://code.jquery.com/jquery-3.1.0.min.js" integrity="sha256-cCueBR6CsyA4/9szpPfrX3s49M9vUU5BgtiJj06wt/s=" crossorigin="anonymous"></script>
<script type="text/javascript" href="<?php echo $site->url; ?>js/mobile-detect.min.js"></script>
<script type="text/javascript">
$(function(){
	var ua = navigator.userAgent.toLowerCase(); 
	if (ua.indexOf('safari') != -1) { 
	  if (ua.indexOf('chrome') > -1) {
	    // alert("chrome") // Chrome
	  } else {
	  	// $('#user_password').attr('type','text');
	  }
	}
	$('.form-signin').submit(function(e) {
		e.preventDefault();
		loginUser('<?php echo $site->url; ?>', $(this));
	});

	$('.forgot-password').click(function(){
		loadPage('forgot_password');
	});
});
</script>
