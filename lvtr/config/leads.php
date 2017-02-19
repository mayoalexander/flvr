<?php
include('../config.php');
$site = new Config();

function displayLeadsInfo($lead_data) {
	echo '<ul class="list-group">';
	foreach ($lead_data as $key => $value) {
		echo '<li class="list-group-item lead"><strong>'.$key.'</strong> <span class="pull-right">'.$value.'</span></li>';
	}
	echo '</ul>';
}


/* INITIALIZE */
if (isset($_POST)) {
	switch ($_POST['action']) {
		case 'get_info':
			$lead_data = $site->get_lead($_POST['lead_name']);
			displayLeadsInfo($lead_data[0]);
			break;
		
		default:
			echo 'no action set!';
			break;
	}


} else {
	echo 'No data sent. Something went wrong!';
}



/* PULL PROJECTS */
$promo_url = $site->create_som_url('@'.$lead_data[0]['lead_twitter'],'check it out');

?>

<div class="container">
	<hr>
	<button class="btn btn-primary" target="_blank" href="<?php echo $promo_url ?>">Send</button>	
</div>
