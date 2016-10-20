<?php
include_once('../config.php');
$site = new Config();
$profile = $site->get_user_profile($_SESSION['user_name']);

/*
	Detect Non-Connected Networks
*/
if ($profile['twitter']==='') {
	$social['twitter']['text'] = "<i class='fa fa-twitter'></i> Need to connect Twitter";
} else {
	$connected_networks['twitter'] = $profile['twitter'];
}
if ($profile['facebook']==='') {
	$social['facebook']['text'] = "<i class='fa fa-facebook'></i> Need to connect Facebook";
} else {
	$connected_networks['facebook'] = $profile['facebook'];
}
if ($profile['instagram']==='') {
	$social['instagram']['text'] = "<i class='fa fa-instagram'></i> Need to connect Instagram";
} else {
	$connected_networks['instagram'] = $profile['instagram'];
}
$social_button='';
if (isset($social)) {
		foreach ($social as $key => $connect) {
			$social_button .= '
			<div class="dropdown">
			  <button class="btn btn-'.$key.' dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">'.$connect['text'].'</button>
			  <ul class="dropdown-menu panel-body" aria-labelledby="dropdownMenu1">
			  	<form class="connect-social">
			    <li><input id="social" type="text" name="'.$key.'" class="form-control" placeholder="Enter '.$key.' URL.."></li>
			    <input type="hidden" name="user_name" value="'.$_SESSION['user_name'].'">
			    <li role="separator" class="divider"></li>
			    <li><button href="#" class="btn btn-block btn-primary" data-site="'.$key.'">Save</button></li>
			    </form>
			  </ul>
			</div>';
		}

}

if (isset($connected_networks)) {
	foreach ($connected_networks as $key => $value) {
		$social_button .= '<input id="hidden-'.$key.'" type="hidden" name= "'.$key.'[]" value="'.$value.'">';
	}
}



/*
	FORM INPUTS
*/
	$input_title = '<input type="text" name="title[]" id="title" value="'.$site->format_title($_POST['filename']).'" placeholder="Enter Title.." class="form-control" required>';

	$input_add_more = '<span class="pull-left" ><span class="add_more_info_button btn btn-link">Add More Details <i class="fa fa-arrow-right"></i> </span></span>';


?>
<!-- HIDDEN INPUTS FOR UPLOAD FORM -->
<?php echo $input_title; ?>
<?php echo $social_button; ?>
<?php echo $input_add_more; ?>
<hr>
<!-- <script type="text/javascript" src="http://freelabel.net/js/upload.js"></script> -->

<!-- <script type="text/javascript" src="<?php echo $site->url; ?>js/upload_form.validation.js"></script> -->
<script type="text/javascript">
$(function(){
		addtionalDetails = '<textarea name="description" type="text" class="form-control" rows="3" placeholder="Enter Description.."></textarea><hr>\
		<div class="form-group"><label class="control-label col-md-1" for="twitter"><i class="fa fa-twitter"></i></label><div class="col-md-11"><input id="twitter" name="twitter[]" value="<?php echo $profile['twitter'] ?>" type="text" class="form-control" rows="3" placeholder="Enter Twittername.."/></div>\
		<div class="form-group"><label class="control-label col-md-1" for="status"><i class="fa fa-eye"></i></label><div class="col-md-11"><select class="form-control" name="status[]"><option value="public">Public</option><option value="private">Private</option></select></div>\
		';

		function loadForm() {
			var data;
			var elem = $('.file-upload-results');
			var path = '<?php echo $site->url; ?>views/upload_form.php';
			$.post(path, data, function(result){
				elem.append(result);
			});
		}


		function processUpload(path, elem, img, file) {
	            // formdata_PHO = data.get(0).files[0];
	            formdata_PHO = file;
				var formdata = new FormData();
	            // Add the file to the request.
	            formdata.append('photos[]', formdata_PHO);
	           	console.log(elem);
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
	                elem.parent().append(result);
	            	// loadForm();
	                elem.append('<input type="hidden" name="user_name" value="<?php echo $_SESSION['user_name']; ?> ">');
	                // $('.file-upload-results').append('<input type="submit" name="submit_file" placeholder="Enter.. <?php echo $_SESSION['user_name']; ?>" class="btn btn-primary">');
	    			$('.filename').html('');
	            });
		}


/*
	TWITTER SUBMISSION FORMATTING
*/
		// trim twitter username
		$("#social").keypress(function() {
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



/*
	USERNAME DETECTION
*/
		// // trim twitter username
		// $("#title").keypress(function() {
		// 	var keypress = $(this);
		// 	console.log(key);
		//   var $y = $(this).val();
		//   var $newy = $y.replace(/\s+/g, '');
		//   if ($newy.toLowerCase().indexOf("@") >= 0) {
		//     // console.log('yes mane');
		//   //   $newy = $newy.append('@');
		//   } else {
		//     $newy = '@'+ $newy;
		//     // console.log('No mane');
		//   }
		//   $(this).val($newy);
		// });



/*
	CONNECT SOCIAL TRIGGER
*/
	$('.connect-social').submit(function(e){
		e.preventDefault();
		var elem = $(this);
		var data = $(this).serialize();
		$.post('<?php echo $site->url; ?>config/profile.php', data, function(result){
			elem.html(result);
			setTimeout(function(){
				elem.parent().parent().hide();
			},3000);
		});
	});

/*
	ADD ATWORK
*/
	$("#artwork_photo").change(function (e){
		var elem = $(this);
		var img = $(this).val();
		var ext = img.split('.').pop();
		var file = $(this).get(0).files[0];
       	path = '<?php echo $site->url; ?>config/upload-poster.php';


        if (ext.toLowerCase() !=='png' && ext.toLowerCase() !=='jpeg' && ext.toLowerCase() !=='jpg' && ext.toLowerCase() !=='gif') {
	        alert('Uh oh! You have selected an invalid filetype. Please choose a photo!')
            return false;
        } else {
        	elem.hide();
        	processUpload(path, elem, img, file)

        	// upload photo
           	// path = '<?php echo $site->url; ?>config/upload-photo.php';
        }
	});

	/*
		ADD MORE INFO BUTTON
	*/
	$('.add_more_info_button').click(function(e){
		e.preventDefault();
		$(this).parent().css('width', '100%');
		$('#hidden-twitter').remove();
		$(this).parent().html(addtionalDetails);
		$('#twitter').keyup(function(e){
			console.log('pressed');
			if(e.keyCode == 32){
		    	str = $(this)[0].value.replace(/\s+/g, '');
		    	$(this)[0].value = str;
		    }
			var $y = $(this).val();
			var $newy = $y.replace(/\s+/g, '');
			if ($newy.toLowerCase().indexOf("@") >= 0) {
				console.log('yes mane');
			} else {
				$(this)[0].value = "@" + $(this)[0].value;
				console.log('No mane');
			}

		});
	});



	function addAtSign() {

	}

/*
	TWITTER SUBMISSION FORMATTING
*/
		// trim twitter username
		$("#social").keypress(function() {
		  
		  $(this).val($newy);
		});

});
</script>