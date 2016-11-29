<?php
include_once('../config.php');
$site = new Config();

$leads = $site->get_leads('today');
// $site->debug($leads,1);

foreach ($leads as $key => $lead) {
	$leads_compiled[$lead['lead_twitter']][] = $lead['lead_name'];
}
$num_of_leads = count($leads_compiled);
$num_of_som = count($site->get_som('today'));
$num_of_new_clients = count($site->get_new_clients('today'));

// $site->debug($num_of_new_clients,1);
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.3.0/Chart.js"></script>

<div class="container row">
	<h1>Analytics</h1>
	<div class="col-md-2">
		<h3>Leads Today</h3>
	</div>
	<div class="col-md-2">
		<h3>SOM Today</h3>
	</div>
	<div class="col-md-2">
		<h3>New Clients</h3>
	</div>
</div>
<div class="container row">
	<div class="col-md-2">
		<?php echo $num_of_leads; ?>/100
	</div>
	<div class="col-md-2">
		<?php echo $num_of_som; ?>
	</div>
	<div class="col-md-2">
		<?php echo $num_of_new_clients; ?>
	</div>
	<div class="col-md-6">
		<canvas id="myChart" width="400" height="400"></canvas>
	</div>
	<div class="col-md-6">
		<canvas id="pieChart" width="400" height="400"></canvas>
	</div>
</div>







<script>


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

initializeChart('myChart','bar');
initializeChart('pieChart', 'pie');

</script>