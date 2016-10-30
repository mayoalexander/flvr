<?php
include('../config.php');
$site = new Config();
?>
<div class="container">
		<?php $site->display_registration_form(); ?>

</div> <!-- /container -->

<script type="text/javascript" src="<?php echo $site->url ?>js/dashboard.js"></script>