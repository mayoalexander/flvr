<?php
$text = $_POST['text'];

if (isset($_POST['table'])) {
	$table = $_POST['table'];
} else {
	$table = 'feed';
}
$data = explode(' ', $text);


/* FUNCTIONS */
function clean($string) {
   $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.

   return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
}







/* CLEAN UP */
foreach ($data as $key => $word) {
	if ($word == ' ' 
		|| $word == '' 
		|| $word == '') {
		// do nothing
	} else {
		// var_dump($word);
		$find = array(',', ' ' );
		$keywords[] = clean(str_replace($find, '', $word));
	}
}





/* MIDDLE PARTS */
$query_like = "description LIKE '%$text%' OR ";
foreach ($keywords as $key => $word) {
	$query_like .= "description LIKE '%$word%'";
	if ((count($keywords)-1)!==$key) {
		$query_like .= ' OR ';
	}
}



/* MIDDLE PARTS */
$query_order = "description LIKE '%$text%', ";
foreach ($keywords as $key => $word) {
	$query_order .= "description LIKE '%$word%'";
	if ((count($keywords)-1)!==$key) {
		$query_order .= ', ';
	}
}


$query  = "SELECT
    *
FROM
    `$table`
WHERE
    $query_like
ORDER BY
    $query_order LIMIT 200";




/* DISPLAY RESULTS */
echo '<hr>'.$query;
?>


