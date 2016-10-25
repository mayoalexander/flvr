<?php
$iteration[] = '1';
$iteration[] = '2';
$iteration[] = '3';
$iteration[] = '4';

$buttons = '';
foreach ($iteration as $key => $query) {
	$buttons .= '<a class="btn btn-primary col-md-3" href="http://freelabel.net/twitter/?som=1&q='.$query.'" target="_blank">'.$query.'</a>';
}

?>


<div class="container">
<h1 class="page-header">Run SOM</h1>
	<?php echo $buttons; ?>
	
</div>