<?php 
include_once('../config.php');
$site = new Config();

$sourcePath = $_FILES['photos']['tmp_name'];       // Storing source path of the file in a variable
$targetPath = "public/audio/".$_FILES['photos']['name'][0]; // Target path where file is to be stored
$temp =$sourcePath[0] ;

// echo '<pre>';
// echo 'now setting up '. $temp . '<br>'.$targetPath.'<br>';
// 	var_dump($_FILES);


function process_video($video_file, $video_thumb_destination) {
	include('../vendor/autoload.php');
	// var_dump($video_file);
	$ffmpeg = trim(shell_exec('la')); // or better yet:
	// $ffmpeg = trim(shell_exec('type -P ffmpeg'));
	// var_dump($ffmpeg);
	// if (empty($ffmpeg))
	// {
	//     die('ffmpeg not available');
	// }

	// shell_exec($ffmpeg . ' -i ...');

	// $ffmpeg = FFMpeg\FFMpeg::create();
	// $video = $ffmpeg->open($video_file);
	// $video
	//     ->filters()
	//     ->resize(new FFMpeg\Coordinate\Dimension(320, 240))
	//     ->synchronize();
	// $video
	//     ->frame(FFMpeg\Coordinate\TimeCode::fromSeconds(10))
	//     ->save($video_thumb_destination);
	// // $video
	//     // ->save(new FFMpeg\Format\Video\X264(), 'export-x264.mp4')
	//     // ->save(new FFMpeg\Format\Video\WMV(), 'export-wmv.wmv')
	//     // ->save(new FFMpeg\Format\Video\WebM(), 'export-webm.webm');
	 return $video_file;
}


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
	$res = str_replace('../../../', 'http://freelabel.net/', $dest);
	return $res;
}



foreach ($_FILES as $file) {
	$photo	=		$file['name'][0];

	$arr = array_reverse(explode('.', $photo));
	$rand = rand(0,982348237434);
	$photo = $arr[1].'-'.$rand.'-.'.$arr[0];
	// echo $temp.' acutally moving to '.	$photo;

	$new_path = 'public/audio/'.$site->url_slug($photo);
	$loadStatus = move_uploaded_file($temp,'../'.$new_path) ;    // Moving Uploaded file
	if ($loadStatus) {
		$path = $site->url.$new_path;
		//echo 'YAY! it worked! ' .$path;

		$src = '../public/audio/'.$photo;
		$path_thumb = '../public/audio/thumb/'.$photo;

		// $dir = readdir('../');
		// var_dump($path);

		// $thumb = make_thumb($src ,$path_thumb , 600 );
		$thumb = process_video($src ,$path_thumb );
		// echo 'heres the pat ::: '.$path.'<br>';
		// var_dump($thumb);
		echo '<div id="video-wrap"><video style="width:100%;" src="'.$path.'"" preload="metadata" autoplay=1 mute=1 loop=true class="img-thumbnail" id="video"></video></div>';
		echo '<canvas id="canvas" class="hidden"></canvas>';
		// echo '<input type="file" name="artwork_photo" id="artwork_photo" required>';
		echo '<input type="hidden" name="file" id="file" value="'.$path.'"">';
		echo '<input type="hidden" name="photo[]" id="photo" value="'.$path.'"">';
		echo '<input type="hidden" name="type" value="video"">';
	} else {
		echo 'NO! it didnt work!<Br> ';
	}
}
?>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
<script type="text/javascript">
	$(function(){

		function capture(){
		    var canvas = document.getElementById('canvas');
		    var video = document.getElementById('video');

		    canvas.height = $('#video').height();
		    canvas.width = $('#video').width();
		    console.log($('#video').width());
		    console.log('video ' + video.height + video.width);
		    console.log('canvas ' + canvas.height + canvas.width);
		    $video = $('#video');
		    canvas.getContext('2d').drawImage(video, 0, 0, $video.width(), $video.height());
		    var imgUrl = canvas.toDataURL();
		    // $('#video').hide();
		    // $('#canvas').hide();
		    $('#video-wrap').html('<img src="' + imgUrl + '" class="img-thumbnail">');
		    $('#photo').val(imgUrl);
		}
		setTimeout(function(){
			var video = $('#video-wrap');
			capture();
			// console.log(video);
			// alert('create thumbnail');
		},4000);
	});
</script>