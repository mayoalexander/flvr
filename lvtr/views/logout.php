<?php 
include_once('../config.php');
$site = new Config();
session_destroy();
?>
<p>Now logging you out..</p>
<script type="text/javascript">
	// window.location.assign("<?php echo $site->url; ?>");
	window.location.assign("http://freelabel.net/view/");
</script>