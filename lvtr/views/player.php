<?php
include_once('../config.php');
$site = new Config();
// include_once('../header.php');

$posts = $site->get_explore_posts($_SESSION['user_name'], $_POST['page']);

?>
<!--     <script src="http://kolber.github.io/audiojs/demos/jquery.js"></script>
    <script src="http://freelabel.net/js/audiojs.js"></script> -->
    <script type="text/javascript" src="http://freelabel.net/js/audioplayer.js"></script>
    <div class="container tracklist-container">
      <!-- <audio preload></audio> -->

      <ol class="audioplayer-list">
		<?php $site->display_media_list($posts, $_SESSION['user_name'], $_POST['page']); ?>
      </ol>
    </div>
<?php

// include_once('../footer.php');
?>
