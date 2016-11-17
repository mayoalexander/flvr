<?php
var_dump($_POST);
echo '<hr>';
var_dump($_GET);

?>


<meta name="google-signin-client_id" content="198441085624-sfi9j6vk1t68v0qiftceg8uk5d37u3lf.apps.googleusercontent.com">
<meta name="google-signin-scope" content="https://www.googleapis.com/auth/analytics.readonly">


<h1>Hello Analytics Reporting API V4</h1>

<p>
  <!-- The Sign-in button. This will run `queryReports()` on success. -->
  <div class="g-signin2" data-onsuccess="queryReports"></div>
</p>

<!-- The API response will be printed here. -->
<div class="results"></div>
<!-- <textarea rows="20" id="query-output" class="form-control"></textarea> -->

<script>
  // Replace with your view ID.
  var VIEW_ID = '20573586';

  // Query the API and print the results to the page.
  function queryReports() {
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
                startDate: '1daysAgo',
                endDate: 'today'
              }
            ],
            metrics: [
              {
                expression: 'ga:sessions'
              },
              {
                expression: 'ga:hits'
              },
              {
                expression: 'ga:sessionDuration'
              },
              {
                expression: 'ga:avgSessionDuration'
              }
            ]
          }
        ]
      }
    }).then(displayResults, console.error.bind(console));
  }

  function displayResults(response) {
    var formattedJson = JSON.stringify(response.result, null, 2);
    document.googleAnalytics = JSON.parse(formattedJson);
    // document.getElementById('query-output').value = formattedJson;
  	var labels = document.googleAnalytics.reports[0].columnHeader.metricHeader.metricHeaderEntries;
  	var metrics = document.googleAnalytics.reports[0].data.totals[0].values;
  	console.log(labels);
    $.each(metrics,function(index,value){
    	$('.results').append(labels[index].name + ' - ' + value + '<br>');
    });
  }

</script>

<!-- Load the JavaScript API client and Sign-in library. -->
<script src="https://apis.google.com/js/client:platform.js"></script>

