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
$num_of_uploads = count($site->get_new_uploads('today'));
$num_of_projects = count($site->get_new_projects('today'));

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




<section class="container container-padded-large">
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



<section class="container container-padded-large">
	<div class="col-md-4">
		<h3 class="page-header">Leads</h3>
		<canvas id="lead_quota" width="400" height="400"></canvas>
	</div>
	<div class="col-md-4">
		<h3 class="page-header">SOMS</h3>
		<canvas id="som_quota" width="400" height="400"></canvas>
	</div>
	<div class="col-md-4">
		<h3 class="page-header">Clients</h3>
		<canvas id="client_quota" width="400" height="400"></canvas>
	</div>
	<div class="col-md-6">
		<h3 class="page-header">Uploads</h3>
		<canvas id="uploads_quota" width="400" height="400"></canvas>
	</div>
	<div class="col-md-6">
		<h3 class="page-header">Projects</h3>
		<canvas id="projects_quota" width="400" height="400"></canvas>
	</div>
	
</section>







<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.js"></script>
<script>




// var myLineChart = new Chart(ctx, {
//     type: 'line',
//     data: data,
//     options: options
// });


	function getDataSet(type) {
		switch(type) {
		    case 'leads':
		        var dataset = ['<?php echo ($num_of_leads); ?>','<?php echo (80 - $num_of_leads); ?>'];
		        break;
		    case 'soms':
		        var dataset = ['<?php echo ($num_of_som); ?>','<?php echo (16 - $num_of_som); ?>'];
		        break;
		    case 'clients':
		        var dataset = ['<?php echo $num_of_new_clients; ?>','<?php echo (6 - $num_of_new_clients); ?>'];
		        break;
		    case 'uploads':
		        var dataset = ['<?php echo $num_of_uploads; ?>','<?php echo (30 - $num_of_uploads); ?>'];
		        break;
		    case 'projects':
		        var dataset = ['<?php echo $num_of_projects; ?>','<?php echo (30 - $num_of_projects); ?>'];
		        break;
		}
		return dataset;
	}

	function initializeChart(chart, type) {
		var ctx = document.getElementById(chart);
		var dataset = getDataSet(type);
		var myChart = new Chart(ctx, {
		    type: 'doughnut',
		    data: {
		        labels: ['Completed', "Remaining"],
		        datasets: [{
		            label: '# of Leads Today',
		            data: dataset,
		            backgroundColor: [
		                '#45b7cd',
		                '#FF6384',
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

	initializeChart('lead_quota','leads');
	initializeChart('som_quota', 'soms');	
	initializeChart('client_quota', 'clients');	
	initializeChart('uploads_quota', 'uploads');	
	initializeChart('projects_quota', 'projects');	





// var ctx = document.getElementById("lead_quota");
// var myChart = new Chart(ctx, {
//     type: 'bar',
//     data: {
//         labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
//         datasets: [{
//             label: '# of Votes',
//             data: [12, 19, 3, 5, 2, 3],
//             backgroundColor: [
//                 'rgba(255, 99, 132, 0.2)',
//                 'rgba(54, 162, 235, 0.2)',
//                 'rgba(255, 206, 86, 0.2)',
//                 'rgba(75, 192, 192, 0.2)',
//                 'rgba(153, 102, 255, 0.2)',
//                 'rgba(255, 159, 64, 0.2)'
//             ],
//             borderColor: [
//                 'rgba(255,99,132,1)',
//                 'rgba(54, 162, 235, 1)',
//                 'rgba(255, 206, 86, 1)',
//                 'rgba(75, 192, 192, 1)',
//                 'rgba(153, 102, 255, 1)',
//                 'rgba(255, 159, 64, 1)'
//             ],
//             borderWidth: 1
//         }]
//     },
//     options: {
//         scales: {
//             yAxes: [{
//                 ticks: {
//                     beginAtZero:true
//                 }
//             }]
//         }
//     }
// });



</script>