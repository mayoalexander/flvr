<?php
include_once('../config.php');
$site = new Config();

$leads = $site->get_leads('today');
// $site->debug($leads,1);

/* COMPILE LEAD DATA */
foreach ($leads as $key => $lead) {
	$leads_compiled[$lead['lead_twitter']][] = $lead['lead_name'];
}
$num_of_leads = count($leads_compiled);
$num_of_som = count($site->get_som('today'));
$num_of_new_clients = count($site->get_new_clients('today'));

/* COMPLIE POSTS */


/* STATIC VARIALBES */
$cost = 45;
$estimates = '$'.($num_of_leads * $cost);

/* PERCENTAGES */
$som_percentage = round(($num_of_som / 24) * 100);
$client_percentages = round(($num_of_new_clients / 10) * 100);

?>

<div class="container">
	<h1>Analytics</h1>
	<div class="col-md-3">
		<h3>Leads Today</h3>
	</div>
	<div class="col-md-3">
		<h3>SOM Today</h3>
	</div>
	<div class="col-md-3">
		<h3>New Clients</h3>
	</div>
	<div class="col-md-3">
		<h3>Estimates</h3>
	</div>
</div>
<div class="container">
	<div class="col-md-3">
		<h2><?php echo $num_of_leads; ?>/100</h2>
	</div>
	<div class="col-md-3">
		<h2><?php echo $num_of_som; ?></h2>
	</div>
	<div class="col-md-3">
		<h2><?php echo $num_of_new_clients; ?></h2>
	</div>
	<div class="col-md-3">
		<h2><?php echo $estimates; ?></h2>
	</div>
</div>


<section class="container">
	<div class="col-md-12">
		<h2 class="page-header">Leads <small><?php echo $num_of_leads; ?>%</small></h2>
		<div class="progress">
		  <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo $num_of_leads; ?>"
		  aria-valuemin="0" aria-valuemax="<?php echo $num_of_leads; ?>" style="width:<?php echo $num_of_leads; ?>%">
		    <span class="sr-only"><?php echo $num_of_leads; ?>% Complete</span>
		  </div>
		</div>
	</div>
	<div class="col-md-12">
		<h2 class="page-header">SOMs <small><?php echo $som_percentage; ?>%</small></h2>
		<div class="progress">
		  <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo $som_percentage; ?>"
		  aria-valuemin="0" aria-valuemax="<?php echo $som_percentage; ?>" style="width:<?php echo $som_percentage; ?>%">
		    <span class="sr-only"><?php echo $som_percentage; ?>% Complete</span>
		  </div>
		</div>
	</div>
	<div class="col-md-12">
		<h2 class="page-header">Clients <small><?php echo $client_percentages; ?>%</small></h2>
		<div class="progress">
		  <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo $client_percentages; ?>"
		  aria-valuemin="0" aria-valuemax="<?php echo $client_percentages; ?>" style="width:<?php echo $client_percentages; ?>%">
		    <span class="sr-only"><?php echo $client_percentages; ?>% Complete</span>
		  </div>
		</div>
	</div>
</section>






<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/1.0.2/Chart.js"></script>
<script>

$(function(){


// var myLineChart = new Chart(ctx, {
//     type: 'line',
//     data: data,
//     options: options
// });

	function initializeChart(chart) {
		var ctx = document.getElementById(chart);
		var dataset = ['<?php echo ($num_of_leads * 0.1); ?>','<?php echo $num_of_new_clients; ?>','<?php echo ($num_of_som/4); ?>',]
		var myChart = new Chart(ctx, {
		    type: 'doughnut',
		    data: {
		        labels: ['Leads',"New Clients", "SOM Deploys"],
		        datasets: [{
		            label: '# of Leads Today',
		            data: dataset,
		            backgroundColor: [
		                'rgba(255, 99, 132, 0.2)',
		                'rgba(255, 159, 64, 0.2)',
		                'pink'
		            ],
		            borderColor: [
		                'rgba(255,99,132,1)',
		                'rgba(255, 159, 64, 1)'
		            ],
		            borderWidth: 1
		        }]
		    },
		    options: {
		        // scales: {
		        //     yAxes: [{
		        //         ticks: {
		        //             beginAtZero:true
		        //         }
		        //     }]
		        // }
		    }
		});
	}

	// initializeChart('myChart','bar');
	// initializeChart('pieChart', 'pie');	
});


</script>