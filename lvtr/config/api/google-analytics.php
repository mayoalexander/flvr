


<meta name="google-signin-client_id" content="198441085624-sfi9j6vk1t68v0qiftceg8uk5d37u3lf.apps.googleusercontent.com">
<meta name="google-signin-scope" content="https://www.googleapis.com/auth/analytics.readonly">
<!-- Load the JavaScript API client and Sign-in library. -->
<script src="https://apis.google.com/js/client:platform.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.3.0/Chart.js"></script>





<div class="container container-padded-large">
	<h1 class="page-header">Hello Analytics Reporting API V4</h1>
	<nav class="navbar navbar-nav"></nav>
	<p>
	  <!-- The Sign-in button. This will run `queryReports()` on success. -->
	  <div class="g-signin2" data-onsuccess="queryReports"></div>
	</p>


	<div class="col-md-6">
		<h3>Overview</h3>
		<canvas id="statsChart" width="400" height="400"></canvas>
	</div>
	<div class="col-md-6">
		<h3>Sessions</h3>
		<canvas id="sessionChart" width="400" height="400"></canvas>
	</div>
</div>











<script>
  // Replace with your view ID.
  var VIEW_ID = '20573586'; // BH
  // var VIEW_ID = '71793033'; // FL

  // Query the API and print the results to the page.
  function queryReports() {
  	var queryMetrics = getQueryMetrics();
    gapi.client.request({
      path: '/v4/reports:batchGet',
      root: 'https://analyticsreporting.googleapis.com/',
      method: 'POST',
      body: {
        reportRequests: [
          {
            viewId: VIEW_ID,
            dateRanges: [
              {
                startDate: '30daysAgo',
                endDate: 'today'
              }
            ],
            metrics: queryMetrics
          }
        ]
      }
    }).then(displayResults, console.error.bind(console));
  }



  function getQueryMetrics() {
  	if () {
		var result = [
              {
                expression: 'ga:sessions'
              },
              {
                expression: 'ga:hits'
              }
        ];
  	} else {
  		var result = [
              {
                expression: 'ga:sessions'
              },
              {
                expression: 'ga:hits'
              }
        ];
  	}
    return result;
  }

  function displayResults(response) {
  	var chartData = {
  		dataset: [],
  		labels: []
  	};
    var formattedJson = JSON.stringify(response.result, null, 2);
    document.googleAnalytics = JSON.parse(formattedJson);
  	var labels = document.googleAnalytics.reports[0].columnHeader.metricHeader.metricHeaderEntries;
  	var metrics = document.googleAnalytics.reports[0].data.totals[0].values;
  	console.log(labels);
    $.each(metrics,function(index,value){
    	chartData.dataset[index] = value;
    	chartData.labels[index] = labels[index].name;

    });
    initializeChart("statsChart",chartData);
    initializeChart("sessionChart",chartData);
    console.log(chartData);
  }

</script>



<script>
function initializeChart(canvas, chartData) {
	var ctx = document.getElementById(canvas);
	var myChart = new Chart(ctx, {
	    type: 'bar',
	    data: {
	        labels: chartData.labels,
	        datasets: [{
	            label: '# of views',
	            data: chartData.dataset,
	            backgroundColor: [
	                'rgba(255, 99, 132, 0.2)',
	                'rgba(54, 162, 235, 0.2)',
	                'rgba(255, 206, 86, 0.2)',
	                'rgba(255, 159, 64, 0.2)'
	            ],
	            borderColor: [
	                'rgba(255,99,132,1)',
	                'rgba(54, 162, 235, 1)',
	                'rgba(255, 206, 86, 1)',
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

</script>