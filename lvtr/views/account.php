<style type="text/css">
	
.inputfile {
	width: 0.1px;
	height: 0.1px;
	opacity: 0;
	overflow: hidden;
	position: absolute;
	z-index: -1;
}

.inputfile + label {
    font-size: 1.25em;
    font-weight: 700;
    color: white;
    background-color: black;
    display: inline-block;
}

.inputfile:focus + label,
.inputfile + label:hover {
    background-color: red;
}
.inputfile + label {
	cursor: pointer; /* "hand" cursor */
}

.profile-img {
	width: 100%;
	border:3px solid transparent;
	transition: border-color 0.5s;
}

.profile-img:hover {
	/*border-color: #303030;*/
}

</style>


	<?php $site->require_login($_SESSION); ?>
	<section class="profile clearfix">

			<h3 class="clearfix">
				Build Your Profile
				<a class="btn btn-primary pull-right" href="<?php echo $site->get_user_url($user); ?>" target="_blank">View Profile</a>
			</h3>

			<form name="profile_builder_form" action="#####" method="post" enctype="multipart/form-data" class="profile_builder_form">

				<h4>Basic Info</h4>
				<p class="section-description text-muted">Use this form to complete your FREELABEL Profile. We will use this information to build your campaign as well as tag you during promotional campaigns!</p>

				<div class="row">
					<div class="col-md-4 col-sm-6 profile-photo-container">
						<input type="file" name="file" id="file" class="inputfile profile_photo_file" />
						<label for="file"><img class="profile-img" src="<?php $site->display_profile_photo($profile); ?>"></label>
						<input type="hidden" name="photo" value="<?php $site->display_profile_photo($profile); ?>">


