<?php
include('../config.php');
$site = new Config();
?>
<div class="container">

	<form class="form-signin">
		<h2 class="form-signin-heading">Login</h2>
		<div class="login-results"></div>
		<label for="user_name" class="sr-only">Username</label>
		<input type="text" id="user_name" class="form-control" placeholder="Enter Username.." name="user_name" required autofocus required>
		<label for="user_password" class="sr-only">Password</label>
		<input id="user_password" class="form-control" name="user_password" placeholder="Enter Password.."  type=password required>
		<div class="checkbox">
			<label>
				<input type="checkbox" value="remember-me"> Remember me
			</label>
		</div>
		<button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
	</form>

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
	  	$('#user_password').attr('type','text');
	  }
	}
	$('.form-signin').submit(function(e) {
		e.preventDefault();
		loginUser('<?php echo $site->url; ?>', $(this));
	});
});
</script>
