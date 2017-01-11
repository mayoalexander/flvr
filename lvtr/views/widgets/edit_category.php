<?php

include_once('/home/freelabelnet/public_html/lvtr/config.php');
$config = new Config();

$post = $config->get_category_by_id($_GET['category_id']);

?>
<form method="post" id='edit-category-form'>

<?php 
function showProfilePicture($value) {
	echo '<h4><i class="fa fa-photo"></i> Update Photo</h4>
	<div class="upload-profile-photo-area clearfix">
		<input type="file" class="form-control post_photo file_input" name="photo" style="height:200px;">
		<img src="'.$value.'">
		<span class="file-upload-results"></span>
	</div>';
}

function textInput($key , $value, $class=null) {

	if (isset($class) && $class===true) {
		$class = 'promo-date-picker';
		$value = date('Y-m-d', strtotime($value));
	} else {
		$class = '';
	}

	echo '<label>'.ucfirst($key).'</label><input type="text" name="'.$key.'" class="form-control '.$class.'" value="'.$value.'">';
}

function textArea($key , $value) {
	echo "<label>".ucfirst($key)."</label><textarea class='form-control' name='description' >".$value."</textarea>";
}

function hiddenInput($key , $value) {
	echo "<input type='hidden' class='form-control' name='".$key."' value='".$value."' required >";
}

function displayInputGroup($post) {
	/* LOAD CONFIGURATION APP */
	foreach ($post as $key => $value) {
		switch ($key) {
			case 'description':
				textArea($key, $value);
				break;
			case 'name':
				textInput($key , $value);
				break;
			case 'twitter':
				textInput($key , $value);
				break;
			case 'start_date':
				textInput($key , $value,true);
				break;
			case 'desc':
				textInput($key , $value);
				break;
			// case 'photo':
			// 	echo 'photo!: '.$value;
			// 	showProfilePicture($key , $value);
			// 	break;
			case 'id':
				hiddenInput($key , $value);
				break;
		}
	}
}

?>



<div class="col-md-9">
	<?php displayInputGroup($post); ?>

</div>
<div class="col-md-3 clearfix">
	<input type="hidden" name="action" value="edit_category"></input>
	<button type="submit" class="btn btn-warning btn-block m-b-md"><i class="fa fa-save"></i> Save Changes</button>
</div>

</form>
<button type="submit" class="btn btn-danger btn-block delete-post-button m-b-md" data-id="<?php echo $post['id']; ?>"><i class="fa fa-trash"></i> Delete Post</button>


<script type="text/javascript">
	$(function(){

/*
	CHANGE PROFILE PHOTO FUNCTIONALITY
*/
		$(".post_photo").change(function (){
			// $(this).hide();
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
                $('.upload-profile-photo-area').html('You didnt upload the correct file format!');
            }).done(function (result) {
                $('.upload-profile-photo-area').html(result);
                $('.upload-profile-photo-area').append('<input type="hidden" name="user_name" value="<?php echo $_SESSION['user_name']; ?>">');
            });
		});




		$('.delete-post-button').click(function(e){
			e.preventDefault();
			var button = $(this);
			var modal  = $('#postModal');
			button.text('Are you sure?');
			button.removeClass('delete-post-button');
			button.addClass('confirm-delete');
			var category_id = $(this).attr('data-id');
			var data = {
				category_id: category_id,
				action: "delete_category"
			};
			var url = 'http://freelabel.net/lvtr/config/update.php';
			$('.confirm-delete').click(function(e){
				e.preventDefault();
				$.post(url, data, function(result){
					button.html(result);
					button.removeClass('btn-danger');
					button.removeClass('confirm-delete');
					button.addClass('btn-success')
					window.location.reload();
				});
			});
		});


		$('#edit-category-form').submit(function(event){
			event.preventDefault();
			var data = $(this).serializeArray();
			element = $(this).parent().parent().parent().parent();
			console.log(element);
			console.log(data);
			element.modal('hide');
			$.post('http://freelabel.net/lvtr/config/update.php', data, function(data){
				alert(data);
			})	
		});

	});
</script>