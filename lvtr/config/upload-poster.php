<?php 
include_once('../config.php');
$site = new Config();

$sourcePath = $_FILES['photos']['tmp_name'];       // Storing source path of the file in a variable
$targetPath = "public/img/uploads/".$_FILES['photos']['name'][0]; // Target path where file is to be stored
$temp =$sourcePath[0] ;

//echo '<pre>';
//echo 'now setting up '. $temp . '<br>'.$targetPath.'<br>';
	//var_dump($_FILES);



function make_thumb($src, $dest, $desired_width) {
	$arr = array_reverse(explode('.', $src));
	$ext = strtolower($arr[0]);

	if ($ext==='png') {
		$source_image = imagecreatefrompng($src);
	} elseif($ext==='jpeg' || $ext==='jpg') {
		$source_image = imagecreatefromjpeg($src);
	} elseif($ext==='jpeg' || $ext==='jpg') {
		$source_image = imagecreatefromgif($src);
	}
	/* read the source image */
	$width = imagesx($source_image);
	$height = imagesy($source_image);
	
	/* find the "desired height" of this thumbnail, relative to the desired width  */
	$desired_height = floor($height * ($desired_width / $width));
	
	/* create a new, "virtual" image */
	$virtual_image = imagecreatetruecolor($desired_width, $desired_height);
	
	/* copy source image at a resized size */
	imagecopyresampled($virtual_image, $source_image, 0, 0, 0, 0, $desired_width, $desired_height, $width, $height);
	
	/* create the physical thumbnail image to its destination */
		
	if ($ext==='png') {
		imagepng($virtual_image, $dest);
	} elseif($ext==='jpeg' || $ext==='jpg') {
		imagejpeg($virtual_image, $dest);
	} elseif($ext==='gif') {
		imagegif($virtual_image, $dest);
	}
	$res = str_replace('../', SITE, $dest);
	return $res;
}



foreach ($_FILES as $file) {
	$photo	=		$file['name'][0];

	$arr = array_reverse(explode('.', $photo));
	$rand = rand(0,982348237434);
	$photo = $arr[1].'-'.$rand.'-.'.$arr[0];
	// echo $temp.' acutally moving to '.	$photo;

	$new_path = 'public/img/uploads/'.$photo;
	$loadStatus = move_uploaded_file($temp,'../'.$new_path) ;    // Moving Uploaded file
	if ($loadStatus) {
		$path = $site->url.$new_path;
		//echo 'YAY! it worked! ' .$path;

		$src = '../public/img/uploads/'.$photo;
		$path_thumb = '../public/img/uploads/thumb/'.$photo;


		$thumb = make_thumb($src ,$path_thumb , 600 );
		echo '<img style="width:100%;" src="'.$thumb.'"" class="img-thumbnail">';
		// echo '<input type="text" name="title[]" id="title" placeholder="Enter Title.." class="form-control" required>';
		echo '<input type="hidden" name="photo[]" id="photo" value="'.$path.'">';
		// echo '<input type="hidden" name="type" value="video"">';
		echo '<input type="hidden" name="poster[]" id="poster" value="'.$thumb.'"">';
	} else {
		echo 'NO! it didnt work!<Br> ';
	}
}
//echo '<hr>';
//var_dump($_POST);
//echo'</pre>';