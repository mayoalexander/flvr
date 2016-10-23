<?php
include_once('../config.php');
$site = new Config();
$site->require_login($_SESSION); 
$user = $site->get_user_data($_SESSION['user_name']);
$profile = $site->get_user_profile($_SESSION['user_name']);
$media = $site->get_user_media($_SESSION['user_name'], 0); // '0' pulling the 1st page results
$friends = $site->get_user_friends($_SESSION['user_name'], 0); // '0' pulling the 1st page results
$liked = $site->get_user_liked($_SESSION['user_name']);
?>
	<section class="dashboard row">

<!-- 		<div class="dashboard-header">
			<h1 class="pull-left">Dashboard</h1>
		</div> -->
			
		

<!-- 		<div class="col-md-12 col-xs-12">
			<h3>You</h3>
			<panel class="profile clearfix">
				<a class="edit_profile_img_trigger" href="#"><img src="<?php echo($profile['photo']); ?>" class="user_profile_img col-md-4" ></a>
				<h4 class="pull-right">
					<?php echo $user['user_name']; ?>
					<span>Tracks</span>
					<span>Friends</span>
				</h4>
			</panel>
		</div> -->

		<div class="col-md-4 col-xs-12">
			<!-- <h3>You</h3> -->
			<panel class="profile clearfix">
				<a href="<?php echo $site->get_user_url($user); ?>" target="_blank"><img src="<?php $site->display_profile_photo($profile); ?>" class="user_profile_img col-md-4" ></a>
				<div class="pull-right"">
					<h4><a href="<?php echo $site->get_user_url($user); ?>" >@<?php echo $user['user_name']; ?></a></h4>
					<p><?php echo $profile['name']; ?></p>
					<p><?php echo $profile['location']; ?></p>
				</div>
			</panel>
			<panel class="hidden-xs hidden-sm">
				<h4>Friends</h5>
				<?php $site->display_friends_list($friends); ?>
			</panel>
			<panel class="hidden-xs hidden-sm">
				<h4>Likes</h5>
				<?php $site->display_liked_posts($liked); ?>
			</panel>
		</div>



		<div class="col-md-8 col-xs-12">
			<panel class="clearfix">
				<h4 class="pull-left">Tracks</h4>
				<div class="pull-right">
					<input type="text" name="q" id="search" placeholder="Search your uploads.." class="form-control">
				</div>
			</panel>
			<panel class="tracklist clearfix">
				<?php $site->display_media_grid($media , $_SESSION['user_name']); ?>
			</panel>
		</div>


		
	</section>

<!-- Modal -->
<div class="modal fade" id="profileModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"><i class="fa fa-photo"></i> Upload Profile Photo</h4>
      </div>
      <div class="modal-body signin-wrapper">
      	<form class="profile_photo_form">
			<input type="file" class="form-control upload-profile-photo" name="photo" >
			<div class="file-upload-results"></div>
		</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary-outline m-b-md" data-dismiss="modal"><i class="fa fa-close" ></i></button>
      </div>
    </div>
  </div>
</div>


<script type="text/javascript" src="<?php echo $site->url ?>js/dashboard.js"></script>
<script type="text/javascript">
$(function(){
	$('.edit_profile_img_trigger').click(function(e){
		e.preventDefault();
		$('#profileModal').modal('show');
	});

	$('.profile_photo_form').submit(function(e){
		e.preventDefault();
		var elem = $(this);
		var data = $(this).serialize();
		$.post("<?php echo $site->url; ?>/config/profile.php", data, function(result) {
			elem.html(result);
			var wrap = elem.parent().parent().parent().parent();//.modal('hide');
			setTimeout(function(){
				window.location.assign('<?php echo $site->url; ?>?ctrl=dashboard');
			},1500);
		});
	});


/*
	CHANGE PROFILE PHOTO FUNCTIONALITY
*/
		$(".upload-profile-photo").change(function (){
			$(this).hide();
	    	$('.upload-trigger i').hide();
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
           	path = '<?php echo $site->url; ?>config/upload-profile-photo.php';
            elem = $(this);
            formdata_PHO = $(this).get(0).files[0];
			var formdata = new FormData();
            // Add the file to the request.
            formdata.append('photos[]', formdata_PHO);

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
            }).always(function () {
                console.log(formdata_PHO);
            }).fail(function(jqXHR){
                // alert(jqXHR.statusText + 'oh no it didnt work!')
                $('.file-upload-results').html('You didnt upload the correct file format!');
            }).done(function (result) {
                $('.file-upload-results').html(result);
                $('.file-upload-results').append('<input type="hidden" name="user_name" value="<?php echo $_SESSION['user_name']; ?>">');
    			$(".file-upload-results").append('<button class="btn btn-primary save_profile_photo">Save As Profile Image</button> <button class="btn btn-danger"><i class="fa fa-trash"></i></button>');
            });
		});





/*
	Search Functionality
*/
$('#search').keyup(function(){
	var q = $(this).val();
	var min = 3;
	var user_name = '<?php echo $_SESSION["user_name"]; ?>';
	var search_url = '<?php echo $site->url; ?>/views/tracklist.php';
	var source = 'dashboard';
	if (q.length<min) {
		console.log('Please enter more than ' + min + ' characters for a search.')
	} else {
		$.post(search_url, {q:q, user_name:user_name, source:source} , function(result){
			$('.tracklist').html(result);
		});
	}
});


});
</script>
