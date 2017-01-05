<?php
include_once('../config.php');
$site = new Config();
$site->require_login();
?>
<section class="dashboard">

	<div class="dashboard-header">
		<h1 class="pull-left">Upload</h1>
		<div class="pull-right">
			<button class="btn btn-primary add-new-post hidden"><i class="fa fa-plus"></i> Add New Post</button>
			<!-- Aritst / All <i class="fa fa-caret-down"></i> -->
			<select class="form-control hidden">
				<option>View</option>
				<option>View</option>
				<option>View</option>
			</select>
		</div>
	</div>



	<div class="col-md-12 col-xs-12">
		
		<h3>Drag and Drop</h3>
		<p class="lead">Before you can fully experience FREELABEL, you will need to start uploading music to your profile. You can either drag and drop files, or click on the download icon to choose a file.</p>
		<panel class="upload-panel">
			<!-- <h4>Choose Files..</h4>  -->
			<div class="upload-trigger">
				<input type="file" name="file" class="file_input"> <!-- add multiple when finished -->
				<i class="fa fa-upload" ></i>
				<div class="filename">Choose File..</div>
			</div>
			<form class="file-upload-results">
				<div class="col-md-4 col-sm-4 col-xs-12 left"></div>
				<div class="col-md-8 col-sm-8 col-xs-12 right"></div>
			</form>
		</panel>
	</div>

</section>



<!-- <script type="text/javascript" src="http://freelabel.net/js/upload.js"> -->
<script type="text/javascript">
	PleaseWait = '<div class="fa fa-circle-o-notch fa-spin fa-3x fa-fw"></div> <h5>Please wait..</h5>';
	progressBar = '<div class="progress"><div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:70%"><span class="sr-only">70% Complete</span></div></div>';
	$(function(){

/*
	LOAD FORM INTO MEDIA
	*/
	function loadForm(filename) {
		var data = {filename:filename};
		var elem = $('.file-upload-results');
		var path = '<?php echo $site->url; ?>views/upload_form.php';
		$.post(path, data, function(result){
			elem.find('.right').append(result);
		});
	}
	function wrongFileType() {
		var type = 'Uh oh, this file you\'ve selected is not a photo. Please upload a photo for the artwork!';
		alert(type);
		$('#artwork_photo').val('');
	}


	function processUpload(path, data, img, file) {
	            // formdata_PHO = data.get(0).files[0];
	            formdata_PHO = file;
	            var formdata = new FormData();
	            // Add the file to the request.
	            formdata.append('photos[]', formdata_PHO);
	            $('.filename').html(progressBar);
	           	// console.log(data);
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
	                	// console.log(x);
	                	if (x && x.overrideMimeType) {
	                		x.overrideMimeType("multipart/form-data");
	                	}
	                },
	                xhr: function() {
	                	var xhr = new window.XMLHttpRequest();
						//Upload progress
						xhr.upload.addEventListener("progress", function(evt){
							if (evt.lengthComputable) {
								var percentComplete = evt.loaded / evt.total;
						    //Do something with upload progress
						    var pComplete = Math.round(percentComplete * 100) + "%";
						    $('.progress-bar').css('width', pComplete);
						    $('.progress-bar').html(pComplete + " Uploaded");
						}
					}, false);
						//Download progress
						xhr.addEventListener("progress", function(evt){
							if (evt.lengthComputable) {
								var percentComplete = evt.loaded / evt.total;
								var pComplete = (percentComplete * 100) + "%";
								$('.progress-bar').css('width', pComplete);
								$('.progress-bar').html(pComplete + " Uploaded");
							}
						}, false);
						return xhr;
					},
					uploadProgress: function(event, position, total, percentComplete) {
						var percentVal = percentComplete + '%';
			            // console.log(percentVal);
			            alert(percentVal);
			        },
	                // Now you should be able to do this:
	                mimeType: 'multipart/form-data'    //Property added in 1.5.1
	            }).always(function () {
	            	console.log(formdata_PHO);
	            }).fail(function(jqXHR){
	                // alert(jqXHR.statusText + 'oh no it didnt work!')
	                $('.file-upload-results').html('You didnt upload the correct file format!');
	            }).done(function (result) {
	            	$('.file-upload-results').addClass('clearfix');
	            	$('.file-upload-results').append('<input type="submit" name="submit_file" value="Upload File" class="btn btn-success pull-right">');
	            	$('.file-upload-results').append('<span onclick="location.reload()" class="btn btn-danger pull-right"><i class="fa fa-close" ></i></span>');
					// $('.file-upload-results').append('<button class="btn btn-danger cancel-upload pull-right"><i class="fa fa-trash"></i></button>');
					$('.file-upload-results .left').append(result);
					loadForm(formdata_PHO.name);
					$('.file-upload-results').append('<input type="hidden" name="user_name" value="<?php echo $_SESSION['user_name']; ?> ">');
	                // $('.file-upload-results').append('<input type="submit" name="submit_file" placeholder="Enter.. <?php echo $_SESSION['user_name']; ?>" class="btn btn-primary">');
	                $('.filename').html('');
	            });
	        }

	        function hideDropArea(data) {
	        	data.hide();
	        	$('.upload-trigger i').hide();
	        	$(".filename").html(PleaseWait);
	        }
	        function uploadFile(data, file) {
	        	var img = data.val();
	        	var ext = img.split('.').pop();
		        // if (ext.toLowerCase() !=='png' && ext.toLowerCase() !=='jpeg' && ext.toLowerCase() !=='jpg' && ext.toLowerCase() !=='gif') {
		        	if (ext.toLowerCase() ==='png' || ext.toLowerCase() ==='jpeg' || ext.toLowerCase() ==='jpg' || ext.toLowerCase() ==='gif') {
		        		path = '<?php echo $site->url; ?>config/upload-photo.php';
		        	} else if (ext.toLowerCase() ==='mp4' || ext.toLowerCase() ==='mov') {
		        		path = '<?php echo $site->url; ?>config/upload-video.php';
		        	} else if (ext.toLowerCase() ==='mp3') {
		        		path = '<?php echo $site->url; ?>config/upload-file.php';
		        	} else {
		        		alert('The file type '+ ext.toLowerCase() + ' is not allowed at this moment in time. We are working on a fix!');
		        		return;
		        	}
		        	hideDropArea(data);
		        	processUpload(path, data, img, file);
		} // end of uploadFile()




/*
	UPLOAD FILE
	*/

	$(".file_input").change(function (){
		var elem = $(this);
		var data = $(this).get(0).files;
		$.each(data, function(index, file){
				// console.log(index + ') run: ' + file);
				uploadFile(elem, file);
			});
	});


/*
	SUBMISSION FORM CALLBACK 
	*/
	$('.file-upload-results').submit(function(e){
		e.preventDefault();
		var data = $(this).serialize();
		var elem = $(this);
		var status = $('.filename');

		// alert(data);
		console.log('about to start..');

		
		status.html(PleaseWait);
		var uploadPath = 'http://freelabel.net/lvtr/config/upload.php';
		$.post(uploadPath, data, function(result){
			elem.html('');
			elem.html(result);


			// alert('testing initiated');
			// alert(result); // delete me 
			// console.log('file uploaded! Data below'); delete me
			console.log(result);
		});
	});


});
</script>