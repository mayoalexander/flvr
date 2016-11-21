<?php
include_once('../config.php');
$site = new Config();

$_POST['directory'] = 'clients'; // temporary
$ftp_server		=		"pink.radio.co"; 
$ftp_user_name	=		"s95fa8cba2.uf29485319"; 
$ftp_user_pass	=		"d111ea334e75"; 

// -------------- set up basic connection 
$conn_id = ftp_connect($ftp_server); 

// login with username and password 
$login_result = ftp_login($conn_id, $ftp_user_name, $ftp_user_pass);



if (!isset($_POST['action'])) {


	// $contents_name = ftp_rawlist($conn_id, $_POST['directory'], 1);
	$contents = ftp_nlist($conn_id, $_POST['directory']);

} else {
	// try to delete $file
	if (ftp_delete($conn_id, $_POST['filename'])) {
	 echo "Successfuly Deleted!";
	} else {
	 echo "could not delete ".$_POST['filename']."\n";
	}

	exit;
}

?>



<div class="container">
<h1 class="page-header">Radio Remote Tracks</h1>
	<?php

		// output $contents
		echo '<div class="list-group">';
		// foreach ($contents as $key => $filename) {
		// 	// $file_date = ftp_mdtm($conn_id,$filename);
		// 	// $file_link = '<a href="http://freelabel.net/'.$filename.'">'.$filename.'</a>';
		// 	echo '<li class="list-group-item">'.$filename.' <span data-file="'.$filename.'" class="btn btn-danger delete-remote-track pull-right"><i class="fa fa-trash"></i></span></li>';
		// }
		
		for ($i=0; $i < 100; $i++) { 
			$date_uploaded = date('Y-m-d',ftp_mdtm($conn_id,$contents[$i]));
			// if () {
				echo '<li class="list-group-item">'.$date_uploaded.' - '.$contents[$i].' <span data-file="'.$contents[$i].'" class="btn btn-danger delete-remote-track pull-right"><i class="fa fa-trash"></i></span></li>';
			// }
			
		}




		echo '</div>';
	?>
</div>


<script type="text/javascript">
	

	$('.delete-remote-track').click(function(){
		var button = $(this);
		var filename = $(this).attr('data-file');
		var path = '<?php echo $_SERVER['SCRIPT_NAME']; ?>';
		var data = {
			filename: filename,
			action:"delete"
		}
		$.post(path, data , function(result) {
			button.addClass('btn-success');
			button.removeClass('btn-danger');
			button.text(result);
			button.parent().hide('fast');
		});
	});


</script>