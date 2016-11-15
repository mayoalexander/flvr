<?php
$iteration[] = '1';
$iteration[] = '2';
$iteration[] = '3';
$iteration[] = '4';

$buttons = '';
foreach ($iteration as $key => $query) {
	$buttons .= '<a class="btn btn-primary col-md-3 som-button" href="http://freelabel.net/twitter/?som=1&q='.$query.'" target="_blank">'.$query.'</a>';
}
echo '<a href="https://ads.twitter.com/accounts/gueorv/cards/show?url_id=9fou" target="_blank" class="btn btn-primary btn-xs" >SOMCard</a>';


?>


<div class="container">
<h1 class="page-header">Run SOM</h1>
	<?php echo $buttons; ?>

	<br><br>

	<h2 class="page-header">Results</h2>
	<div class="som-results-container container"></div>
	
</div>

<script type="text/javascript">
	$('.som-button').click(function(e){
		e.preventDefault();
		var path = $(this).attr('href');
		$.get(path,function(results){
			$('.som-results-container').html(results);
		});
	});
</script>