<!-- 						<div class="upload-profile-photo-area clearfix">

							<h4><i class="fa fa-photo"></i> Upload Profile Photo</h4>
							<input type="file" class="form-control profile_photo" name="photo" >
							<img class="profile-img" src="<?php $site->display_profile_photo($profile); ?>">
							<span class="file-upload-results">
								<input type="hidden" name="photo" value="<?php $site->display_profile_photo($profile); ?>">
							</span>
						</div> -->
					</div>

					<div class="col-md-4 col-sm-6">
						<h4><i class="fa fa-comment"></i> Display Name</h4>
						<input type="text" class="form-control" name="name" placeholder="What is your Artist or Brand Name?" required="" value="<?php echo $profile['name'] ?>">
					</div>


					<div class="col-md-4 col-sm-6">
						<h4><i class="fa fa-phone"></i> Phone</h4>
						<input type="text" class="form-control" name="phone" placeholder="What is your contact number?" required="" value="<?php echo $profile['phone'] ?>">
					</div>

					<div class="col-md-4 col-sm-6">
						<h4><i class="fa fa-map-marker"></i> Location</h4>
						<input type="text" class="form-control" name="location" placeholder="Where are you from?" required="" value="<?php echo $profile['location'] ?>">
					</div>

					<div class="col-md-4 col-sm-6">
						<h4><i class="fa fa-users"></i> Brand or Management <small>(optional)</small></h4>
						<input type="text" class="form-control" name="brand" placeholder="Enter management contact information (Name, Phone, Email, etc..)" value="<?php echo $profile['brand'] ?>">
					</div>

					<div class="col-md-8">
						<h4><i class="fa fa-book"></i> Artist Bio</h4><br>
						<textarea name="description" class="form-control" rows="4" cols="53" placeholder="Tell us a little (or alot) about yourself.." ><?php echo $profile['description'] ?></textarea>
					</div>
				</div>

				<h4>Link Social Media</h4>
				<div class="rows">	
					<div class=" col-md-4 col-sm-6">
						<h4><i class="fa fa-twitter"></i> Twitter</h4>
						<input id="twitter" type="text" class="form-control" name="twitter" placeholder="Enter your Twitter username.. (include &quot;@&quot; sign)" required="" value="<?php echo $profile['twitter'] ?>">
					</div>

					<div class=" col-md-4 col-sm-6">
						<h4><i class="fa fa-instagram"></i> Instagram <small>(optional)</small></h4>
						<input id="instagram" type="text" class="form-control" name="instagram" placeholder="Enter Your Instagram Username.. (include &quot;@&quot; sign)" value="<?php echo $profile['instagram'] ?>">
					</div>

					<div class=" col-md-4 col-sm-6">
						<h4><i class="fa fa-soundcloud"></i> Soundcloud <small>(optional)</small></h4>
						<input type="text" class="form-control" name="soundcloud" placeholder="Enter Your Soundcloud Username.. (include &quot;@&quot; sign)" value="<?php echo $profile['soundcloud'] ?>">
					</div>

					<div class=" col-md-4 col-sm-6">
						<h4><i class="fa fa-youtube"></i> Youtube <small>(optional)</small></h4>
						<input type="text" class="form-control" name="youtube" placeholder="Enter Your Youtube Username.. (include &quot;@&quot; sign)" value="<?php echo $profile['youtube'] ?>">
					</div>

					<div class=" col-md-4 col-sm-6">
						<h4><i class="fa fa-paypal"></i> Paypal <small>(optional)</small></h4>
						<input type="text" class="form-control" name="paypal" placeholder="Enter Your Paypal Email.." value="<?php echo $profile['paypal'] ?>">
					</div>

					<div class=" col-md-4 col-sm-6">
						<h4><i class="fa fa-snapchat"></i> Snapchat <small>(optional)</small></h4>
						<input type="text" class="form-control" name="snapchat" placeholder="Enter Your Snapchat Username.." value="<?php echo $profile['snapchat'] ?>">
					</div>
				</div>

				<div class="col-md-12">
					<!-- <input name="update_profile" type="submit" class="btn btn-warning complete-profile-button" value="SAVE PROFILE"> -->
					<button name="update_profile" class="btn btn-warning complete-profile-button"><i class="fa fa-save"></i> Save</button>
					<span class="form-feedback"></span>
				</div>

				<input type="hidden" name="user_name" value="<?php echo $_SESSION['user_name']; ?>">
				<input type="hidden" name="update_profile" value="true">
				<br>
			</form>

		
	</section>


	<script type="text/javascript">
	$(function(){
		$('.profile_builder_form').submit(function(e){
			e.preventDefault();
			var elem = $(this);
			var data = $(this).serialize();
			console.log(data);
			// alert(data);
			var btn = elem.find('.complete-profile-button');
			btn.text('Please wait..');
			var path = '<?php echo $site->url; ?>views/profile.php';
			$.post(path, data, function(result){
				// elem.parent().parent().parent().html(result);
				btn.removeClass('btn-warning');
				btn.addClass('btn-success');
				btn.html(result);
				setTimeout(function(){
					btn.removeClass('btn-success');
					btn.addClass('btn-warning');
					btn.html('<i class="fa fa-save"></i> Save');
				}, 4000);
				// alert(result);
			});
		});


		$('.profile_photo_file').click(function(e){
			console.log($(this).siblings());
		});




	$(".profile_photo_file").change(function (){
		// $(this).hide();
		var img = $(this).val();
		var ext = img.split('.').pop();
        if (ext.toLowerCase() !=='png' && ext.toLowerCase() !=='jpeg' && ext.toLowerCase() !=='jpg' && ext.toLowerCase() !=='gif') {
            var type = 'Uh oh, this file you\'ve selected is not a photo. Please upload a photo for the artwork!';
            alert(type);
            $('#artwork_photo').val('');
            return false;
        } else {
            // alert("its a photo!");
        }
        // var formdata_PHO = $('#artwork_photo')[0].files[0];
       	path = 'http://freelabel.net/lvtr/config/upload-profile-photo.php';
        elem = $(this);
        formdata_PHO = $(this).get(0).files[0];
		var formdata = new FormData();
        // Add the file to the request.
        formdata.append('photos[]', formdata_PHO);


        console.log(formdata);

        $.ajax({
            // Uncomment the following to send cross-domain cookies:
            xhrFields: {withCredentials: true},
            url: path,
            method: 'POST',
            cache       : false,
            processData: false,
            contentType: false, 
            fileElementId: 'image-upload',
            data: formdata,
            beforeSend: function (x) {
                    if (x && x.overrideMimeType) {
                        x.overrideMimeType("multipart/form-data");
                    }
            },
            // Now you should be able to do this:
            mimeType: 'multipart/form-data'    //Property added in 1.5.1
        }).always(function (result) {
            console.log(formdata_PHO);
        }).fail(function(jqXHR){
            // alert(jqXHR.statusText + 'oh no it didnt work!')
        	// alert('its done! ' +jqXHR);
            $('.file-upload-results').html('You didnt upload the correct file format!');
        }).done(function (result) {
        	$('.profile-photo-container label').html(result);
        	// alert('its done! ' +result);
            // $('.file-upload-results').html(result);
            $('.profile-photo-container').append('<input type="hidden" name="user_name" value="<?php echo $_SESSION['user_name']; ?>">');
			// $('.file-upload-results').append('<button class="btn btn-primary save_profile_photo">Save As Profile Image</button> <button class="btn btn-danger"><i class="fa fa-trash"></i></button>');
        });
	});




/*
	TWITTER SUBMISSION FORMATTING
*/
		// trim twitter username
		$("#twitter, #instagram").keypress(function() {
		  var $y = $(this).val();
		  var $newy = $y.replace(/\s+/g, '');
		  if ($newy.toLowerCase().indexOf("@") >= 0) {
		    // console.log('yes mane');
		  //   $newy = $newy.append('@');
		  } else {
		    $newy = '@'+ $newy;
		    // console.log('No mane');
		  }
		  $(this).val($newy);
		});








	});
	</script>