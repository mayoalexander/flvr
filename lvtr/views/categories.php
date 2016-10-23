<?php
include_once('../config.php');
$site = new Config();
$ads = $site->get_user_categories('admin'); // '0' pulling the 1st page results


?>
<div class="subnav"></div>
<div class="container">
	<?php
		foreach ($ads as $key => $ad) {
			$posts = json_decode($ad['posts']) ;
			echo $ad['name'].'<hr>';
		}
	?>
</div>