<?php
include_once('../config.php');
$site = new Config();

$leads = $site->get_leads('today');
// $site->debug($leads,1);

foreach ($leads as $key => $lead) {
	$leads_compiled[$lead['lead_twitter']][] = $lead['lead_name'];
}
$num_of_leads = count($leads_compiled);

// $site->debug($num_of_leads,1);
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.3.0/Chart.js"></script>

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
	<div class="col-md-8">
		<canvas id="myChart" width="400" height="400"></canvas>
	</div>
</div>







<script>

function initializeChart() {
	var ctx = document.getElementById("myChart");
	var dataset = ['<?php echo $num_of_leads; ?>','<?php echo $num_of_leads; ?>',]
	var myChart = new Chart(ctx, {
	    type: 'bar',
	    data: {
	        labels: ['Leads',"Clients","Posts"],
	        datasets: [{
	            label: '# of Leads Today',
	            data: [34,45,22],
	            backgroundColor: [
	                'rgba(255, 99, 132, 0.2)',
	                'rgba(54, 162, 235, 0.2)',
	                'rgba(255, 159, 64, 0.2)'
	            ],
	            borderColor: [
	                'rgba(255,99,132,1)',
	                'rgba(54, 162, 235, 1)',
	                'rgba(255, 159, 64, 1)'
	            ],
	            borderWidth: 1
	        }]
	    },
	    options: {
	        scales: {
	            yAxes: [{
	                ticks: {
	                    beginAtZero:true
	                }
	            }]
	        }
	    }
	});
}

initializeChart();

</script>