<?php
$text = $_POST['text'];
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
// var_dump($keywords);


foreach ($keywords as $key => $word) {
	echo '<li>'.$word.'</li>';
}
?>


