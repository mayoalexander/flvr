<?php
include_once('../config.php');
$site = new Config();

$leads = $site->get_leads('today');
foreach ($leads as $key => $lead) {
	$leads_compiled[$lead['lead_twitter']][] = $lead['lead_name'];
}
$num_of_leads = count($leads_compiled);

// $site->debug($num_of_leads,1);
?>


<div class="container row">
	<h1>Analytics</h1>
	<div class="col-md-2">
		<h3>Leads Today</h3>
	</div>
	<div class="col-md-2">
		<h3>Leads Today</h3>
	</div>
</div>
<div class="container row">
	<div class="col-md-2">
		<?php echo $num_of_leads; ?>/100
	</div>
	<div class="col-md-2">
		<?php echo $num_of_leads; ?>
	</div>
</div>