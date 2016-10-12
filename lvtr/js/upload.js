

		function processUpload(path, data, img, file) {
	            // formdata_PHO = data.get(0).files[0];
	            formdata_PHO = file;
				var formdata = new FormData();
	            // Add the file to the request.
	            formdata.append('photos[]', formdata_PHO);
	           	console.log(data);
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
	                $('.file-upload-results').append(result);
	            	loadForm();
	                $('.file-upload-results').append('<input type="hidden" name="user_name" value="<?php echo $_SESSION['user_name']; ?> ">');
	                // $('.file-upload-results').append('<input type="submit" name="submit_file" placeholder="Enter.. <?php echo $_SESSION['user_name']; ?>" class="btn btn-primary">');
	    			$('.filename').html(img);
	            });
		}