<div class="container">
		<form class="form-signin">
			<h2 class="form-signin-heading">Create Your Account</h2>
			<div class="login-results"></div>
			<label for="user_name" class="sr-only">Username</label>
			<input type="text" name="user_name" id="user_name" class="form-control" placeholder="Choose Username.." required autocomplete="off" autofocus>
			<label for="user_email" class="sr-only">Email address</label>
			<input type="email" name="user_email" id="user_email" class="form-control" placeholder="Enter Email Address.." required autocomplete="off" autofocus>
			<label for="user_password" class="sr-only">Password</label>
			<input type="password" name="user_password" id="user_password" class="form-control" placeholder="Enter Password.." required autocomplete="off">
			<div class="checkbox">
				<label>
					<input type="checkbox" value="remember-me"> Remember me
				</label>
			</div>
			<input type="hidden" name="user_type" value="trial" id="user_type">
			<button class="btn btn-lg btn-primary btn-block" type="submit">Create Account</button>
	</div>

</div> <!-- /container -->



<script type="text/javascript">
$('.pricing_button').click(function() {
	var type = $(this).attr('data-type');
	$('#user_type')[0].value = type;
	console.log($('#user_type')[0].value);
	console.log('set to : ' + type + ' and its ' + $('#user_type')[0].value);
});
$('#user_name').keyup(function(e){
	if(e.keyCode == 32){
    	str = $(this)[0].value.replace(/\s+/g, '');
    	$(this)[0].value = str;
    }
});
$('.form-signin').submit(function(e) {
	e.preventDefault();
	registerUser('<?php echo $site->url; ?>', $(this));
});
</script>